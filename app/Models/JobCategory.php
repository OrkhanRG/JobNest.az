<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobCategory extends Model
{
    protected $fillable = [
        "name",
        "slug",
        "description",
        "icon",
        "is_active",
        "parent_id"
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(JobCategory::class, "parent_id");
    }
}
