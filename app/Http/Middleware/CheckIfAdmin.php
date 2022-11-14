<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->admin == 'y') {
            return $next($request);
        }  
        return redirect('/');
    }
}