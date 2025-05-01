<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "slug",
        "status",
        "phone",
        "website",
        "city_id",
        "address",
        "location",
        "description",
        "logo",
        "background_image"
    ];

    public function socialLinks(): MorphMany
    {
        return $this->morphMany(SocialLink::class, 'social_linkable');
    }
}
