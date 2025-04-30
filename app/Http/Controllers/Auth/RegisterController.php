<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\RegisterService;

class RegisterController extends Controller
{
    public function __construct(protected RegisterService $registerService)
    {
    }

    public function index(RegisterRequest $request)
    {
        $data = $request->only("name", "surname", "email", "password", "user_type");

        if (!$data["user_type"]) {
            $data["user_type"] = config("jobnest.user_type");
        }

        try {
            $user = $this->registerService->create($data);

            if (!$user) {
                return json_response(500, __("text.user_create_failed_text"));
            }

            return json_response(200, __("text.user_create_success_text"));
        } catch (\Throwable $th) {
            logger()->error('User Register Error', ['error' => $th->getMessage()]);

            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response(500, $message);
        }
    }
}
