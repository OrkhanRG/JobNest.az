<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Http\Services\PermissionService;
use App\Http\Services\RoleService;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionController extends Controller
{
    use Loggable;
    public function __construct(
        readonly PermissionService $permissionService,
        readonly RoleService $roleService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "is_active", "offset"),
                "limit" => LoadLimit::PERMISSIONS
            ];

            $data = $this->permissionService->getAll($params);
            return json_response(__("app.success"), 200, $data);
        }

        return view('admin.permissions.list');
    }

    public function getAll(Request $request): JsonResponse
    {
        $params = [
            ...$request->only("only_dont_used", "role_id"),
        ];

        if (@$params["role_id"] && !$this->roleService->getById($params["role_id"])) {
            return json_response(__("text.role_not_found"), 204);
        }

        $data = $this->permissionService->getAll($params);
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), 204) : json_response(__("app.success"), 200, $data);
    }

    public function getByRole(Request $request,Role $role): JsonResponse
    {
        if (!$role) {
            return json_response(__('text.role_not_found'), 204);
        }

        $params = [
            ...$request->only("keyword", "offset"),
            "limit" => LoadLimit::ROLE_PERMISSIONS
        ];

        $data = $this->permissionService->getByRole($role, $params);
        return json_response(__("app.success"), 200, $data);
    }

    public function create(): View
    {
        return view('admin.permissions.create-update');
    }

    public function store(PermissionCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "label", "is_active");
            $permission = $this->permissionService->create($data);

            if (!$permission) {
                return json_response(__("text.unexpected_error_text"), 500);
            }

            return json_response(__('app.success'), 201);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "PermissionController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(Permission $permission): View
    {
        return view('admin.permissions.create-update', compact('permission'));
    }

    public function update(PermissionUpdateRequest $request, Permission $permission): JsonResponse
    {
        try {
            $data = $request->only("name", "label", "is_active");
            $update = $this->permissionService->setPermission($permission)->update($data);

            if (!$update) {
                return json_response(__('app.error'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "PermissionController@update");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function destroy(Permission $permission): JsonResponse
    {
        try {
            $delete = $this->permissionService->setPermission($permission)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "PermissionController@destroy");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function changeStatus(Permission $permission, Request $request): JsonResponse
    {
        try {
            $data = [
                "is_active" => trim($request->input("is_active")),
            ];

            $status = $this->permissionService->setPermission($permission)->changeField($data);

            if (!$status) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "PermissionController@changeStatus");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }
}
