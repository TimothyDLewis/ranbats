<?php

namespace RanBats\Http\Middleware\Sentinel;

use Closure;
use Sentinel;

class RedirectIfAuthenticated {
    public function handle($request, Closure $next, $guard = null) {
        if(Sentinel::check()) {
            $user = \Sentinel::getUser();
            
            $redirectUrl = session()->get("loginRedirect", "/");
            session()->forget("loginRedirect");

            $request->session()->reflash();

            return redirect($redirectUrl);
        }

        return $next($request);
    }
}