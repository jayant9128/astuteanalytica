<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Redirect;

class GuestAdmin
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
        if(Auth::check() && Auth::user()->user_role=='FRONT'){
            Auth::logout();
            return Redirect::to('masterAdmin/login');
        }else{
            return $next($request);
        }
    }
}
