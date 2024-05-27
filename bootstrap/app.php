<?php

use App\Http\Middleware\CheckAdminUser;
use App\Http\Middleware\CheckMerchantUser;
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
       // $middleware->append(CheckAdminRole::class);
       $middleware->alias(['admin' => CheckAdminUser::class]);
       $middleware->alias(['merchant' => CheckMerchantUser::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
