<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'status',
        'avatar',
        'password',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'integer',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string|array $roles): bool
    {
        $query = $this->roles()->where("is_active", "1");
        if (is_array($roles)) {
            return $query->whereIn("name", $roles)->exists();
        }
        return $query->where("name", $roles)->exists();
    }

    public function isSuperAdmin(): bool
    {
        return $this->roles()
            ->whereIn("name", config("roles.super_admins", []))
            ->where("is_active", "1")
            ->exists();
    }

    public function hasPermission(string $permission): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        return $this->roles()
            ->whereHas("permissions", fn($query) => $query->where("name", $permission))
            ->exists();
    }

    public function assignRole(string $roleName, bool $update = false): void
    {
        $role = Role::query()
            ->where("name", $roleName)
            ->where("is_active", "1")
            ->firstOrFail();

        if ($update) {
            $this->roles()->sync([$role->id]);
        } else {
            $this->roles()->syncWithoutDetaching([$role->id]);
        }
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if ($params["keyword"]) {
            $query->where("name", "LIKE", "%{$params["keyword"]}%")
            ->orWhere("email", "LIKE", "%{$params["keyword"]}%");
        }

        if (isset($params["status"]) && in_array($params['status'], ['0', '1', '2'])) {
            $query->where("status", $params['status']);
        }

        if ($params['role']) {
            $query->whereHas("roles", fn($q) => $q->where("role_id", $params['role']));
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
