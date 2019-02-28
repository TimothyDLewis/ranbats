<?php

namespace RanBats\Http\Middleware\Sentinel;

use Closure;
use Sentinel;

class Authenticate {
    public function handle($request, Closure $next, $guard = null) {
        if(!Sentinel::check()) {
            if($request->ajax() || $request->wantsJson()) {
                return response("Unauthorized.", 401);
            } else {
                return redirect()->guest("login");
            }
        }

        return $next($request);
    }
}
