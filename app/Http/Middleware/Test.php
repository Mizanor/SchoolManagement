<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Test
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
        if(Auth::check()){
            return $next($request);

        }else{
            return redirect('/login');
            //For Same Page We use (    return redirect()->back();   )
        }
        
    }
}