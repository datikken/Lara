<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;

class CheckUserRole
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
        $userRole = DB::table('users')->where('id', Auth::id())->value('role');

        return $next($request);
//
//
//        if($userRole === 10) {
//            return $next($request);
//        } else {
//            return redirect("/login");
//        }
    }
}
