<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\UserToken;
use Cookie;
use Illuminate\Support\Facades\Auth;
use Log;

class ReferrerPolicyHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $response = $next($request);

        $response->header('Referrer-Policy', config('app.referrer_policy'));

        return $response;
    }
}

