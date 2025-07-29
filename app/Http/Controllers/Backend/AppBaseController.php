<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AppBaseController extends Controller
{
    protected $user;

    protected $guard = '';

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth('admin')->check()) {
                $this->user = auth('admin')->user();
                $this->guard = 'admin';
            } elseif (auth('merchant')->check()) {
                $this->user = auth('merchant')->user();
                $this->guard = 'merchant';
            }

            View::share('guard', $this->guard);

            return $next($request);
        });


    }
}
