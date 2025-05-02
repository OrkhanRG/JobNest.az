<?php

namespace App\Enums;

enum UserLoginStatus: string
{
    case Success = 'success';
    case UserNotFound = 'user_not_found';
    case UserNotVerified = 'user_not_verified';
}
