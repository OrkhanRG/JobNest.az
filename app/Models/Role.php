<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
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

    public function givePermissionTo(string $permission_name): void
    {
        $permission = Permission::query()->where("name", $permission_name)->firstOrFail();
        $this->permissions()->syncWithoutDetaching([$permission->id]);
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if ($params["keyword"]) {
            $query->where("name", "LIKE", "%{$params["keyword"]}%")
                ->orWhere("label", "LIKE", "%{$params["keyword"]}%");
        }

        if (isset($params["is_active"]) && in_array($params['is_active'], ['0', '1'])) {
            $query->where("is_active", $params['is_active']);
        }

        if ($params["limit"]) {
            $query->limit($params["limit"]);
        }

        if ($params["offset"]) {
            $query->offset($params["offset"]);
        }

        return $query;
    }
}
