<?php

use App\Http\Middleware\CustomAuthenticate;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            "role" => CheckRole::class,
            "permission" => CheckPermission::class,
            "custom_auth" => CustomAuthenticate::class,
        ]);
    })
    ->withSchedule(function ($schedule) {
        $schedule->command('currencies:update-cba')->dailyAt('10:00');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            return response()->view("front.errors.404");
        });
    })->create();
