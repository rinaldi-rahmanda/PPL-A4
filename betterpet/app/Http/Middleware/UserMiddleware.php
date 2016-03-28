<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Session;

class UserMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()||Auth::viaRemember()){
            if(!Session::get('user'))
                Session::put('user','1');
            return $next($request);            
        }
        return redirect('/login');
    }

}