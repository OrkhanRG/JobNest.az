<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    protected $fillable = [
        "name",
        "label",
        "is_active"
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (@$params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("label", "LIKE", "%{$params["keyword"]}%");
            });
        }

        if (isset($params["is_active"]) && in_array($params['is_active'], ['0', '1'])) {
            $query->where("is_active", $params['is_active']);
        }

        if (@$params["only_dont_used"] && @$params["role_id"]) {
            $used_permission_ids = DB::table('permission_role')
                ->where('role_id', $params["role_id"])
                ->pluck('permission_id');
            $query->whereNotIn("id", $used_permission_ids);
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
