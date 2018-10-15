<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
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
        if(Auth::user() && Auth::user()->roles == "admin") {
            return $next($request);   
        } elseif(!Auth::user()->email_verified_at) {
            return redirect('/email/verify');
        } else {
            return redirect('/home');
        }
    }
}
