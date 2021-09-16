<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CandidateMiddleware
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
        if(Auth::check() && Auth::user()->role->id == 4){
            $uid=Auth::user()->id;
            if(Auth::user()->contact_no_isVerified){
                return $next($request);
            }else{
                // Auth::logout();
                return redirect()->route('AgainResendOTPLogin');
            }
        }else{
            return redirect()->route('login');
        }
        
        // return $next($request);
    }
}
