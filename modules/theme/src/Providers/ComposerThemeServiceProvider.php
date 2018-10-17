<?php

namespace Inspire\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Theme\Composers\AssetViewComposer;

/**
 * Class ComposerThemeServiceProvider
 * @package Inspire\Theme\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ComposerThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.master'], AssetViewComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
