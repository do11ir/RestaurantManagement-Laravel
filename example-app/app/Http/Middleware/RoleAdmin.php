<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if($request->user()->RoleAdmin == 'admin' || $request->user()->RoleAdmin == 'master')
        {
            return $next($request);
        }
        else 
        return redirect(route('login'));
    }
}
