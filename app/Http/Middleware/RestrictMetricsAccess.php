<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictMetricsAccess
{
    protected array $allowedIps = [
        '10.0.0.5',        // Prometheus server
        '127.0.0.1',       // Local scraping
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (! in_array($request->ip(), $this->allowedIps)) {
            abort(403, 'Metrics access denied');
        }

        return $next($request);
    }

}
