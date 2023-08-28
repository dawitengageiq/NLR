<?php

namespace App\Http\Middleware;
use App\Helpers\TokenHelper;
use Closure;

class ReturnErrorIfAPIError
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //get the token
        $userData = $request->header('leadreactortoken');
        $tokenHelper = new TokenHelper($userData);

        $response = [];

        if(!$tokenHelper->isValidToken())
        {
            $response['message'] = 'invalid token';

            //invalid token
            return response()->json($response,200);
        }
        else if(!$tokenHelper->isAuthorized())
        {
            $response['message'] = 'not authorized';

            //not authorized
            return response()->json($response,200);
        }

        return $next($request);
    }
}
