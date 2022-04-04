<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\UserToken;
use Cookie;
use Illuminate\Support\Facades\Auth;
use Log;

class APIAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $loginToken = $request->header("Authorization");

        $userToken = UserToken::where("token", $loginToken)->first();

        if ($userToken == null) {
            return response()->json(["errorNumber"=>1001, "errorMessage"=>"You are not logged in."])->setStatusCode(401);
        }

        $user = User::find($userToken->user_id);
        Auth::login($user);

        $response = $next($request);

        return $response;
    }
}

