<?php

namespace App\Http\Services;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RoleService
{
    public function getAll(): AnonymousResourceCollection
    {
        return RoleResource::collection(Role::query()
            ->orderBy("name")
            ->get()
        );
    }
}
