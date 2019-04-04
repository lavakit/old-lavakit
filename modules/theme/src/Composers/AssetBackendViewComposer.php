<?php

namespace Lavakit\Theme\Composers;

use Illuminate\View\View;
use AssetBackend;

/**
 * Class AssetBackendViewComposer
 * @package Lavakit\Theme\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetBackendViewComposer
{
    /**
     * @param View $view
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function compose(View $view)
    {
        $cssBackendFiles = $this->getStylesheet();
        $jsBackendFiles  = $this->getJavascript();

        $view->with(compact('cssBackendFiles'));
        $view->with(compact('jsBackendFiles'));
    }

    /**
     * Get the current Stylesheet
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getStylesheet()
    {
        return AssetBackend::getStylesheets();
    }

    /**
     * Get The current Javascript
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getJavascript()
    {
        $jsDefault = AssetBackend::getJavascript();
        $jsAppModules = AssetBackend::getAppModules();
        $js = array_merge($jsDefault, $jsAppModules);

        return $js;
    }
}
