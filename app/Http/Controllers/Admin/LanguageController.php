<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageCreateRequest;
use App\Http\Requests\LanguageUpdateRequest;
use App\Http\Services\LanguageService;
use App\Models\Language;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    use Loggable;
    public function __construct(
        readonly LanguageService $languageService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "is_active", "offset"),
                "limit" => LoadLimit::LANGUAGES
            ];

            $data = $this->languageService->getAll($params);
            return json_response(__("app.success"), 200, $data);
        }

        return view('admin.languages.list');
    }

    public function getAll(): JsonResponse
    {
        $data = $this->languageService->getAll();
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), Response::HTTP_NO_CONTENT) : json_response(__("app.success"), Response::HTTP_OK, $data);
    }

    public function create(): View
    {
        return view('admin.languages.create-update');
    }

    public function store(LanguageCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "code", "native_name", "is_active");
            $language = $this->languageService->create($data);

            if (!$language) {
                return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "LanguageController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(Language $language): View
    {
        return view('admin.languages.create-update', compact('language'));
    }

    public function update(LanguageUpdateRequest $request, Language $language): JsonResponse
    {
        try {
            $data = $request->only("name", "code", "native_name", "is_active");
            $update = $this->languageService->setLanguage($language)->update($data);

            if (!$update) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "LanguageController@update");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Language $language): JsonResponse
    {
        try {
            $delete = $this->languageService->setLanguage($language)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "LanguageController@destroy");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeStatus(Language $language, Request $request): JsonResponse
    {
        try {
            $data = [
                "key" => trim($request->input("key")),
                "value" => trim($request->input("value")),
            ];

            if (!in_array($data["key"], ["is_active", "is_default"])) {
                return json_response(__('text.wrong_parameter'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            if ($data["key"] === "is_default" && $data["value"] == "0") {
                return json_response(__('text.not_have_is_default_language'), Response::HTTP_BAD_REQUEST);
            }

            $status = $this->languageService->setLanguage($language)->changeField($data);

            if (!$status) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "JobCategoryController@changeStatus");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
