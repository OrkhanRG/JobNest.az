<?php

namespace App\Http\Services;

use App\Constants\Status;
use App\Events\UserRegistered;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterService
{
    public function create(array $data): ?User
    {
        DB::beginTransaction();

        try {
            $user = User::query()->create([
                "name" => $data["name"],
                "surname" => $data["surname"] ?? null,
                "email" => $data["email"],
                "password" => bcrypt($data["password"]),
            ]);

            $user_type = $data["user_type"];

            if ($user_type === Status::USER_TYPE_COMPANY) {
                Company::query()->create([
                    "user_id" => $user->id,
                    "name" => $data["name"],
                    "slug" => slugify($data["name"], Company::class),
                ]);

            } else {
                Candidate::query()->create([
                    "user_id" => $user->id,
                    "slug" => slugify($data["name"]."-".$data["surname"], Candidate::class),
                ]);
            }

            $user->assignRole($user_type);

            DB::commit();
            return $user;
        } catch (\Exception $exception) {
            DB::rollBack();
            return null;
        }
    }

    public function verifyEmail(string $token): bool
    {
        $check_expire =  UserVerify::query()->where("token", $token)->first();

        if (!$check_expire) {
            return false;
        }

        if ($check_expire->expired_at < now()) {
            $check_expire->delete();
            return false;
        }

        $user = User::query()->where("id",  $check_expire->user_id)->first();

        if ($user && !$user->hasVerifiedEmail()){
            $user->markEmailAsVerified();
            Auth::login($user);
        }

        return true;
    }

    public function sendEmail(User $user): void
    {
        if ($this->checkEmailSend($user)) {
            event(new UserRegistered($user));
        }
    }

    public function checkEmailSend(User $user): bool
    {
        if ($user->hasVerifiedEmail()){
            return false;
        }

        $check = UserVerify::query()->where("user_id", $user->id)
            ->where("expired_at", "<", now())
            ->exists();

        return !$check;
    }
}
