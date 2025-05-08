<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Services\ForgotPasswordService;

class ForgotPasswordController extends Controller
{
    public function __construct(protected ForgotPasswordService $forgotPasswordService){}

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $email = $request->input('email');
            $status = $this->forgotPasswordService->sendPasswordResetEmail($email);

            if(!$status){
                return json_response(__('text.user_not_found_text'), 204);
            }

            return json_response(__('text.success_send_password_reset_email_text'), 200);

        } catch (\Throwable $th) {
            logger()->error('User Login Error', ['error' => $th->getMessage()]);
            $message = config('app.debug') ? $th->getMessage() : __("text.unexpected_error_text");
            return json_response($message, 500);
        }
    }

    public function resetPasswordForm(string $token)
    {
        dd($token);
    }

    public function resetPassword()
    {

    }
}
