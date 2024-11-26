<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $parametro): Response
    {
        if ($request->route()->hasParameter('id') && $request->route()->parameter('id') > $parametro) {
            return redirect('/');
        }
        return $next($request);
    }
}
