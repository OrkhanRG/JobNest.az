<?php

namespace App\Http\Services;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class RoleService
{
    use Loggable;

    protected Role $role;

    public function getAll($params = null): array
    {
        $query = Role::query();

        if ($params) {
            $query = $query->filter($params);
        }

        $query = $query->orderBy("name")->get();
        $total_count = $query->first()?->total_count ?? count($query);
        $query->each(function ($item) {
            unset($item->total_count);
        });

        return [
            "list" => RoleResource::collection($query),
            "count" => $total_count
        ];
    }

    public function find(string $role): ?Role
    {
        return Role::query()
            ->where("name", $role)
            ->where("is_active", "1")
            ->first();
    }

    public function getById(int $id): ?Role
    {
        return Role::query()
            ->where("id", $id)
            ->where("is_active", "1")
            ->first();
    }

    public function create($data): ?Role
    {
        DB::beginTransaction();

        $insert_data = [
            "name" => slugify($data["name"], Role::class, null, "name", "_"),
            "label" => $data["label"] ?? null,
            "is_active" => $data["is_active"]
        ];

        try {
            $user = Role::query()->create($insert_data);

            DB::commit();
            return $user;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "UserService@create");

            return null;
        }
    }

    public function setRole(Role $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->role) {
            return false;
        }

        $update_data = [
            "name" => slugify($data["name"], Role::class, $this->role->id, "name", "_"),
            "label" => $data["label"] ?? null,
            "is_active" => $data["is_active"]
        ];

        return $this->role->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->role) {
            return false;
        }

        return $this->role->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->role) {
            return false;
        }

        return $this->role->update($data);
    }
}
