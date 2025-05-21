<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategoryCreateRequest;
use App\Http\Services\JobCategoryService;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function __construct(
        readonly JobCategoryService $jobCategoryService
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = $this->jobCategoryService->getAll(["created_at", "updated_at"], ["children"]);

            return json_response(__("app.success"), 200, $categories);
        }

        return view('admin.job_category.list');
    }

    public function getParents()
    {
        $categories = $this->jobCategoryService->getParents();
        return json_response(__("app.success"), 200, $categories);
    }

    public function create()
    {
        $categories = $this->jobCategoryService->getParents();
        return view('admin.job_category.create-update', compact('categories'));
    }

    public function store(JobCategoryCreateRequest $request)
    {
        try {
            $data = $request->only("name", "slug", "description", "parent_id", "is_active");

            if ($request->hasFile('icon')) {
                $data['icon'] = $request->file('icon');
            }

            $this->jobCategoryService->create($data);

            return json_response(__('app.success'), 201);
        } catch (\Throwable $exception) {
            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(JobCategory $jobCategory)
    {

    }

    public function update(JobCategory $jobCategory)
    {

    }

    public function destroy(JobCategory $jobCategory)
    {

    }
}
