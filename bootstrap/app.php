<?php

use App\Http\Middleware\ContentTypeOptionsMiddleware;
use App\Http\Middleware\RestrictMetricsAccess;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'role' => RoleMiddleware::class,
        'metrics' => RestrictMetricsAccess::class,
    ]);
    $middleware->apppend(
        ContentTypeOptionsMiddleware::class,
    );
})
->withExceptions(function (Exceptions $exceptions): void {
        //
})->create();
