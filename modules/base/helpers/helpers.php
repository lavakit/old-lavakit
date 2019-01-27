<?php

use Inspire\Base\Facades\TitleFacade;

if (!function_exists('locate')) {
    /**
     * Get Locale of App
     *
     * @param null $locate
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function locate($locate = null)
    {
        if (is_null($locate)) {
            return app()->getLocale();
        }

        app()->setLocale($locate);

        return app()->getLocale();
    }
}

if (!function_exists('title')) {
    /**
     * @return \Inspire\Base\Supports\Title
     */
    function title()
    {
        return TitleFacade::getFacadeRoot();
    }
}

if (!function_exists('crafted')) {
    /**
     * @return \Illuminate\Config\Repository|mixed
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    function crafted()
    {
        return config('base.base.crafted');
    }
}
