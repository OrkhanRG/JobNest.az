<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\UserVerify;
use App\Notifications\VerifyNotification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class SendVerifyEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $token = Str::random(60);

        UserVerify::query()->create([
            "user_id" => $event->user->id,
            "token" => $token,
            "expired_at" => now()->addHour(),
        ]);

        $event->user->notify(new VerifyNotification($token));
    }
}
