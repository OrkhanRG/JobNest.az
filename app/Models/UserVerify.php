<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVerify extends Model
{
    protected $fillable = [
        "user_id",
        "token",
        "expired_at",
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class,  "user_id", "id");
    }
}
