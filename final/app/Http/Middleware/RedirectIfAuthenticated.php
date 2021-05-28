<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1) {
            // here owner. is equals to roting page as keyword
            return redirect()->route('owner.ownerdashboad');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 2){
            return redirect()->route('instructor.instructordashboad');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 3){
            return redirect()->route('student.instructordashboad');
        } else{
            return $next($request);
        }
    }
}
