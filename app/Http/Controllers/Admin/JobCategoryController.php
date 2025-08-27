<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategoryCreateRequest;
use App\Http\Requests\JobCategoryUpdateRequest;
use App\Http\Services\JobCategoryService;
use App\Http\Services\LanguageService;
use App\Models\JobCategory;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobCategoryController extends Controller
{
    use Loggable;

    public function __construct(
        readonly JobCategoryService $jobCategoryService,
        readonly LanguageService $languageService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = $request->only("keyword", "is_active", "offset");
            $params["limit"] = LoadLimit::JOB_CATEGORY;
            $data = $this->jobCategoryService->getAll($params, with: ["children"]);

            return json_response(__("app.success"), 200, $data);
        }

        return view('admin.job_category.list');
    }

    public function getParents(Request $request): JsonResponse
    {
        $id = $request->input("id");
        $categories = $this->jobCategoryService->getParents($id);
        return json_response(__("app.success"), 200, $categories);
    }

    public function create(): View
    {
        $langs = $this->languageService->getAll(["is_active" => "1"]);
        return view('admin.job_category.create-update', compact("langs"));
    }

    public function store(JobCategoryCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "slug", "description", "parent_id", "is_active", "is_featured", "seo_title", "seo_description", "seo_keywords");

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

    public function edit(JobCategory $category): View
    {
        $langs = $this->languageService->getAll(["is_active" => "1"]);
        return view('admin.job_category.create-update', compact('category', 'langs'));
    }

    public function update(JobCategoryUpdateRequest $request, JobCategory $category): JsonResponse
    {
        try {
            $data = $request->only("name", "slug", "description", "parent_id", "is_active", "is_featured", "seo_title", "seo_description", "seo_keywords", "file_is_deleted");

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

    public function destroy(JobCategory $category): JsonResponse
    {
        try {
            $delete = $this->jobCategoryService->setCategory($category)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@destroy");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }

    public function changeStatus(JobCategory $category, Request $request): JsonResponse
    {
        try {
            $data = [
              "is_active" => $request->input("is_active") ? "1" : "0",
            ];

            $status = $this->jobCategoryService->setCategory($category)->changeField($data);

            if (!$status) {
                return json_response(__('text.unexpected_error_text'), 500);
            }
            return json_response(__('app.success'), 202);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@changeStatus");
            return json_response(__("text.unexpected_error_text"), 500);
        }
    }
}
