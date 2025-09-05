<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Candidate extends Model
{
    protected $fillable = [
        "user_id",
        "job_category_id",
        "city_id",
        "country_id",
        "slug",
        "phone",
        "website",
        "position",
        "current_salary",
        "expected_salary",
        'gender',
        "birth_date",
        "description",
        "address",
        "image",
        'current_position',
        'current_company',
        'career_level',
        'years_of_experience',
        'preferred_job_types',
        'preferred_work_types',
        'is_available',
        'is_actively_looking',
        "available_from",
        "show_profile_to_companies",
        "show_contact_info",
        "allow_messages",
        "is_featured",
        "profile_completion_percentage",
        "profile_views",
        "last_active_at"
    ];

    public function socialLinks(): MorphMany
    {
        return $this->morphMany(SocialLink::class, 'linkable');
    }
}
