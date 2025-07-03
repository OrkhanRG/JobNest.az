<?php

namespace App\Http\Services;

use App\Constants\App;
use App\Constants\Status;
use App\Http\Resources\UserResource;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use App\Traits\Loggable;
use Illuminate\Support\Facades\DB;

class UserService
{
    use Loggable;

    protected User $user;

    public function __construct(
        readonly ImageService $imageService
    ) {}

    public function getAll(array $params): array
    {
        $users = UserResource::collection(User::query()
            ->with(['roles'])
            ->filter($params)
            ->orderByDesc('created_at')
            ->get()
        );

        $total_count = $users->first()?->total_count ?? 0;

        $users->each(function ($item) {
            unset($item->total_count);
        });

        return [
            "list" => $users,
            "count" => $total_count
        ];
    }

    /**
     * @throws \Throwable
     */
    public function create($data): ?User
    {
        $full_name = $data['name'].( isset($data["surname"]) && $data["surname"] ? "-".$data["surname"] : "");

        DB::beginTransaction();

        $insert_data = [
            "name" => $data["name"],
            "surname" => $data["surname"] ?? null,
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
            "status" =>  array_key_exists($data["status"], config("statuses.users")) ? $data["status"] : 0,
            "avatar" =>  $data["avatar"],
            "email_verified_at" => now(),
        ];

        if (isset($data["avatar"]) && $data["avatar"]) {
            $insert_data['avatar'] = $this->imageService->sendToFolder(App::ADMIN, $data["avatar"], "users", $full_name);
        }

        try {
            $user = User::query()->create($insert_data);
            $user_type = $data["role"];

            if ($user_type === Status::USER_TYPE_COMPANY) {
                Company::query()->create([
                    "user_id" => $user->id,
                    "name" => $data["name"],
                    "slug" => slugify($full_name, Company::class),
                ]);

            } else if ($user_type === Status::USER_TYPE_CANDIDATE) {
                Candidate::query()->create([
                    "user_id" => $user->id,
                    "slug" => slugify($full_name, Candidate::class),
                ]);
            }

            $user->assignRole($user_type);
            DB::commit();
            return $user;
        } catch (\Exception $exception) {
            DB::rollBack();
            if (isset($insert_data["avatar"]) && $insert_data["avatar"]) {
                $this->imageService->removeFromFolder($insert_data["avatar"]);
            }

            $this->logErrorToFile($exception, "UserService@create");

            return null;
        }
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function update(array $data, $role_changed = false): bool
    {
        if (!$this->user) {
            return false;
        }

        $full_name = $data['name'].(isset($data["surname"]) && $data["surname"] ? "-".$data["surname"] : "");

        $update_data = [
            "name" => $data["name"],
            "surname" => $data["surname"] ?? null,
            "email" => $data["email"],
            "status" =>  array_key_exists($data["status"], config("statuses.users")) ? $data["status"] : 0,
        ];

        if (isset($data["password"]) && $data["password"]) {
            $update_data['password'] = bcrypt($data["password"]);
        }

        $old_path = $this->user->avatar;
        if (isset($data["avatar"]) && $data["avatar"]) {
            $this->imageService->removeFromFolder($old_path);
            $update_data['avatar'] = $this->imageService->sendToFolder(App::ADMIN, $data["avatar"], "users", $full_name);
        } else if (@$data["file_is_deleted"]) {
            $this->imageService->removeFromFolder($old_path);
            $update_data['avatar'] = null;
        }

        $old_role = $this->user->roles->first()->name;
        $new_role = trim($data["role"]);
        $update = $this->user->update($update_data);

        if (!$update) {
            return false;
        }

        $roles_has_model = [Status::USER_TYPE_COMPANY,  Status::USER_TYPE_CANDIDATE];
        if (in_array($old_role, $roles_has_model)) {
            if ($old_role == Status::USER_TYPE_COMPANY) {
                Company::query()->where("user_id", $this->user->id)->delete();
            } else if  ($old_role == Status::USER_TYPE_CANDIDATE) {
                Candidate::query()->where("user_id", $this->user->id)->delete();
            }
        }

        if (in_array($new_role, $roles_has_model)) {
            if ($new_role == Status::USER_TYPE_COMPANY) {
                Company::query()->create([
                    "user_id" => $this->user->id,
                    "name" => $data["name"],
                    "slug" => slugify($full_name, Company::class),
                ]);
            } else if  ($new_role == Status::USER_TYPE_CANDIDATE) {
                Candidate::query()->create([
                    "user_id" => $this->user->id,
                    "slug" => slugify($full_name, Candidate::class),
                ]);
            }
        }

        $this->user->assignRole($data["role"], true);
        return  true;
    }

    /**
     * @throws \Throwable
     */
    public function remove(): bool
    {
        if (!$this->user) {
            return false;
        }

        DB::beginTransaction();
        $old_user = $this->user;
        $user_role =  $old_user->roles->first()->name;

        if (!$this->user->delete()) {
            DB::rollBack();
            return false;
        }

        $this->imageService->removeFromFolder($old_user->avatar);

        if ($user_role == Status::USER_TYPE_COMPANY && $company = Company::query()->where("user_id", $old_user->id)->first()) {
            if (!$company->delete()) {
                DB::rollBack();
                return false;
            }

            $this->imageService->removeFromFolder([
                $company->logo,
                $company->background_image
            ]);
        }

        if ($user_role == Status::USER_TYPE_CANDIDATE && $candidate = Candidate::query()->where("user_id", $old_user->id)->first()) {
            if (!$candidate->delete()) {
                DB::rollBack();
                return false;
            }
            $this->imageService->removeFromFolder($candidate->image);
        }

        DB::commit();
        return true ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->user) {
            return false;
        }

        return $this->user->update($data);
    }
}
