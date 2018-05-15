<?php

use Inspire\Base\Facades\PageTitleFacade;
use Inspire\Base\Supports\PageTitle;

if (!function_exists('pageTitle')) {

    /**
     * @return PageTitle
     */
    function pageTitle()
    {
        return PageTitleFacade::getFacadeRoot();
    }
}
