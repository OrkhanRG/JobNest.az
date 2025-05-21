<?php

namespace App\Http\Services;

use App\Helpers\Constants;
use App\Models\JobCategory;
use Illuminate\Support\Collection;

class JobCategoryService
{
    public function __construct(readonly ImageService $imageService) {}

    public function getAll(array $makeHidden = [], null|string|array $with = null): Collection
    {
        $query = JobCategory::query();

        if (!!$with) {
            $query = $query->with($with);
        }
        $categories = $query->get();

        return empty($makeHidden) ? $categories : $categories->makeHidden($makeHidden);
    }

    public function getParents()
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
            $insert_data['icon'] = $this->imageService->sendToFolder(Constants::ADMIN, $data["icon"], "job_categories", $data["name"]);
        }

        return JobCategory::query()->create($insert_data);
    }
}
