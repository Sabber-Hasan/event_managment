<?php

use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckMerchantRole;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['admin' => CheckAdminRole::class]);
        $middleware->alias(['merchant' => CheckMerchantRole::class]);
        $middleware->alias(['user' => CheckUserRole::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();