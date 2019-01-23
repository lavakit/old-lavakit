<?php

namespace Inspire\Theme\Composers;

use Illuminate\View\View;
use Asset;

/**
 * Class AssetFrontendViewComposer
 * @package Inspire\Theme\Composers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetFrontendViewComposer
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
    protected function getStylesheet()
    {
        return Asset::getStylesheets();
    }

    /**
     * Get The current Javascript
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getJavascript()
    {
         $jsDefault = Asset::getJavascript();
         $jsAppModules = Asset::getAppModules();
         $js = array_merge($jsDefault, $jsAppModules);

        return $js;
    }
}
