<?php

use Inspire\Base\Facades\PageTitleFacade;

if (! function_exists('locate')) {

    /**
     * Get Locale of App
     * @param null $locate
     * @return string
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

if (! function_exists('pageTitle')) {

    /**
     * @return \Inspire\Base\Supports\PageTitle
     */
    function pageTitle()
    {
        return PageTitleFacade::getFacadeRoot();
    }
}
