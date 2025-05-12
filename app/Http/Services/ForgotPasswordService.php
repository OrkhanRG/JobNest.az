<?php

namespace App\Http\Services;

use App\Events\PasswordReset;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Cache;

class ForgotPasswordService
{
    public function sendPasswordResetEmail(string $email): bool
    {
        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            return false;
        }

        event(new PasswordReset($user));
        return true;
    }

    public function checkUserByToken(string $token, $cache_delete = true): ?User
    {
        $user_id = Cache::get("forgot-password-$token");

        if (!$user_id) {
            return null;
        }

        if ($cache_delete) {
            Cache::delete("forgot-password-$token");
        }

        return User::query()->where('id', $user_id)->first();
    }

    public function updateUser(User $user, array $data): bool
    {
        return $user->update($data);
    }
}
