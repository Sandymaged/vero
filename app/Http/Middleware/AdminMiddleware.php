<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth('admin')->check() && auth('admin')->user()->getIsActive()->value) {
            return $next($request);
        }
        auth()->guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
