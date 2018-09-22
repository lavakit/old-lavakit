<?php

namespace Inspire\Theme\Composers;

use Illuminate\View\View;
use Inspire\Theme\Facades\Asset;

/**
 * Class AssetViewComposer
 * @package Inspire\Theme\Composers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetViewComposer
{

    /**
     * @param View $view
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function compose(View $view)
    {
        $cssFiles = $this->getStylesheet();
        $jsFiles  = $this->getJavascript();

        $view->with(compact('cssFiles'));
        $view->with(compact('jsFiles'));
    }

    /**
     * Get the current Stylesheet
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function getStylesheet()
    {
        return Asset::getStylesheets();
    }

    /**
     * Get The current Javascrip
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    private function getJavascript()
    {
        return Asset::getJavascript();
    }
}
