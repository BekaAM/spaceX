<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{

    /**
     * Handle an incoming request. User must be logged in to do admin check
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->status  == 1)
    
        {
            return $next($request);
        } 
        if ($request->user() && $request->user()->status  == 0)
    
        {
            return redirect()->guest('/aprove');
        }else{

            return redirect()->guest('/');
        }
        
      

        
    }
}