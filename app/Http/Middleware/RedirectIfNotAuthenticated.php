<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RedirectIfNotAuthenticated
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
       if(Session::has('role')){
            if(Session::get('role')>=1){
                return $next($request);
            } else {
                return redirect('/');
            }
       } else{
            return redirect('/');
       }
    }
}
