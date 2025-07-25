<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryCreateRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Http\Services\CountryService;
use App\Http\Services\LanguageService;
use App\Models\Country;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    use Loggable;
    public function __construct(
        readonly CountryService $countryService,
        readonly LanguageService $languageService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "lang_id", "is_active", "offset"),
                "limit" => LoadLimit::COUNTRIES
            ];

            $data = $this->countryService->getAll($params);
            return json_response(__("app.success"), 200, $data);
        }

        $langs = $this->languageService->getAll(["is_active" => "1"]);
        return view('admin.countries.list', compact('langs'));
    }

    public function getAll(): JsonResponse
    {
        $data = $this->countryService->getAll(["is_active" => Status::ACTIVE]);
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), Response::HTTP_NO_CONTENT) : json_response(__("app.success"), Response::HTTP_OK, $data);
    }

    public function create(): View
    {
        $langs = $this->languageService->getAll(["is_active" => "1"]);
        return view('admin.countries.create-update', compact('langs'));
    }

    public function store(CountryCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "short_name", "phone_prefix", "lang_id", "is_active");

            if (!$this->countryService->create($data)) {
                return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CountryController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(Country $country): View
    {
        $langs = $this->languageService->getAll(["is_active" => "1"]);
        return view('admin.countries.create-update', compact('country', 'langs'));
    }

    public function update(CountryUpdateRequest $request, Country $country): JsonResponse
    {
        try {
            $data = $request->only("name", "short_name", "phone_prefix", "lang_id", "is_active");

            if (!$this->countryService->setCountry($country)->update($data)) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CountryController@update");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Country $country): JsonResponse
    {
        try {
            if (!$this->countryService->setCountry($country)->remove()) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CountryController@destroy");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeStatus(Country $country, Request $request): JsonResponse
    {
        try {
            $data = [
                "key" => trim($request->input("key")),
                "value" => trim($request->input("value")),
            ];

            if ($data["key"] !== "is_active") {
                return json_response(__('text.wrong_parameter'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            if (!$this->countryService->setCountry($country)->changeField($data)) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CountryController@changeStatus");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
