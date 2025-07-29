<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MerchantMiddleware
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

        if (auth('merchant')->check() && auth('merchant')->user()->getIsActive()->value) {
            return $next($request);
        }
        auth()->guard('merchant')->logout();
        return redirect()->route('merchant.auth.login');
    }
}
