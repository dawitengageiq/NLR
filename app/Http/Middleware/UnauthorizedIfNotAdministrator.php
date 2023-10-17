<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Http\Response;

class UnauthorizedIfNotAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle(Request $request, Closure $next): \Symfony\Component\HttpFoundation\Response
    {
        if ($request->user()) {
            if (! $request->user()->isAdministrator()) {
                /*
                if($request->ajax()) {
                    return response('Unauthorized.', 401);
                }
                */

                //return response('Unauthorized.', 401);
                return new Response(view('errors.unauthorized'), 401);
            }
        } else {
            //return response('Unauthorized.', 401);
            return new Response(view('errors.unauthorized'), 401);
        }

        return $next($request);
    }
}
