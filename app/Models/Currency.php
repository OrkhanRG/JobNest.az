<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Currency extends Model
{
    protected $fillable = [
        "code",
        "name",
        "symbol",
        "is_active",
        "is_default"
    ];

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("code", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("symbol", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("exchange_rate", "LIKE", "%{$params["keyword"]}%");
            });
        }

        if (isset($params["is_active"]) && in_array($params['is_active'], ['0', '1'])) {
            $query->where("is_active", $params['is_active']);
        }

        if (isset($params["is_default"]) && in_array($params['is_default'], ['0', '1'])) {
            $query->where("is_default", $params['is_default']);
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
