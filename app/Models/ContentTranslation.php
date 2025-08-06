<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class ContentTranslation extends Model
{
    protected $fillable = [
        "lang_id",
        "group",
        "key",
        "value",
        "is_active"
    ];


    public function language(): HasOne
    {
        return $this->hasOne(Language::class, 'id', 'lang_id');
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

        if (isset($params["group"]) && $params["group"]) {
            $query->where("group", $params["group"]);
        }

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("key", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("value", "LIKE", "%{$params["keyword"]}%");
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
