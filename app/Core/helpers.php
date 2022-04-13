<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('urlGenerator')) {
    /**
     * @return \Laravel\Lumen\Routing\UrlGenerator
     */
    function urlGenerator()
    {
        return new \Laravel\Lumen\Routing\UrlGenerator(app());
    }
}

if (!function_exists('asset')) {
    /**
     * @param      $path
     * @param bool $secured
     *
     * @return string
     */
    function asset($path, $secured = true)
    {
        return app('url')->asset($path, env("APP_ENV") != "local");
    }
}

if (!function_exists('public_path')) {
    /**
     * Get the path to the public folder.
     *
     * @param string $path
     *
     * @return string
     */
    function public_path($path = '')
    {
        return base_path('public') . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param string $path
     *
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('app_path')) {
    function app_path($path = '')
    {
        return base_path('app' . DIRECTORY_SEPARATOR . ltrim($path, '/'));
    }
}

if (!function_exists('seo')) {
    function seo($key)
    {
        $value = __($key);
        if (is_array($value)) {
            if (!Session::has($key)) {
                Session::put($key, $value[rand(0, count($value) - 1)]);
            }
            return Session::get($key);
        }
        return $value;
    }
}

if (! function_exists('routes')) {
    /**
     * Generate a URL to a named route.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @return string
     */
    function routes($name, $parameters = [])
    {
        return app('url')->route($name, $parameters, env("APP_ENV") != "local");
    }
}


