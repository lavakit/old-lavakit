<?php

namespace Lavakit\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Theme\Composers\AssetBackendViewComposer;
use Lavakit\Theme\Composers\AssetFrontendViewComposer;

/**
 * Class ComposerServiceProvider
 * @package Lavakit\Theme\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.master'], AssetFrontendViewComposer::class);
        view()->composer(['layouts.base'], AssetBackendViewComposer::class);
    }
}
