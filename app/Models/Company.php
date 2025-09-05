<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "slug",
        "tagline",
        "description",
        "logo",
        "background_image",
        "phone",
        "website",
        "contact_email",
        "city_id",
        "country_id",
        "address",
        "latitude",
        "longitude",
        "map_address",
        "company_size",
        "industry",
        "founded_year",
        "company_type",
        "is_featured",
        "vacancy_posts_limit",
        "vacancy_posts_used",
        "can_see_candidate_contacts",
        "seo_title",
        "seo_description",
        "seo_keywords"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function socialLinks(): MorphMany
    {
        return $this->morphMany(SocialLink::class, 'linkable');
    }
}
