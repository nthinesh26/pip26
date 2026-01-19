<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            abort(401, 'Unauthenticated');
        }

        if(auth()->user()->type != $role){
            abort(403, 'Unauthorized access ' . $role.' '.auth()->user()->type);
        }
        return $next($request);
    }
}