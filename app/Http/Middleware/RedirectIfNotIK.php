<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RedirectIfNotIK
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
            if(Session::get('role')<3){
                return redirect('/');
            }
        return $next($request);
        } else {
            return redirect('/');
        }
    }
}
