<?php

namespace App\Http\Services;

use App\Constants\App;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserService
{
    protected User $user;

    public function __construct(readonly ImageService $imageService) {}

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

    public function create($data): User
    {
        $slug = slugify($data['slug'] ?? $data['name'], User::class);

        $insert_data = [
            "name" => $data['name'],
            "slug" => $slug,
            "description" => $data['description'],
            "is_active" => $data['is_active'],
            "parent_id" => $data['parent_id'],
        ];

        if (isset($data["icon"]) && $data["icon"]) {
            $insert_data['icon'] = $this->imageService->sendToFolder(App::ADMIN, $data["icon"], "job_categories", $data["name"]);
        }

        return User::query()->create($insert_data);
    }

    public function setCategory(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->user) {
            return false;
        }

        $slug = slugify($data['slug'] ?? $data['name'], User::class, $this->user->id);
        $update_data = [
            "name" => $data['name'],
            "slug" => $slug,
            "description" => $data['description'],
            "is_active" => $data['is_active'],
            "parent_id" => $data['parent_id'],
        ];

        $old_path = $this->user->icon;
        if (isset($data["icon"]) && $data["icon"]) {
            $this->imageService->removeFromFolder($old_path);
            $update_data['icon'] = $this->imageService->sendToFolder(App::ADMIN, $data["icon"], "job_categories", $data["name"]);
        } else if (@$data["file_is_deleted"]) {
            $update_data['icon'] = null;
            $this->imageService->removeFromFolder($old_path);
        }

        return $this->user->update($update_data);
    }

    public function remove(): bool
    {
        if (!$this->user) {
            return false;
        }

        $old_paths = $this->user->children->pluck('icon')->toArray();
        $old_paths[] = $this->user->icon;

        if (!$this->user->delete()) {
            return false;
        }

        $this->imageService->removeFromFolder($old_paths);

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
