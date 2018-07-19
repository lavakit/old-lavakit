<?php

namespace Inspire\Theme\Managers;

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\View\ViewFinderInterface;
use Noodlehaus\Config;
use Inspire\Theme\Contracts\ThemeContract;
use Inspire\Theme\Exceptions\ThemeNotFoundExceptions;

class Theme implements ThemeContract
{
    /**
     * Theme Root Path
     *
     * @var String
     */
    protected $basePath;

    /**
     * All theme Infomation
     *
     * @var Collection
     */
    protected $themes;

    /**
     * Balde View Finder
     *
     * @var \Illuminate\View\ViewFinderInterface
     */
    protected $finder;

    /**
     * Application Container
     *
     * @var \Illuminate\Container\Container
     */
    protected $app;

    /**
     * Translator
     *
     * @var \Illuminate\Contracts\Translation\Translator
     */
    protected $lang;

    /**
     * Config
     *
     * @var Repository
     */
    protected $config;

    /**
     * Current Active Theme
     *
     * @var string|collection
     */
    protected $activeTheme = null;

    /**
     * Theme constructor.
     *
     * @param Container             $app
     * @param ViewFinderInterface   $finder
     * @param Repository            $config
     * @param Translator            $lang
     */
    public function __construct(Container $app, ViewFinderInterface $finder, Repository $config, Translator $lang)
    {
        $this->config   = $config;
        $this->app      = $app;
        $this->finder   = $finder;
        $this->lang     = $lang;
        $this->basePath = $this->config['theme.theme_path'];

        $this->scanThemes();
    }

    /**
     * Set Current theme
     *
     * @param $theme
     */
    public function set($theme)
    {
        if (!$this->has($theme)) {
            throw new ThemeNotFoundExceptions($theme);
        }

        $this->loadTheme($theme);
        $this->activeTheme = $theme;
    }

    /**
     * Check if theme exists.
     *
     * @param string $theme
     * @return bool
     */
    public function has($theme)
    {
        return array_key_exists($theme, $this->themes);
    }

    /**
     * Get particular theme all information.
     *
     * @param string $themeName
     * @return null|ThemeInfo
     */
    public function getThemeInfo($themeName)
    {
        return $this->themes[$themeName] ?? null;
    }

    /**
     * Returns current theme or particular theme information.
     *
     * @param string $theme
     * @param bool   $collection
     * @return array|null|ThemeInfo
     */
    public function get($theme = null, $collection = false)
    {
        if (is_null($theme) || !$this->has($theme)) {
            return !$collection ? $this->themes[$this->activeTheme]->all() : $this->themes[$this->activeTheme];
        }

        return !$collection ? $this->themes[$theme]->all() : $this->themes[$theme];
    }

    /**
     * Get current active theme name only or themeinfo collection.
     *
     * @param bool $collection
     * @return null|ThemeInfo
     */
    public function current($collection = false)
    {
        return !$collection ? $this->activeTheme : $this->getThemeInfo($this->activeTheme);
    }

    /**
     * Get all theme information.
     * @return array
     */
    public function all()
    {
        return $this->themes;
    }

    /**
     * Scan for all available themes.
     *
     * @return void
     */
    private function scanThemes()
    {
        $themeDirectories = glob($this->basePath.'/*', GLOB_ONLYDIR);
        $themes = [];
        foreach ($themeDirectories as $themePath) {
            $themeConfigPath = $themePath. DIRECTORY_SEPARATOR . $this->config['theme.config.name'];
            $themeChangelogPath = $themePath.DIRECTORY_SEPARATOR.$this->config['theme.config.changelog'];

            if (file_exists($themeConfigPath)) {
                $themeConfig = Config::load($themeConfigPath);
                $themeConfig['changelog'] = Config::load($themeChangelogPath)->all();
                $themeConfig['path'] = $themePath;

                if ($themeConfig->has('name')) {
                    $theme[$themeConfig->get('name')] = $themeConfig;
                }
            }
        }
        $this->themes = $theme;
    }

    /**
     * Map view map for particular theme.
     *
     * @param string $theme
     *
     * @return void
     */
    private function loadTheme($theme)
    {
        if (is_null($theme)) {
            return;
        }

        $themeInfo = $this->getThemeInfo($theme);
        if (is_null($themeInfo)) {
            return;
        }

        $this->loadTheme($themeInfo->get('parent'));
        $viewPath = $themeInfo->get('path') . DIRECTORY_SEPARATOR . $this->config['theme.folders.views'];
        $langPath = $themeInfo->get('path') . '/' . $this->config['theme.folders.lang'];

        $this->finder->prependLocation($themeInfo->get('path'));
    }

}