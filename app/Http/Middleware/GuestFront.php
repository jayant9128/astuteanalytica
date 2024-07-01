<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Redirect;

class GuestFront
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
        if(Auth::check() && Auth::user()->user_role=='ADMIN'){
            Auth::logout();
            return Redirect:: to('/');
        }else{

                return $next($request);

        }
    }
}
