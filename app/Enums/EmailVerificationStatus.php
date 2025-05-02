<?php

namespace App\Enums;

enum EmailVerificationStatus: string
{
    case Success = 'success';
    case InvalidToken = 'invalid_token';
    case UserNotFound = 'user_not_found';
    case AlreadyVerified = 'already_verified';
    case TokenExpired = 'token_expired';
}
