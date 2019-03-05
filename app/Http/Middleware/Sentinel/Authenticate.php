<?php

namespace RanBats\Http\Middleware\Sentinel;

use Closure;
use Sentinel;

use RanBats\Classes\FeedbackObject;

class Authenticate {
    public function handle($request, Closure $next, $guard = null) {
        if(!Sentinel::check()) {
            if($request->ajax() || $request->wantsJson()) {
                return response("Unauthorized.", 401);
            } else {
            	$feedback = new FeedbackObject("warning", "fa fa-info-circle", "Please login to your account.<br/>Don't have an account? Please <a href='".url("/register")."'>register</a> now.");
                return redirect()->guest("login")->with(["feedback" => $feedback]);
            }
        }

        return $next($request);
    }
}
