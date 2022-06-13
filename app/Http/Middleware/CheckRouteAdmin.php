<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Cache;
use App\User;

class CheckRouteAdmin
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
        $check="admin@gmail.com";
        if(Auth::check())
        {
            if (Auth::check()) 
            {
                $expiresAt = now()->addMinutes(2); /*keep online for 2 min */
                Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
      
                /* last seen */
                User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
            }
            
            if($check==Auth::user()->email)
            {
              return $next($request);
              
              
            
            }
            
        }
        else
        {
            return redirect("noaccess");
            //dd("no");
        }
         //return $next($request);
    }
}
