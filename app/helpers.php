<?php

if (!function_exists('template_path')) {
    /**
     * Template storage path.
     *
     * @return string
     */
    function template_path()
    {
        return __DIR__ . '/Views';
    }
}

if (!function_exists('template_cache_path')) {
    /**
     * Template cache path.
     *
     * @return string
     */
    function template_cache_path()
    {
        return __DIR__ . '/../public/cache';
    }
}

if (!function_exists('app_path')) {
    /**
     * Template storage path.
     *
     * @return string
     */
    function app_path()
    {
        return __DIR__;
    }
}