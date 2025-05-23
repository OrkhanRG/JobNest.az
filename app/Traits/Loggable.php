<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Throwable;

trait Loggable
{
    /**
     * Log exception with detailed context.
     *
     * @param Throwable $e
     * @param string|null $context Optional extra context info
     * @return void
     */
    public function logErrorToFile(Throwable $e, string $context = null): void
    {
        $user = Auth::check() ? Auth::user()->only(['id', 'name', 'email']) : ['guest' => true];
        $ip = Request::ip();
        $url = Request::fullUrl();
        $method = Request::method();
        $input = Request::except(['password', 'password_confirmation']);
        $userAgent = Request::header('User-Agent');

        $log = [
            'datetime'   => now()->toDateTimeString(),
            'context'    => $context ?? 'N/A',
            'exception'  => [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'code'    => $e->getCode(),
                'trace'   => $e->getTraceAsString(),
            ],
            'request'    => [
                'url'     => $url,
                'method'  => $method,
                'ip'      => $ip,
                'input'   => $input,
                'user_agent' => $userAgent,
            ],
            'user'       => $user,
        ];

        Log::channel('custom_error')->error('⚠️ Application Error Log:', $log);
    }
}
