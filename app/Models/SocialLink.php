<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        "platform",
        "url",
        "linkable_id",
        "linkable_type"
    ];
}
