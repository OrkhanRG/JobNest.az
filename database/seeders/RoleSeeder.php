<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ["name" => "admin", "label" => "Admin"],
            ["name" => "developer", "label" => "Developer"],
            ["name" => "moderator", "label" => "Moderator"],
            ["name" => "candidate", "label" => "Candidate"],
            ["name" => "company", "label" => "Company"]
        ];

        foreach ($roles as $role) {
            Role::query()->firstOrCreate([
                "name" => $role["name"],
                "label" => $role["label"]
            ]);
        }
    }
}
