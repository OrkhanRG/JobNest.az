<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    protected $fillable = [
        "user_id",
        "token",
        "expired_at",
    ];
}
