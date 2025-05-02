<?php

namespace App\Http\Services;

use App\Constants\Status;
use App\Enums\EmailVerificationStatus;
use App\Events\UserRegistered;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function verifyEmail(string $token): EmailVerificationStatus
    {
        $verification = UserVerify::query()->where('token', $token)->first();

        if (!$verification) {
            return EmailVerificationStatus::InvalidToken;
        }

        $user = User::query()->find($verification->user_id);

        if (!$user) {
            return EmailVerificationStatus::UserNotFound;
        }

        if ($user->hasVerifiedEmail()) {
            return EmailVerificationStatus::AlreadyVerified;
        }

        if ($verification->expired_at < now()) {
            Session::put("expired_token", $verification->token);
            return EmailVerificationStatus::TokenExpired;
        }

        $user->markEmailAsVerified();
        $user->update([
            'status' => Status::ACTIVE,
        ]);

        Session::forget("expired_token");

        $verification->delete();
        Auth::login($user);

        return EmailVerificationStatus::Success;
    }

    public function resendVerify(): bool
    {
        $token = Session::get('expired_token');
        if (!$token) return false;

        $verification = UserVerify::query()->where('token', $token)->first();
        $user = $verification?->user;

        if (!$user) return false;

        event(new UserRegistered($user));
        $verification->delete();

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

    public function logout()
    {
        Auth::logout();
    }
}
