<?php

namespace Lavakit\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Theme\Contracts\Assets\Frontend;
use Lavakit\Theme\Contracts\Assets\Backend as BackendAssetContract;
use Lavakit\Theme\Contracts\Assets\Frontend as FrontendAssetContract;
use Lavakit\Theme\Facades\AssetBackendFacade;
use Lavakit\Theme\Facades\AssetFrontendFacade;
use Lavakit\Theme\Managers\Assets\BackendAsset;
use Lavakit\Theme\Managers\Assets\FrontendAsset;

/**
 * Class AssetServiceProvider
 * @package Lavakit\Theme\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class AssetServiceProvider extends ServiceProvider
{
    use CanRegisterFacadeAliases;

    /**
     * @var array $facadeAlias
     */
    protected $facadeAlias = [
        'AssetFrontend' => AssetFrontendFacade::class,
        'AssetBackend' => AssetBackendFacade::class
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
        $this->app->singleton(BackendAssetContract::class, function () {
            return new BackendAsset();
        });

        $this->app->singleton(FrontendAssetContract::class, function () {
            return new FrontendAsset();
        });

        $this->registerFacadeAliases($this->facadeAlias);
    }
}
