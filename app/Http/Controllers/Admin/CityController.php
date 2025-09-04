<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Http\Services\CityService;
use App\Http\Services\CountryService;
use App\Http\Services\LanguageService;
use App\Models\City;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    use Loggable;
    public function __construct(
        readonly CityService $cityService,
        readonly LanguageService $languageService,
        readonly CountryService $countryService,
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "lang_id", "country_id", "is_active", "offset"),
                "limit" => LoadLimit::CITIES
            ];

            $data = $this->cityService->getAll($params);
            return json_response(__("app.success"), Response::HTTP_OK, $data);
        }

        $langs = $this->languageService->getAll(["is_active" => Status::ACTIVE]);
        $countries = $this->countryService->getAll([
            "is_active" => Status::ACTIVE,
            "lang_id" => $this->languageService->getByCode(app()->getLocale())?->id
        ]);

        return view('admin.cities.list', compact('langs', "countries"));
    }

    public function getAll(Request $request): JsonResponse
    {
        $params = [
            ...$request->only("country_id"),
            "lang_id" => langConvert($request->lang_id),
            "is_active" => Status::ACTIVE
        ];

        $data = $this->cityService->getAll($params);
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), Response::HTTP_NO_CONTENT) : json_response(__("app.success"), Response::HTTP_OK, $data);
    }

    public function create(): View
    {
        $langs = $this->languageService->getAll(["is_active" => Status::ACTIVE]);

        return view('admin.cities.create-update', compact('langs'));
    }

    public function store(CityCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "short_name", "region_code", "country_id", "lang_id", "is_active");

            if (!$this->cityService->create($data)) {
                return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CityController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(City $city): View
    {
        $langs = $this->languageService->getAll(["is_active" => Status::ACTIVE]);
        return view('admin.cities.create-update', compact('city', 'langs'));
    }

    public function update(CityUpdateRequest $request, City $city): JsonResponse
    {
        try {
            $data = $request->only("name", "short_name", "region_code", "country_id", "lang_id", "is_active");

            if (!$this->cityService->setCity($city)->update($data)) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CityController@update");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(City $city): JsonResponse
    {
        try {
            if (!$this->cityService->setCity($city)->remove()) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CityController@destroy");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeStatus(City $city, Request $request): JsonResponse
    {
        try {
            $data = [
                "key" => trim($request->input("key")),
                "value" => trim($request->input("value")),
            ];

            if ($data["key"] !== "is_active") {
                return json_response(__('text.wrong_parameter'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            if (!$this->cityService->setCity($city)->changeField($data)) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CityController@changeStatus");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
