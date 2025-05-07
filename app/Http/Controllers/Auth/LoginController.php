<?php

namespace App\Http\Controllers\Auth;

use App\Constants\Status;
use App\Enums\UserLoginStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\LoginService;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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

    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver)
    {
        DB::beginTransaction();

        $driver_user = Socialite::driver($driver)->user();
        dd($driver_user);
        $user = User::query()->where("email", $driver_user->getEmail())->first();

        if ($user) {
            return redirect()->intended(route("front.index"));
        }

        try {
            $rand_password = Str::random(16);
            $user = User::query()->create([
                "name" =>  $driver_user->user["given_name"],
                "surname" =>  $driver_user->user["family_name"],
                "avatar" => $driver_user->avatar,
                "email" => $driver_user->getEmail(),
                "email_verified_at" => now(),
                "status" => Status::ACTIVE,
                "password" => bcrypt($rand_password),
            ]);

            Candidate::query()->create([
                "user_id" => $user->id,
                "slug" => slugify($driver_user->getName(), Candidate::class),
            ]);

            $user->assignRole("candidate");
            DB::commit();
            alert()->success(__('text.user_login_success_text'));
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            alert()->error(__('text.unexpected_error_text'));
            DB::rollBack();
        }

        return redirect()->intended(route("front.index"));
    }
}
