<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create_vacancy', 'label' => 'Create Vacancy'],
            ['name' => 'edit_vacancy', 'label' => 'Edit Vacancy'],
            ['name' => 'delete_vacancy', 'label' => 'Delete Vacancy'],
            ['name' => 'edit_user', 'label' => 'Edit User'],
        ];

        foreach ($permissions as $permission) {
            Permission::query()->firstOrCreate([
                "name" => $permission['name'],
                "label" => $permission['label']
            ]);
        }
    }
}
