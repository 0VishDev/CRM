<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoute
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
        if(Auth::check())
        {
            return $next($request);
            //dd("yes");
        }
        else
        {
            return redirect("noaccess");
            //dd("no");
        }
         //return $next($request);
    }
}
