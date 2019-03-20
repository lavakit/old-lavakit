<?php

namespace Lavakit\Theme\Services\Breadcrumbs\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Theme\Services\Breadcrumbs\Foundation\Breadcrumbs;
use Lavakit\Theme\Services\Breadcrumbs\Foundation\Generator;
use Lavakit\Theme\Services\Breadcrumbs\Manager\BreadcrumbsGenerator;
use Lavakit\Theme\Services\Breadcrumbs\Manager\BreadcrumbsManager;
use Lavakit\Theme\Services\Breadcrumbs\Facades\BreadcrumbsFacade;

/**
 * Class BreadcrumbsProvider
 * @package Lavakit\Theme\Services\Breadcrumbs\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class BreadcrumbsProvider extends ServiceProvider
{
    use CanRegisterFacadeAliases;

    /**
     * @var array $facadeAlias
     */
    protected $facadeAlias = [
        'Breadcrumbs' => BreadcrumbsFacade::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(RegisterBreadcrumbsProvider::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Breadcrumbs::class, BreadcrumbsManager::class);
        $this->app->bind(Generator::class, BreadcrumbsGenerator::class);

        $this->registerFacadeAliases($this->facadeAlias);
    }
}
