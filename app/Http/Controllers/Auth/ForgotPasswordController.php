<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Services\ForgotPasswordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function __construct(protected ForgotPasswordService $forgotPasswordService){}

    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        try {
            $email = $request->input('email');
            $status = $this->forgotPasswordService->sendPasswordResetEmail($email);

//            if(!$status){
//                return json_response(__('text.user_not_found_text'), 204);
//            }

            return json_response(__('text.success_send_password_reset_email_text'), 200);

        } catch (\Throwable $th) {
            logger()->error('User Login Error', ['error' => $th->getMessage()]);
            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function resetPasswordForm(Request $request): View
    {
        $token = $request->input('token');
        if (!$this->forgotPasswordService->checkUserByToken($token, false)) {
         alert()->error(__("app.warning"), __('text.user_reset_password_failed_text'));
        }

        return view("front.home",[
            "show_forgot_password" => true
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        try {
            $params = $request->only("password", "password_confirmation", "token");
            $user = $this->forgotPasswordService->checkUserByToken($params["token"]);

            if (!$user) {
                return json_response(__('text.user_reset_password_failed_text'), 404);
            }

            if (!$this->forgotPasswordService->updateUser($user, ["password" => bcrypt($params["password"])])) {
                return json_response(__('text.unexpected_error_text'), 500);
            }

            return json_response(__('text.user_success_password_reset_text'), 202);

        } catch (\Throwable $th) {
            logger()->error('User Password Reset Error', ['error' => $th->getMessage()]);
            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }
}
