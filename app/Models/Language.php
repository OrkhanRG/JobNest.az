<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Language extends Model
{
    protected $fillable = [
        "name",
        "code",
        "native_name",
        "flag",
        "is_active",
        "is_default",
        "sort_order"
    ];

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("code", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("native_name", "LIKE", "%{$params["keyword"]}%");
            });
        }

        if (isset($params["is_active"]) && in_array($params['is_active'], ['0', '1'])) {
            $query->where("is_active", $params['is_active']);
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
