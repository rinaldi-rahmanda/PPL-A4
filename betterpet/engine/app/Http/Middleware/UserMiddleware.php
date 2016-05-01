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
        if(Auth::check()){
            if(!Session::get('user')){
                $user = Auth::user();
                Session::put('user','1');
                Session::put('name',$user->name);
            }
            return $next($request);            
        }
        return redirect('/login');
    }

}