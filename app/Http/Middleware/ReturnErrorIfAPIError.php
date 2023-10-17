<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Helpers\TokenHelper;
use Closure;

class ReturnErrorIfAPIError
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        //get the token
        $userData = $request->header('leadreactortoken');
        $tokenHelper = new TokenHelper($userData);

        $response = [];

        if (! $tokenHelper->isValidToken()) {
            $response['message'] = 'invalid token';

            //invalid token
            return response()->json($response, 200);
        } elseif (! $tokenHelper->isAuthorized()) {
            $response['message'] = 'not authorized';

            //not authorized
            return response()->json($response, 200);
        }

        return $next($request);
    }
}
