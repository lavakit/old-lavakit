<?php

namespace Inspire\Theme\Composers;

use Illuminate\View\View;
use Asset;

/**
 * Class AssetBackendViewComposer
 * @package Inspire\Theme\Providers
 * @copyright 2019 LUCY VN
 * @author Pencii Team <hoatq@lucy.ne.jp>
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
        return Asset::setConfig('backend')->getStylesheets();
    }

    /**
     * Get The current Javascript
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getJavascript()
    {
        $jsDefault = Asset::setConfig('backend')->getJavascript();
        $jsAppModules = Asset::getAppModules();
        $js = array_merge($jsDefault, $jsAppModules);

        return $js;
    }
}
