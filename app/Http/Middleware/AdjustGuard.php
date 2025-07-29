<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdjustGuard
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth('admin')->check()) {
            $guard = 'admin';
        } elseif (auth('merchant')->check()) {
            $guard = 'merchant';
        } else {
            $guard = '';
        }

        $request->attributes->add(['guard' => $guard]);

        return $next($request);
    }
}
