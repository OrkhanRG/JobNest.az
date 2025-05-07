<?php

namespace App\Http\Controllers\Auth;

use App\Enums\EmailVerificationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\RegisterService;
use App\Models\UserVerify;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function verify(string $token): RedirectResponse
    {
        try {
            $status = $this->registerService->verifyEmail($token);

            match ($status) {
                EmailVerificationStatus::Success =>
                alert()->success(__('text.user_verify_success_text')),

                EmailVerificationStatus::AlreadyVerified =>
                alert()->info(__('text.user_verify_already_verified_text')),

                EmailVerificationStatus::TokenExpired =>
                alert()->html(
                    __('text.user_verify_token_expire_text'),
                    __("text.user_resend_verify_token_text", ["route" => route('resend.user-verify', ["token" => $token])]),
                    'info'
                )->persistent(),

                EmailVerificationStatus::InvalidToken,
                EmailVerificationStatus::UserNotFound =>
                alert()->error(__('text.user_verify_invalid_token_text')),
            };

            return redirect()->route('front.index');

        } catch (\Throwable $th) {
            logger()->error('Email Verify Error', ['error' => $th->getMessage()]);
            alert(config('app.debug') ? $th->getMessage() : __('text.unexpected_error_text'));
            return redirect()->route("front.index");
        }
    }

    public function resendVerify(Request $request): RedirectResponse
    {
        $params = $request->only("email", "token");

        if (array_key_exists("email", $params) && $params["email"]) {
            $status = $this->registerService->resendVerifyByEmail($params["email"]);

            match ($status) {
                EmailVerificationStatus::Success => alert()->success(__('text.user_resend_verify_success_text')),
                EmailVerificationStatus::AlreadyVerified =>  alert()->info(__('text.user_verify_already_verified_text')),
                EmailVerificationStatus::UserNotFound =>  alert()->error(__('text.user_not_found_text')),
            };
        } else {
            $status = $this->registerService->resendVerify($params["token"]);

            if (!$status) {
                alert()->error(__('text.user_resend_verify_failed_text'));
            } else {
                alert()->success(__('text.user_resend_verify_success_text'));
            }
        }



        return redirect()->intended(route("front.index"));
    }

    public function logout(): RedirectResponse
    {
        $this->registerService->logout();

        alert()->success(__('text.user_logout_success_text'));
        return redirect()->route("front.index");
    }
}
