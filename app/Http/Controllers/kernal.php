<?php
namespace App\Http\Controllers;

class Kernal
{
    protected $middlewareGroups = [
        'web' => [
            // ... other middleware
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
}