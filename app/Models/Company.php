<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;

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

    public function city(): belongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function country(): belongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function socialLinks(): MorphMany
    {
        return $this->morphMany(SocialLink::class, 'linkable');
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("slug", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("description", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("contact_email", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("tagline", "LIKE", "%{$params["keyword"]}%");
            });
        }


        if (@$params["limit"]) {
            $query->limit($params["limit"]);
        }

        if (@$params["offset"]) {
            $query->offset($params["offset"]);
        }

        return $query;
    }
}
