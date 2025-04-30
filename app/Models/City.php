<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        "name",
        "short_name",
        "region_code"
    ];
}
