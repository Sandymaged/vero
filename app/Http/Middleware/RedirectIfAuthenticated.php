<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'merchant':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('merchant.dashboard.index');
                }
                break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard.index');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('home');
                }
                break;
        }

        return $next($request);
    }
}
