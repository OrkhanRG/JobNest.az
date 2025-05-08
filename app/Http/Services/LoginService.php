<?php

namespace App\Http\Services;

use App\Constants\Status;
use App\Enums\UserLoginStatus;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginService
{
    public function login(array $data): UserLoginStatus
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return UserLoginStatus::UserNotFound;
        }

        if (!$user->hasVerifiedEmail()) {
            return UserLoginStatus::UserNotVerified;
        }

        Auth::login($user, $data['remember_me']);

        return UserLoginStatus::Success;
    }

    public function callbackSocialite(string $driver): ?User
    {
        try {
            DB::beginTransaction();

            $driver_user = Socialite::driver($driver)->user();

            if (!$user = User::query()->where("email", $driver_user->getEmail())->first()) {
                $inserted_data = $this->getDataByDriver($driver, $driver_user);
                $user = User::query()->create($inserted_data);

                Candidate::query()->create([
                    "user_id" => $user->id,
                    "slug" => slugify($inserted_data["name"]."-".($inserted_data["surname"] ?? ""), Candidate::class),
                ]);

                $user->assignRole("candidate");
            }

            Auth::login($user);
            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            return null;
        }
    }

    public function getDataByDriver(string $driver, $driver_user): array
    {
        $rand_password = Str::random(16);
        return match ($driver) {
            "google" => [
                "name" =>  $driver_user->user["given_name"],
                "surname" =>  $driver_user->user["family_name"],
                //"avatar" => $driver_user->avatar,
                "email" => $driver_user->getEmail(),
                "email_verified_at" => now(),
                "status" => Status::ACTIVE,
                "password" => bcrypt($rand_password),
            ],
            "github" => [
                "name" =>  explode(" ", $driver_user->name)[0] ?? config('jobnest.default_user_name'),
                "surname" =>  explode(" ", $driver_user->name)[1] ?? null,
                //"avatar" => $driver_user->avatar,
                "email" => $driver_user->email,
                "email_verified_at" => now(),
                "status" => Status::ACTIVE,
                "password" => bcrypt($rand_password),
            ],
            default => []
        };
    }
}
