<?php

namespace App\Http\Services;

use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class PermissionService
{
    use Loggable;

    protected Permission $permission;

    public function getAll($params = null): array
    {
        $query = Permission::query();

        if ($params) {
            $query = $query->filter($params);
        }

        $query = $query->orderBy("name")->get();
        $total_count = $query->first()?->total_count ?? count($query);
        $query->each(function ($item) {
            unset($item->total_count);
        });

        return [
            "list" => PermissionResource::collection($query),
            "count" => $total_count
        ];
    }

    public function find(string|int $permission): ?Permission
    {
        return Permission::query()
            ->where(function ($query) use ($permission) {
                if (is_string($permission)) {
                    $query->where('name', $permission);
                } else {
                    $query->where("id", $permission);
                }
            })
            ->where("is_active", "1")
            ->first();
    }

    public function getByRole(Role $role, $params = null)
    {
        $query = $role->permissions();

        if ($params) {
            $query = $query->filter($params);
        }

        $query = $query->orderBy("name")->get();
        $total_count = $query->first()?->total_count ?? count($query);
        $query->each(function ($item) {
            unset($item->total_count);
        });

        return [
            "list" => PermissionResource::collection($query),
            "count" => $total_count
        ];
    }

    public function create($data): ?Permission
    {
        DB::beginTransaction();

        $insert_data = [
            "name" => slugify($data["name"], Permission::class, null, "name", "_"),
            "label" => $data["label"] ?? null,
            "is_active" => $data["is_active"]
        ];

        try {
            $permission = Permission::query()->create($insert_data);

            DB::commit();
            return $permission;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->logErrorToFile($exception, "PermissionService@create");

            return null;
        }
    }

    public function setPermission(Permission $permission): self
    {
        $this->permission = $permission;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->permission) {
            return false;
        }

        $update_data = [
            "name" => slugify($data["name"], Permission::class, $this->permission->id, "name", "_"),
            "label" => $data["label"] ?? null,
            "is_active" => $data["is_active"]
        ];

        return $this->permission->update($update_data);
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->permission) {
            return false;
        }

        return $this->permission->delete() ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->permission) {
            return false;
        }

        return $this->permission->update($data);
    }
}
