<?php

namespace App\Http\Services;

use App\Models\JobCategory;
use Illuminate\Support\Collection;

class JobCategoryService
{
    public function getAll(): Collection
    {
        return JobCategory::query()->get();
    }
}
