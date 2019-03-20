<?php

namespace Lavakit\Theme\Composers;

use Illuminate\View\View;
use AssetFrontend;

/**
 * Class AssetFrontendViewComposer
 * @package Lavakit\Theme\Composers
 * @copyright 2018 Lavakit Group
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
        return AssetFrontend::getStylesheets();
    }

    /**
     * Get The current Javascript
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getJavascript()
    {
         $jsDefault = AssetFrontend::getJavascript();
         $jsAppModules = AssetFrontend::getAppModules();
         $js = array_merge($jsDefault, $jsAppModules);

        return $js;
    }
}
