<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Candidate extends Model
{
    protected $fillable = [
        "user_id",
        "slug",
        "phone",
        "status",
        "website",
        "position",
        "job_category_id",
        "current_salary",
        "expected_salary",
        "birth_date",
        "description"
    ];

    public function socialLinks(): MorphMany
    {
        return $this->morphMany(SocialLink::class, 'social_linkable');
    }
}
