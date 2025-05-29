<?php

namespace App\Http\Services;

use App\Models\Role;
use Illuminate\Support\Collection;

class RoleService
{
    public function getAll(): Collection
    {
        return Role::query()->get();
    }
}
