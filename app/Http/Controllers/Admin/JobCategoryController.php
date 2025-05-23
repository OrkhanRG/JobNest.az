<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategoryCreateRequest;
use App\Http\Requests\JobCategoryUpdateRequest;
use App\Http\Services\JobCategoryService;
use App\Models\JobCategory;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobCategoryController extends Controller
{
    use Loggable;

    public function __construct(
        readonly JobCategoryService $jobCategoryService
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->jobCategoryService->getAll(makeHidden: ["created_at", "updated_at"],
                                                            with: ["children"],
                                                            offset: $request->input('offset'));

            return json_response(__("app.success"), 200, $data);
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
        return view('admin.job_category.create-update');
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

    public function edit(JobCategory $category)
    {
        return view('admin.job_category.create-update', compact('category'));
    }

    public function update(JobCategoryUpdateRequest $request, JobCategory $category)
    {
        try {
            $data = $request->only("name", "slug", "description", "parent_id", "is_active", "file_is_deleted");

            if ($request->hasFile('icon')) {
                $data['icon'] = $request->file('icon');
            }

            $update = $this->jobCategoryService->setCategory($category)->update($data);

            if (!$update) {
                return json_response(__('app.error'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@update");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function destroy(JobCategory $category)
    {

    }
}
