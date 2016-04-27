<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            #########################################
            if (!is_null($request->header('token'))) {
                $user = \App\User::where(['token' => $request->header('token')])->firstOrFail();
                if ($user) {
                    return $next($request);
                }
            }
            $returnData = [
                'status' => 401,
                'message' => 'Unauthorized.'
            ];
            return response(json_encode($returnData), $returnData['status']);
            #########################################
            // if ($request->ajax() || $request->wantsJson()) {
            //     return response('Unauthorized.', 401);
            // } else {
            //     return redirect()->guest('login');
            // }
        }

        return $next($request);
    }
}
