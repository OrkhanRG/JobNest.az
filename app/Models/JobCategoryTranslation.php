<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class JobCategoryTranslation extends Model
{
    protected $fillable = [
        "job_category_id",
        "lang_id",
        "name",
        "description",
        "seo_title",
        "seo_description",
        "seo_keywords"
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class,'job_category_id','id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class,'lang_id','id');
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (isset($params["lang_id"]) && $params["lang_id"]) {
            $query->where("lang_id", $params["lang_id"]);
        }

        if (isset($params["job_category_id"]) && $params["job_category_id"]) {
            $query->where("job_category_id", $params["job_category_id"]);
        }

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("description", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("seo_title", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("seo_description", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("seo_keywords", "LIKE", "%{$params["keyword"]}%");
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
