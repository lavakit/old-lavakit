<?php

namespace Inspire\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Services\Caches\Cache;
use Inspire\Menu\Models\Menu;
use Inspire\Menu\Repositories\Caches\MenuCacheDecorator;
use Inspire\Menu\Repositories\Eloquent\MenuEloquentRepository;
use Inspire\Menu\Repositories\MenuRepository;

/**
 * Class RepositoryServiceProvider
 * @package Inspire\Menu\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Inspire\Menu';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MenuRepository::class, function () {
            if (config('base.cache.cache_enable')) {
                return new MenuCacheDecorator(
                    new MenuEloquentRepository(new Menu()),
                    new Cache($this->app['cache'], MenuRepository::class)
                );
            }

            return new MenuEloquentRepository(new Menu());
        });
    }
}
