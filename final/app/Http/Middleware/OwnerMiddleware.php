<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware
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
        // check owner is login and role id is equals to one
        if(Auth::check() && Auth::user()->role->id == 1){
            return $next($request);
        }else{
            // return to login page
            return redirect()->route('login'); 
        }
    }
}
