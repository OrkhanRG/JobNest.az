<?php

namespace App\Listeners;

use App\Events\PasswordReset;
use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class SendPasswordResetEmail
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
    public function handle(PasswordReset $event): void
    {
        $token = Str::random(60);
        Cache::put("forgot-password-$token", $event->user->id, now()->addHour());
        $event->user->notify(new PasswordResetNotification($token));
    }
}
