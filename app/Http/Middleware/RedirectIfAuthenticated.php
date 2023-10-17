<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->auth->check()) {
            if ($request->user()->isAdministrator()) {
                return redirect('/admin');
            } elseif ($request->user()->affiliate) {
                return redirect('/affiliate/dashboard');
            } else {
                return redirect('/advertiser/dashboard');
            }
        }

        return $next($request);
    }
}
