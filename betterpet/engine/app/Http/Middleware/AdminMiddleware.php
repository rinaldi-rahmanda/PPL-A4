<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Session;

class AdminMiddleware
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
        if(Session::get('user')||Auth::check()){
            if(!Session::get('user')){
                $user = Auth::user();
                Session::put('user','1');
                Session::put('name',$user->name);
            }
			if(Auth::user()->admin=='1'){
				return $next($request);  
			}
            else{
				return redirect('/');
			}  
        }
        return redirect('/login');
    }

}