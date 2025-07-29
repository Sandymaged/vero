<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class SetDefaultLocaleForUrls
{
    public function handle($request, Closure $next)
    {

        if (in_array($request->segment(1), array_keys(config('app.allowed_languages')))) {
            $locale = $request->segment(1);

            app()->setLocale($locale);

            URL::defaults(['locale' => $locale]);
        }

        return $next($request);
    }
}
