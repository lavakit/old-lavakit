<?php

namespace Inspire\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Inspire\Theme\Contracts\AssetContract;
use Inspire\Theme\Facades\Asset;
use Inspire\Theme\Managers\AssetManager;

/**
 * Class AssetServiceProvider
 * @package Inspire\Theme\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetServiceProvider extends ServiceProvider
{
    use CanRegisterFacadeAliases;

    protected $facadeAlias = [
        'Asset' => Asset::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AssetContract::class, function () {
            return new AssetManager();
        });

        $this->registerFacadeAliases($this->facadeAlias);
    }
}
