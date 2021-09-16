<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
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
        if(Auth::check() && Auth::user()->role->id == 3){
            if(Auth::user()->contact_no_isVerified){
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->back()->with('message', 'Your Account is not Verified!');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
