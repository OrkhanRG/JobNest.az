<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    protected $fillable = [
        "name",
        "label",
        "is_active"
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(string|int|array $permission): void
    {
        $permission_query = Permission::query()
            ->where("is_active", "1");

        if (is_array($permission)) {
            $permission_query->whereIn("id", $permission);
        } else if (is_int($permission)) {
            $permission_query->where("id", $permission);
        } else {
            $permission_query->where("name", strtolower(trim($permission)));
        }

        $permissions = $permission_query->get();

        if ($permissions->isEmpty()) {
            throw new ModelNotFoundException();
        }

        $this->permissions()->syncWithoutDetaching($permissions->pluck("id"));
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (@$params["keyword"]) {
            $query->where("name", "LIKE", "%{$params["keyword"]}%")
                ->orWhere("label", "LIKE", "%{$params["keyword"]}%");
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
