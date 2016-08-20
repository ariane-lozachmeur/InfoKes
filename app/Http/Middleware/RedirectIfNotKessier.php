<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RedirectIfNotKessier
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
            if(Session::get('role')==1){
                return redirect('/');
            }
        return $next($request);
        } else {
            return redirect('/');
        }
    }
}
