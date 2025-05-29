<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(
        readonly RoleService $roleService
    ) {}

    public function getAll(): JsonResponse
    {
        $data = $this->roleService->getAll();
        return $data->isEmpty() ? json_response(__("app.no_content"), 204) : json_response(__("app.success"), 200, $data);
    }
}
