<?php

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\LoggedinMiddleware;
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
        // Ajouter notre middleware aux middleware globaux
        // $middleware->append(LoggedinMiddleware::class);

        $middleware->appendToGroup('loggedin',[
            LoggedinMiddleware::class
        ]);

        $middleware->appendToGroup('admin',[
            LoggedinMiddleware::class,
            IsAdminMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
