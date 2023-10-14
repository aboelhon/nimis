<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InActiveUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (
            Auth::guard('user')->check() &&
            Auth::guard('user')->user()->role == 'user' &&
            Auth::guard('user')->user()->status == 'inactive' &&
            Auth::guard('user')->user()->deleted_at == null
        ) {
            return $next($request);
        } else {
            return redirect(route('user.login'));
        }
    }
}
