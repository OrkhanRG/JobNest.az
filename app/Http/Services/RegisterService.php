<?php

namespace App\Http\Services;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterService
{
    public function create(array $data): User|null
    {
        DB::beginTransaction();

        try {
            $user = User::query()->create([
                "name" => $data["name"],
                "surname" => $data["surname"],
                "email" => $data["email"],
                "password" => bcrypt($data["password"]),
            ]);

            Candidate::query()->create([
                "user_id" => $user->id,
                "slug" => slugify($data["name"]."-".$data["surname"], Candidate::class),
            ]);

            $user->assignRole($data["user_type"]);

            DB::commit();
            return $user;
        } catch (\Exception $exception) {
            DB::rollBack();
        }


    }

}
