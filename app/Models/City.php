<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    protected $fillable = [
        "country_id",
        "lang_id",
        "name",
        "short_name",
        "region_code",
        "is_active"
    ];

    public function language(): HasOne
    {
        return $this->hasOne(Language::class, "id", "lang_id");
    }

    public function country(): HasOne
    {
        return $this->hasOne(Country::class, "id", "country_id");
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (isset($params["is_active"]) && in_array($params['is_active'], ['0', '1'])) {
            $query->where("is_active", $params['is_active']);
        }

        if (isset($params["lang_id"]) && $params["lang_id"]) {
            $query->where("lang_id", $params["lang_id"]);
        }

        if (isset($params["country_id"]) && $params["country_id"]) {
            $query->where("country_id", $params["country_id"]);
        }

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("short_name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("region_code", "LIKE", "%{$params["keyword"]}%");
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
