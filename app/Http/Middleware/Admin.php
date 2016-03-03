<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
//        Auth::logout();


        if (Auth::check())
        {
            if (Auth::user()->hasRole('admin'))
            {
                return redirect()->route('admin::dashboard');
            }
        }



        return $next($request);
    }

}
