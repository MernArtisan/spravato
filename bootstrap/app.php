<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
            'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,  
            'guest.home' => \App\Http\Middleware\RedirectIfAuthenticatedToFeed::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->reportable([Throwable::class]);
    })->create();
