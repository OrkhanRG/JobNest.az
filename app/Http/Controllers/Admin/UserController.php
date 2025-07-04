<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use App\Models\JobCategory;
use App\Models\User;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use Loggable;

    public function __construct(
        readonly UserService $userService,
        readonly RoleService $roleService,
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "status", "role", "offset"),
                "limit" => LoadLimit::USER
            ];

            $data = $this->userService->getAll($params);

            return json_response(__("app.success"), 200, $data);
        }

        $roles = $this->roleService->getAll();

        return view('admin.users.list', compact('roles'));
    }

    public function create(): View
    {
        return view('admin.users.create-update');
    }

    public function store(UserCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "surname", "email", "password", "role", "status", "avatar");

            if ($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar');
            }

            $user = $this->userService->create($data);

            if (!$user) {
                return json_response(__("text.unexpected_error_text"), 500);
            }

            return json_response(__('app.success'), 201);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "UserController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(User $user): View
    {
        return view('admin.users.create-update', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        try {
            $data = $request->only("name", "surname", "email", "password", "role", "status", "avatar", "file_is_deleted");;

            if ($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar');
            }

            $role = $this->roleService->find($data["role"]);
            if (!$role) {
                return json_response(__('text.role_not_found'), Response::HTTP_NO_CONTENT);
            }

            $update = $this->userService->setUser($user)->update($data, !$user->hasRole($role->name));

            if (!$update) {
                return json_response(__('app.error'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@update");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $delete = $this->userService->setUser($user)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@destroy");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    //-- TODO non completed after

    public function changeStatus(User $user, Request $request): JsonResponse
    {
        try {
            $data = [
                "status" => trim($request->input("status")),
            ];

            if (!array_key_exists($request->input("status"), config("statuses.users"))) {
                return json_response(__('text.unassigned_status'), 422);
            }

            $status = $this->userService->setUser($user)->changeField($data);

            if (!$status) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@changeStatus");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }
}
