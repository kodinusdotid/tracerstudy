<?php

if (!function_exists('asset_panel')) {
    /**
     * Generate a URL for an asset in the panel assets folder.
     *
     * @param  string  $path
     * @return string
     */
    function asset_panel($path)
    {
        return asset('assets/panel/' . ltrim($path, '/'));
    }
}

if (!function_exists('asset_front')) {
    /**
     * Generate a URL for an asset in the front assets folder.
     *
     * @param  string  $path
     * @return string
     */
    function asset_front($path)
    {
        return asset('assets/front/' . ltrim($path, '/'));
    }
}
