<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // dd(auth()->user());
        if(auth()->guest()){
            return redirect('/login');
        }

        if(auth()->user()->authorization != '0'){
            return redirect('/');
        }
        return $next($request);

        
    }
}
