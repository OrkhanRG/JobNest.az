<?php

namespace App\Http\Services;

use App\Events\PasswordReset;
use App\Models\User;

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
}
