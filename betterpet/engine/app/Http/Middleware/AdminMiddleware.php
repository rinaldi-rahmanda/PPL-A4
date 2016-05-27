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
        if(Auth::check()){
			if(Auth::user()->admin==1){
				return $next($request);  
			}
            else{
				return redirect('/');
			}  
        }
		return redirect('/login');
    }

}