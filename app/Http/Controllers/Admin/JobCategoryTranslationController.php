<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategoryTranslationCreateRequest;
use App\Http\Requests\JobCategoryTranslationUpdateRequest;
use App\Http\Services\JobCategoryService;
use App\Http\Services\JobCategoryTranslationService;
use App\Http\Services\LanguageService;
use App\Models\JobCategoryTranslation;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class JobCategoryTranslationController extends Controller
{
    use Loggable;
    public function __construct(
        readonly JobCategoryTranslationService $jobCategoryTranslationService,
        readonly LanguageService $languageService,
        readonly JobCategoryService $jobCategoryService,
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "job_category_id", "lang_id", "offset"),
                "limit" => LoadLimit::JOB_CATEGORY_TRANSLATIONS
            ];

            $data = $this->jobCategoryTranslationService->getAll($params);
            return json_response(__("app.success"), Response::HTTP_OK, $data);
        }

        $langs = $this->languageService->getAll(["is_active" => Status::ACTIVE]);
        $job_categories = $this->jobCategoryService->getAll(["is_active" => Status::ACTIVE]);

        return view('admin.job_category.translations.list', compact('langs', "job_categories"));
    }

    public function create(): View
    {
        $langs = $this->languageService->getAll(["is_active" => Status::ACTIVE]);
        $job_categories = $this->jobCategoryService->getAll(["is_active" => Status::ACTIVE]);

        return view('admin.job_category.translations.create-update', compact('langs', 'job_categories'));
    }

    public function store(JobCategoryTranslationCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("lang_id", "job_category_id", "name", "description", "seo_title", "seo_description", "seo_keywords");

            if (!$this->jobCategoryTranslationService->create($data)) {
                return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryTranslationController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(JobCategoryTranslation $jobCategoryTranslation): View
    {
        $langs = $this->languageService->getAll(["is_active" => Status::ACTIVE]);
        $job_categories = $this->jobCategoryService->getAll(["is_active" => Status::ACTIVE]);

        return view('admin.job_category.translations.create-update', compact('jobCategoryTranslation', 'langs', 'job_categories'));
    }

    public function update(JobCategoryTranslationUpdateRequest $request, JobCategoryTranslation $jobCategoryTranslation): JsonResponse
    {
        try {
            $data = $request->only("lang_id", "job_category_id", "name", "description", "seo_title", "seo_description", "seo_keywords");

            if (!$this->jobCategoryTranslationService->setJobCategoryTranslation($jobCategoryTranslation)->update($data)) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryTranslationController@update");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(JobCategoryTranslation $jobCategoryTranslation): JsonResponse
    {
        try {
            if (!$this->jobCategoryTranslationService->setJobCategoryTranslation($jobCategoryTranslation)->remove()) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryTranslationController@destroy");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
