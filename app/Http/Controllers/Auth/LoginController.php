<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserLoginStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function __construct(public LoginService $loginService)
    {
    }

    public function index(LoginRequest $request): JsonResponse|RedirectResponse
    {
        try {
            $data = $request->only("email", "password", "remember_me");
            $data["remember_me"] = $request->has('remember_me');
            $status = $this->loginService->login($data);

            $response = match ($status) {
                UserLoginStatus::UserNotFound => json_response(__('text.user_login_error_text'), 204),
                UserLoginStatus::UserNotVerified => json_response(__('text.user_not_verified_text'), 403),
                default => null
            };

            return $response ?? json_response(__("text.user_login_success_text"), 200);
        } catch (\Throwable $th) {
            logger()->error('User Login Error', ['error' => $th->getMessage()]);
            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function redirect(string $driver): RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver): RedirectResponse
    {
        try {
            $user = $this->loginService->callbackSocialite($driver);

            if ($user) {
                alert()->success(__('text.user_login_success_text'));
            } else {
                alert()->error(__('text.unexpected_error_text'));
            }
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            alert()->error(__('text.unexpected_error_text'));
        }

        return redirect()->intended(route("front.index"));
    }
}
