<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin' => Middleware\UnauthorizedIfNotAdministrator::class,
        'advertiser' => Middleware\UnauthorizedIfNotAdvertiser::class,
        'affiliate' => Middleware\UnauthorizedIfNotAffiliate::class,
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => Middleware\RedirectIfAuthenticated::class,
        'restrict_access' => Middleware\RestrictSectionAccessIfNotPermitted::class,
        'api' => Middleware\ReturnErrorIfAPIError::class,
        'api.basic_auth' => Middleware\ApiBasicAuthorization::class,
        'reports_access' => Middleware\Cors::class,
    ];
}
