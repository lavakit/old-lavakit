<?php

namespace Lavakit\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Services\Caches\Cache;
use Lavakit\Menu\Models\Menu;
use Lavakit\Menu\Repositories\Caches\MenuCacheDecorator;
use Lavakit\Menu\Repositories\Eloquent\MenuEloquentRepository;
use Lavakit\Menu\Repositories\MenuRepository;

/**
 * Class RepositoryServiceProvider
 * @package Lavakit\Menu\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Lavakit\Menu';

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
