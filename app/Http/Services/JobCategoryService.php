<?php

namespace App\Http\Services;

use App\Constants\App;
use App\Constants\LoadLimit;
use App\Models\JobCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class JobCategoryService
{
    protected JobCategory $category;

    public function __construct(readonly ImageService $imageService) {}

    public function getAll(array $makeHidden = [], null|string|array $with = null, int $limit = LoadLimit::JOB_CATEGORY_LIMIT, int $offset = 0): array
    {
        $query = JobCategory::query()->select('*', DB::raw('COUNT(*) OVER() as total_count'));

        if (!!$with) {
            $query = $query->with($with);
        }

        if ($limit) {
            $query = $query->limit($limit);
        }

        if ($offset) {
            $query = $query->offset($offset);
        }

        $categories = $query->get();

        $total_count = $categories->first()?->total_count ?? 0;
        $categories->each(function ($item) {
            unset($item->total_count);
        });

        if (!empty($makeHidden)) {
            $categories = $categories->makeHidden($makeHidden);
        }

        return [
            "categories" => $categories,
            "count" => $total_count
        ];
    }

    public function getParents(): Collection
    {
        return JobCategory::query()->with(['parent'])->doesntHave("parent")->get();
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

    public function update(array $data)
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
}
