<?php

namespace App\Http\Services;

use App\Enums\UserLoginStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
