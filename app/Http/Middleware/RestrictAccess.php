<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;

class RestrictAccess
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
        if(Auth::id()) {
            return $next($request);
        } else {
            return redirect("/login");
        }
    }
}
