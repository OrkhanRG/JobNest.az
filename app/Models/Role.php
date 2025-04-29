<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = [
        "name",
        "label"
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
}
