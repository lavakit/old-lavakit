<?php

if (!function_exists('themes')) {
    /**
     * Generate an asset path for the theme.
     *
     * @param string $path
     * @param bool   $secure
     * @return string
     */
    function themes($path, $secure = null)
    {
        return ThemeFrontend::assets($path, $secure);
    }
}

if (!function_exists('lang')) {
    /**
     * Get lang content from current theme.
     *
     * @param $fallback
     * @param  bool $frontend
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    function lang($fallback, $frontend = true)
    {
        if ($frontend) {
            return ThemeFrontend::lang($fallback);
        }

        return ThemeBackend::lang($fallback);
    }
}

if (!function_exists('backendAsset')) {
    /**
     * @param $path
     * @return string
     * @copyright 2018 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function backendAsset($path)
    {
        return asset(BACKEND_ASSET . $path);
    }
}

if (!function_exists('frontendAsset')) {
    /**
     * @param $path
     * @return string
     * @copyright 2018 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function frontendAsset($path)
    {
        return asset(FRONTEND_ASSET . $path);
    }
}
