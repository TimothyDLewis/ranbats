<?php

namespace RanBats\Http\Middleware;

use Closure;
use Sentinel;

class Globals {
    public function handle($request, Closure $next, $guard = null){

        view()->share("authUser", Sentinel::getUser());
        if(env("APP_ENV", "product") == "local"){
        	Sentinel::disableCheckpoints();
        }

        return $next($request);
    }
}
