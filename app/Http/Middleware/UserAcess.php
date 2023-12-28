<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class UserAcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , $role)
    {
        if (auth()->user()->role === $role){
            return $next($request);
        }
     $url = "/".auth()->user()->role;
        return  redirect($url)->withErrors("Vous ne pouvez pas accéder à cette page.");
    }
}
