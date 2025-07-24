<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentTranslationCreateRequest;
use App\Http\Requests\ContentTranslationUpdateRequest;
use App\Http\Services\ContentTranslationService;
use App\Http\Services\LanguageService;
use App\Models\ContentTranslation;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ContentTranslationController extends Controller
{
    use Loggable;
    public function __construct(
        readonly ContentTranslationService $contentTranslationService,
        readonly LanguageService $languageService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "lang_id", "is_active", "offset"),
                "group" => switchKeyToBlob("content_translations.group.".$request->group),
                "limit" => LoadLimit::CONTENT_TRANSLATIONS
            ];

            $data = $this->contentTranslationService->getAll($params);
            return json_response(__("app.success"), 200, $data);
        }

        $groups = config("blob.content_translations.group");
        $langs = $this->languageService->getAll();

        return view('admin.content_translations.list', compact('groups', 'langs'));
    }

    public function getAll(): JsonResponse
    {
        $data = $this->contentTranslationService->getAll();
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), Response::HTTP_NO_CONTENT) : json_response(__("app.success"), Response::HTTP_OK, $data);
    }

    public function create(): View
    {
        $groups = config("blob.content_translations.group");
        $langs = $this->languageService->getAll();

        return view('admin.content_translations.create-update', compact('groups', 'langs'));
    }

    public function store(ContentTranslationCreateRequest $request): JsonResponse
    {
        try {
            $data = [
                ...$request->only("key", "value", "lang_id", "is_active"),
                "group" => switchKeyToBlob("content_translations.group.".$request->group)
            ];

            $content_translation = $this->contentTranslationService->create($data);

            if (!$content_translation) {
                return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "ContentTranslationController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(ContentTranslation $content_translation): View
    {
        $groups = config("blob.content_translations.group");
        $langs = $this->languageService->getAll();

        return view('admin.content_translations.create-update', compact('content_translation',  'groups', 'langs'));
    }

    public function update(ContentTranslationUpdateRequest $request, ContentTranslation $content_translation): JsonResponse
    {
        try {
            $data = [
                ...$request->only("key", "value", "lang_id", "is_active"),
                "group" => switchKeyToBlob("content_translations.group.".$request->group)
            ];
            $update = $this->contentTranslationService->setContentTranslation($content_translation)->update($data);

            if (!$update) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "ContentTranslationController@update");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(ContentTranslation $content_translation): JsonResponse
    {
        try {
            $delete = $this->contentTranslationService->setContentTranslation($content_translation)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "ContentTranslationController@destroy");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeStatus(ContentTranslation $content_translation, Request $request): JsonResponse
    {
        try {
            $data = [
                "key" => trim($request->input("key")),
                "value" => trim($request->input("value")),
            ];

            if ($data["key"] !== "is_active") {
                return json_response(__('text.wrong_parameter'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $status = $this->contentTranslationService->setContentTranslation($content_translation)->changeField($data);

            if (!$status) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "ContentTranslationController@changeStatus");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
