<?php

namespace Inspire\Theme\Services\Breadcrumbs\Providers;

use Illuminate\Support\ServiceProvider;
use Breadcrumbs;
use Inspire\Theme\Services\Breadcrumbs\Manager\BreadcrumbsGenerator;

class RegisterBreadcrumbsProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @throws \Inspire\Theme\Services\Breadcrumbs\Facades\DuplicateBreadcrumbException
     */
    public function boot()
    {
        $this->registerBreadcrumbs();
    }

    /**
     * Register the breadcrumbs
     *
     * @throws \Inspire\Theme\Services\Breadcrumbs\Facades\DuplicateBreadcrumbException
     */
    protected function registerBreadcrumbs()
    {
        Breadcrumbs::register('admin.dashboards.index', function ($breadcrumbs) {
            /** @var $breadcrumbs BreadcrumbsGenerator */
            $breadcrumbs->push('Dashboard', route('admin.dashboards.index'), ['icon' => 'ik ik-home']);
        });

        Breadcrumbs::register('admin.settings', function ($breadcrumbs) {
            /** @var $breadcrumbs BreadcrumbsGenerator */
            $breadcrumbs->parent('admin.dashboards.index');
            $breadcrumbs->push('Settings', '#');
        });

        Breadcrumbs::register('admin.settings.general', function ($breadcrumbs, $name, $route) {
            /** @var $breadcrumbs BreadcrumbsGenerator */
            $breadcrumbs->parent('admin.settings');
            $breadcrumbs->push($name, route($route));
        });
    }
}
