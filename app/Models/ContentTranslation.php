<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    protected $fillable = [
        "lang_id",
        "group",
        "key",
        "value",
        "is_active"
    ];
}
