<?php

namespace App\Enums;

enum PasswordResetStatus: string
{
    case UserNotFound = "user_not_found";
    case ExpiredToken = "expired_token";
    case Success = "success";
}
