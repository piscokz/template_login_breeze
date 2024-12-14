<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$level)
{
    // if (Auth::user()->level == "admin") {
    //     return $next($request);
    // }
    // else {
    //     abort(403, 'Waduh! Unauthorized action.');
    // }
    return $next($request);
}

}
