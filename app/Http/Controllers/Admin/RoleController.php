<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Services\RoleService;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    use Loggable;
    public function __construct(
        readonly RoleService $roleService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "is_active", "offset"),
                "limit" => LoadLimit::ROLES
            ];

            $data = $this->roleService->getAll($params);
            return json_response(__("app.success"), 200, $data);
        }

        return view('admin.roles.list');
    }

    public function create(): View
    {
        return view('admin.roles.create-update');
    }

    public function store(RoleCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "label", "is_active");
            $role = $this->roleService->create($data);

            if (!$role) {
                return json_response(__("text.unexpected_error_text"), 500);
            }

            return json_response(__('app.success'), 201);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "RoleController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(Role $role): View
    {
        return view('admin.roles.create-update', compact('role'));
    }

    public function update(RoleUpdateRequest $request, Role $role): JsonResponse
    {
        try {
            $data = $request->only("name", "label", "is_active");
            $update = $this->roleService->setRole($role)->update($data);

            if (!$update) {
                return json_response(__('app.error'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "RoleController@update");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function getAll(): JsonResponse
    {
        $data = $this->roleService->getAll();
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), 204) : json_response(__("app.success"), 200, $data);
    }

    public function destroy(Role $role): JsonResponse
    {
        try {
            $delete = $this->roleService->setRole($role)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "RoleController@destroy");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function changeStatus(Role $role, Request $request): JsonResponse
    {
        try {
            $data = [
                "is_active" => trim($request->input("is_active")),
            ];

            $status = $this->roleService->setRole($role)->changeField($data);

            if (!$status) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@changeStatus");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function detachPermission(Role $role, Permission $permission): JsonResponse
    {
        try {
            if (!$role) {
                return json_response(__('text.role_not_found'), 500);
            }

            if (!$permission) {
                return json_response(__('text.permission_not_found'), 500);
            }

            $detach = $this->roleService->setRole($role)->detachPermission($permission);

            if (!$detach) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "RoleController@detachPermission");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function givePermissions(Request $request, Role $role): JsonResponse
    {
        try {
            if (!$role ) {
                return json_response(__("text.role_not_found"), 204);
            }

            $data = $request->only("permission_ids");

            if (!@$data["permission_ids"] ) {
                return json_response(__("text.permission_not_found"), 204);
            }

            $update = $this->roleService->setRole($role)->givePermissions($data);

            if (!$update) {
                return json_response(__('app.error'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "RoleController@setPermissions");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }
}
