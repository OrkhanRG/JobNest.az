<?php

namespace App\Http\Controllers\Admin;

use App\Constants\LoadLimit;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyCreateRequest;
use App\Http\Requests\CurrencyUpdateRequest;
use App\Http\Services\CurrencyService;
use App\Models\Currency;
use App\Traits\Loggable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    use Loggable;
    public function __construct(
        readonly CurrencyService $currencyService
    ) {}

    public function index(Request $request): View|JsonResponse
    {
        if ($request->ajax()) {
            $params = [
                ...$request->only("keyword", "is_active", "offset"),
                "limit" => LoadLimit::LANGUAGES
            ];

            $data = $this->currencyService->getAll($params);
            return json_response(__("app.success"), Response::HTTP_OK, $data);
        }

        return view('admin.currencies.list');
    }

    public function getAll(): JsonResponse
    {
        $data = $this->currencyService->getAll(["is_active" => Status::ACTIVE]);
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), Response::HTTP_NO_CONTENT) : json_response(__("app.success"), Response::HTTP_OK, $data);
    }

    public function create(): View
    {
        return view('admin.currencies.create-update');
    }

    public function store(CurrencyCreateRequest $request): JsonResponse
    {
        try {
            $data = $request->only("code", "name", "symbol", "is_active");
            $currency = $this->currencyService->create($data);

            if (!$currency) {
                return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return json_response(__('app.success'), Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CurrencyController@stroe");

            $message = __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function edit(Currency $currency): View
    {
        return view('admin.currencies.create-update', compact('currency'));
    }

    public function update(CurrencyUpdateRequest $request, Currency $currency): JsonResponse
    {
        try {
            $data = $request->only("code", "name", "symbol", "is_active");
            $update = $this->currencyService->setCurrency($currency)->update($data);

            if (!$update) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CurrencyController@update");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Currency $currency): JsonResponse
    {
        try {
            $delete = $this->currencyService->setCurrency($currency)->remove();

            if (!$delete) {
                return json_response(__('text.unexpected_error_text'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CurrencyController@destroy");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeStatus(Currency $currency, Request $request): JsonResponse
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
                return json_response(__('text.not_have_is_default_currency'), Response::HTTP_BAD_REQUEST);
            }

            $status = $this->currencyService->setCurrency($currency)->changeField($data);

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
