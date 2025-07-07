<?php

if (!function_exists("hasPermission")) {
    function hasPermission(string $permission): bool {
        return auth()->user()->hasPermission($permission);
    }
}

if (!function_exists("hasRole")) {
    function hasRole(string $role): bool {
        return auth()->user()->hasRole($role);
    }
}
