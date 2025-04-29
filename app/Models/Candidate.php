<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        "user_id",
        "slug",
        "phone",
        "website",
        "position",
        "job_category_id",
        "current_salary",
        "expected_salary",
        "birth_date",
        "description"
    ];
}
