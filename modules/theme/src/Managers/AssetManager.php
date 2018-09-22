<?php

namespace Inspire\Theme\Managers;

use Inspire\Theme\Contracts\AssetContract;
use Config;

/**
 * Class AssetManager
 * @package Inspire\Theme\Managers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
final class AssetManager implements AssetContract
{
    /**
     * @var array
     */
    protected $javascript = [];

    /**
     * @var array
     */
    protected $stylesheets = [];

    /**
     * @var array
     */
    protected $appModules = [];

    /**
     * @var mixed
     */
    protected $build;

    /**
     * @var array
     */
    protected $appendedJs = [
            'top' => [],
            'bottom' => []
    ];

    /**
     * @var array
     */
    protected $appendedCss = [];

    /**
     * AssetManager constructor.
     */
    public function __construct()
    {
        $this->javascript = config('theme.assets.javascript');
        $this->stylesheets = config('theme.assets.stylesheets');
        $this->build = time();
        if (config('app.env') == 'production') {
            $this->build = config('base.base.version');
        }
    }

    /**
     * Add javascript  to current module
     *
     * @param $assets
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function addJavascript($assets)
    {
        if (!is_array($assets)) {
            $assets = [$assets];
        }
        $this->javascript = array_merge($this->javascript, $assets);
        return $this;
    }

    /**
     * @param $assets
     * @param string $location
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function addJavascriptDirectly($assets, $location = 'bottom')
    {
        $js = array_merge((array)$assets, $this->appendedCss[$location]);
        $this->appendedJs[$location] = $js;
        return $this;
    }

    /**
     * Add Css to current module
     *
     * @param $assets
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function addStylesheets($assets)
    {
        if (!is_array($assets)) {
            $assets = [$assets];
        }
        $this->stylesheets = array_merge($this->stylesheets, $assets);
        return $this;
    }

    /**
     * @param $assets
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function addStylesheetsDirectly($assets)
    {
        if (!is_array($assets)) {
            $assets = func_get_args();
        }
        $this->appendedCss = array_merge($this->appendedCss, $assets);
        return $this;
    }

    /**
     * Add Module to current module
     *
     * @param $modules
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function addAppModule($modules)
    {
        if (!is_array($modules)) {
            $modules = [$modules];
        }
        $this->appModules = array_merge($this->appModules, $modules);
        return $this;
    }

    /**
     * Remove Css to current module
     *
     * @param $assets
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function removeStylesheets($assets)
    {
        if (!is_array($assets)) {
            $assets = [$assets];
        }
        foreach ($assets as $rem) {
            unset($this->stylesheets[array_search($rem, $this->stylesheets)]);
        }
        return $this;
    }

    /**
     * Remove Javascript to current module
     *
     * @param $assets
     * @return $this
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function removeJavascript($assets)
    {
        if (!is_array($assets)) {
            $assets = [$assets];
        }
        foreach ($assets as $rem) {
            unset($this->javascript[array_search($rem, $this->javascript)]);
        }
        return $this;
    }

    /**
     * Get All Javascript in current module
     *
     * @param null $location
     * @param bool $version
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getJavascript($location = null, $version = true)
    {
        $scripts = [];
        if (!empty($this->javascript)) {
            $this->javascript = array_unique($this->javascript);
            foreach ($this->javascript as $js) {
                $jsConfig = 'theme.assets.resources.javascript.' . $js;
                if (Config::has($jsConfig)) {
                    if ($location != null && config($jsConfig . '.location') !== $location) {
                        //skip assets that don't match this location
                        continue;
                    }
                    $src = config($jsConfig . '.src.local');
                    $cdn = false;
                    if (config($jsConfig . '.use_cdn') && !config('theme.assets.offline')) {
                        $src = config($jsConfig . '.src.cdn');
                        $cdn = true;
                    }
                    if (config($jsConfig . '.include_style')) {
                        $this->addStylesheets([$js]);
                    }
                    $version = $version ? '?ver=' . $this->build : '';
                    if (!is_array($src)) {
                        $scripts[] = $src . $version;
                    } else {
                        foreach ($src as $s) {
                            $scripts[] = $s . $version;
                        }
                    }
                    if (empty($src) && $cdn && $location === 'top' && Config::has($jsConfig . '.fallback')) {
                        $fallback = config($jsConfig . '.fallback');
                        $scripts[] = [
                                'url' => $src,
                                'fallback' => $fallback,
                                'fallbackURL' => config($jsConfig . '.src.local')
                        ];
                    }
                }
            }
        }
        if (isset($this->appendedJs[$location])) {
            $scripts = array_merge($scripts, $this->appendedJs[$location]);
        }
        return $scripts;
    }

    /**
     * Get All CSS in current module
     *
     * @param array $lastModules
     * @param bool $version
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getStylesheets($lastModules = [], $version = true)
    {
        $stylesheets = [];
        if (!empty($this->stylesheets)) {
            if (!empty($lastModules)) {
                $this->stylesheets = array_merge($this->stylesheets, $lastModules);
            }
            $this->stylesheets = array_unique($this->stylesheets);
            foreach ($this->stylesheets as $style) {
                $cssConfig = 'theme.assets.resources.stylesheets.' . $style;
                if (Config::has($cssConfig)) {
                    $src = config($cssConfig . '.src.local');
                    if (config($cssConfig . '.use_cdn') && !config('theme.assets.offline')) {
                        $src = config($cssConfig . '.src.cdn');
                    }
                    if (!is_array($src)) {
                        $src = [$src];
                    }
                    foreach ($src as $s) {
                        $stylesheets[] = $s . ($version ? '?ver=' . $this->build : '');
                    }
                }
            }
        }
        $stylesheets = array_merge($stylesheets, $this->appendedCss);
        return $stylesheets;
    }

    /**
     * Get all modules in current module
     *
     * @param bool $version
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getAppModules($version = true)
    {
        $modules = [];
        if (!empty($this->appModules)) {
            $this->appModules = array_unique($this->appModules);
            foreach ($this->appModules as $module) {
                if (($module = $this->getModule($module, $version)) !== null) {
                    $modules[] = $module;
                }
            }
        }
        return $modules;
    }

    /**
     * Get a module
     *
     * @param $module
     * @param $version
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function getModule($module, $version)
    {
        $pathPrefix = public_path() . ASSETS_PUBLIC . 'js/app_modules/' . $module;
        $file = null;
        if (file_exists($pathPrefix . '.min.js')) {
            $file = $module . '.min.js';
        } elseif (file_exists($pathPrefix . '.js')) {
            $file = $module . 'js';
        }
        if ($file) {
            return ASSETS_PUBLIC . 'js/app_modules/' . $file . ($version ? '?ver=' . $this->build : '');
        }
        return null;
    }
}
