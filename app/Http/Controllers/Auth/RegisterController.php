<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\RegisterService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __construct(protected RegisterService $registerService)
    {
    }

    public function index(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->only("name", "surname", "email", "password", "user_type");
            $data["user_type"] = isset($data["user_type"]) && $data["user_type"] && in_array($data["user_type"], config("jobnest.user_types")) ? $data["user_type"] : config("jobnest.default_user_type");

            $user = $this->registerService->create($data);

            if (!$user) {
                return json_response(__("text.user_create_failed_text"), 500);
            }

            $this->registerService->sendEmail($user);

            return json_response(__("text.user_create_success_text"), 200);
        } catch (\Throwable $th) {
            logger()->error('User Register Error', ['error' => $th->getMessage()]);

            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function verify(string $token)
    {
        try {
            $is_verify = $this->registerService->verifyEmail($token);


            alert()->html(__("text.user_verify_token_expire_text"),
                            "Yeni doğrulama email'i üçün <b> <a href='//github.com'>bura</a></b> keçid edin",
                            'info')->persistent();
            return redirect()->route("front.index");
            if (!$is_verify) {
//                return json_response(__("text.user_verify_token_expire_text"), 403);
            }

//            return json_response(__("text.user_verify_success_text"), 200);
        } catch (\Throwable $th) {
            logger()->error('User Email Verify Error', ['error' => $th->getMessage()]);

            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }
}
