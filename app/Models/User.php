<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
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

    protected ?Collection $cachedRoles = null;
    protected ?Collection $cachedPermissions = null;
    protected ?bool $isSuperAdminCache = null;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


    public function getCachedRoles(): Collection
    {
        if (!isset($this->cachedRoles)) {
            if (!$this->relationLoaded('roles')) {
                $this->loadMissing('roles.permissions');
            }

            $this->cachedRoles = $this->roles->where("is_active", 1);
        }

        return $this->cachedRoles;
    }

    public function getCachedPermissions(): Collection
    {
        if (!isset($this->cachedPermissions)) {
            $this->cachedPermissions = $this->getCachedRoles()
                ->flatMap(function ($role) {
                    if (!$role->relationLoaded('permissions')) {
                        $role->loadMissing('permissions');
                    }

                    return $role->permissions->where("is_active", "1");
                })
                ->unique('id');
        }

        return $this->cachedPermissions;
    }

    public function hasRole(string|array $roles): bool
    {
        $roleNames = is_array($roles) ? $roles : [$roles];
        return $this->getCachedRoles()->pluck('name')->intersect($roleNames)->isNotEmpty();
    }

    public function isSuperAdmin(): bool
    {
        if (!is_null($this->isSuperAdminCache)) {
            return $this->isSuperAdminCache;
        }

        $this->isSuperAdminCache = $this->getCachedRoles()
            ->pluck('name')
            ->intersect(config("roles.super_admins", []))
            ->isNotEmpty();

        return $this->isSuperAdminCache;
    }

    public function hasPermission(string $permission): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        return $this->getCachedPermissions()->pluck('name')->contains($permission);
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

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function candidate(): HasOne
    {
        return $this->hasOne(Candidate::class);
    }

    #[Scope]
    public function filter($query, $params)
    {
        $query->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if ($params["keyword"]) {
            $query->where(function ($q) use ($params) {
                $q->where("name", "LIKE", "%{$params["keyword"]}%")
                    ->orWhere("email", "LIKE", "%{$params["keyword"]}%");
            });
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
