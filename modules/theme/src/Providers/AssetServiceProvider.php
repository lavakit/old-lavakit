<?php

namespace Inspire\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Inspire\Theme\Contracts\Assets\Frontend;
use Inspire\Theme\Contracts\Assets\Backend as BackendAssetContract;
use Inspire\Theme\Contracts\Assets\Frontend as FrontendAssetContract;
use Inspire\Theme\Facades\AssetBackendFacade;
use Inspire\Theme\Facades\AssetFrontendFacade;
use Inspire\Theme\Managers\Assets\BackendAsset;
use Inspire\Theme\Managers\Assets\FrontendAsset;

/**
 * Class AssetServiceProvider
 * @package Inspire\Theme\Providers
 * @copyright 2018 Inspire Group
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
        $this->app->singleton( BackendAssetContract::class, function () {
            return new BackendAsset();
        });

        $this->app->singleton(FrontendAssetContract::class, function () {
            return new FrontendAsset();
        });

        $this->registerFacadeAliases($this->facadeAlias);
    }
}
