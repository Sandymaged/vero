<?php

if (!function_exists('getIsActive')) {
    /**
     * generate active column for datatable
     * @param $column
     * @return string
     */
    function getIsActive($column)
    {
        if (!empty($column) && $column->value) {
            return getBadgeLightSpan('success', trans('messages.active'));
        } else {
            return getBadgeLightSpan('danger', trans('messages.inactive'));
        }
    }
}

if (!function_exists('getBadgeLightSpan')) {
    function getBadgeLightSpan($class, $text)
    {
        return "<span class='badge badge-light-$class fw-bolder'>{$text}</span>";
    }
}


if (!function_exists('locale')) {
    /**
     * Generate a url for the application.
     *
     * @param string|null $path
     * @param mixed $parameters
     * @param bool|null $secure
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function locale($path = null)
    {
        $locale = '';
        if (in_array(request()->segment(1), array_keys(config('app.allowed_languages')))) {
            $locale = request()->segment(1);
        }

        return str_replace('//', '/', $locale . '/' . $path);
    }
}


if (!function_exists('localeUrl')) {
    /**
     * Generate a url for the application.
     *
     * @param string|null $path
     * @param mixed $parameters
     * @param bool|null $secure
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function localeUrl($path = null)
    {
        return url(locale($path));
    }
}

if (!function_exists('isRTL')) {
    function isRTL()
    {
        $locale = app()->getLocale();
        if (in_array(request()->segment(1), array_keys(config('app.allowed_languages')))) {
            $locale = request()->segment(1);
        }

        return in_array($locale, config('app.rtl_languages'));
    }
}
