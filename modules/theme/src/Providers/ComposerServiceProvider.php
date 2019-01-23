<?php

namespace Inspire\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Theme\Composers\AssetBackendViewComposer;
use Inspire\Theme\Composers\AssetFrontendViewComposer;

/**
 * Class ComposerServiceProvider
 * @package Inspire\Theme\Providers
 * @copyright 2018 Inspire Group
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
        view()->composer(['backend::layouts.master'], AssetBackendViewComposer::class);
    }
}
