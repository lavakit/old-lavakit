<?php

namespace Inspire\Theme\Services\Breadcrumbs\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Traits\CanRegisterFacadeAliases;
use Inspire\Theme\Services\Breadcrumbs\Foundation\Breadcrumbs;
use Inspire\Theme\Services\Breadcrumbs\Foundation\Generator;
use Inspire\Theme\Services\Breadcrumbs\Manager\BreadcrumbsGenerator;
use Inspire\Theme\Services\Breadcrumbs\Manager\BreadcrumbsManager;
use Inspire\Theme\Services\Breadcrumbs\Facades\Breadcrumbs as BreadcrumbsFacade;

/**
 * Class BreadcrumbsProvider
 * @package Inspire\Theme\Services\Breadcrumbs\Providers
 * @copyright 2019 Inspire Group
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
