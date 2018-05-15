<?php

if (! function_exists('locate')) {
    function locate($locate = null)
    {
        if (is_null($locate)) {
            return app()->getLocale();
        }

        app()->setLocale($locate);

        return app()->getLocale();
    }
}
