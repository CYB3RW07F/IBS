<?php

namespace App\Http\Middleware;

use Closure;

class User
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
        {
            if (Auth::check() && Auth::user()->role == 'customer') {
                return $next($request);
            }
            elseif (Auth::check() && Auth::user()->role == 'admin') {
                return redirect('/admin');
            }
            else {
                return redirect('/');
            }
        }
    }
}
