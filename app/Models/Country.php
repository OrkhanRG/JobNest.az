<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    protected $fillable = [
        "lang_id",
        "name",
        "short_name",
        "phone_prefix",
        "is_active"
    ];

    public function language(): HasOne
    {
        return $this->hasOne(Language::class, "id", "lang_id");
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

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("short_name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("phone_prefix", "LIKE", "%{$params["keyword"]}%");
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
