<?php

namespace App\Http\Services;

use App\Constants\App;
use App\Http\Resources\JobCategoryResource;
use App\Models\JobCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class JobCategoryService
{
    protected JobCategory $category;

    public function __construct(readonly ImageService $imageService) {}

    public function getAll(array $params, null|string|array $with = null): array
    {
        $params["with"] = $with;
        $categories     = JobCategoryResource::collection(JobCategory::query()->filter($params));
        $total_count    = $categories->first()?->total_count ?? 0;

        $categories->each(function ($item) {
            unset($item->total_count);
        });

        return [
            "categories" => $categories,
            "count" => $total_count
        ];
    }

    public function getParents(int $id = null): AnonymousResourceCollection
    {
        $categories = JobCategory::query()
            ->doesntHave("parent")
            ->orderBy("id", "desc")
            ->when($id, function ($query) use ($id) {
                $query->whereNot("id", $id);
            })
            ->get();

        return JobCategoryResource::collection($categories);
    }

    public function create($data): JobCategory
    {
        $slug = slugify($data['slug'] ?? $data['name'], JobCategory::class);

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

        return JobCategory::query()->create($insert_data);
    }

    public function setCategory(JobCategory $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->category) {
            return false;
        }

        $slug = slugify($data['slug'] ?? $data['name'], JobCategory::class, $this->category->id);
        $update_data = [
            "name" => $data['name'],
            "slug" => $slug,
            "description" => $data['description'],
            "is_active" => $data['is_active'],
            "parent_id" => $data['parent_id'],
        ];

        $old_path = $this->category->icon;
        if (isset($data["icon"]) && $data["icon"]) {
            $this->imageService->removeFromFolder($old_path);
            $update_data['icon'] = $this->imageService->sendToFolder(App::ADMIN, $data["icon"], "job_categories", $data["name"]);
        } else if (@$data["file_is_deleted"]) {
            $update_data['icon'] = null;
            $this->imageService->removeFromFolder($old_path);
        }

        return $this->category->update($update_data);
    }

    public function remove(): bool
    {
        if (!$this->category) {
            return false;
        }

        $old_paths = $this->category->children->pluck('icon')->toArray();
        $old_paths[] = $this->category->icon;

        if (!$this->category->delete()) {
            return false;
        }

        $this->imageService->removeFromFolder($old_paths);

        return true ;
    }

    public function changeField(array $data): bool
    {
        if (!$this->category) {
            return false;
        }

        return $this->category->update($data);
    }
}
