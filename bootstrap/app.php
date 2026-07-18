<?php

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\CustomAuthMiddleware;
use App\Http\Middleware\HeadAdminAuthMiddleware;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\TutorAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'custom.auth' => CustomAuthMiddleware::class,
            'tutor.auth'  => TutorAuthMiddleware::class,
            'admin.auth'  => AdminAuthMiddleware::class,
            'head.auth'  => HeadAdminAuthMiddleware::class,
            'back.history'  => PreventBackHistory::class
  

        ]);
        $middleware->validateCsrfTokens(except:[
            '/webhook',
            '/createinvoice',
            '/webhooks/payment',
            '/payment/succeeded',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
