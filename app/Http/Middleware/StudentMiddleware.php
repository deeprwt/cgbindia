<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('student')->User()) {
            return redirect("login")->with('error','Login Please :)');
        }
        // if(Auth::user()->last_session != Session::getId())
        // {
        //    // do logout
        //    Auth::logout();
     
        //    // Redirecto login page
        //    return redirect("login")->with('error','Login Please :)');
        // }
        return $next($request);
    }
}
