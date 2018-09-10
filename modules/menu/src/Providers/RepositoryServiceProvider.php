<?php namespace Inspire\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Services\Caches\Cache;
use Inspire\Menu\Models\Menu;
use Inspire\Menu\Repositories\Caches\MenuCacheDecorator;
use Inspire\Menu\Repositories\Eloquent\EloquentMenuRepository;
use Inspire\Menu\Repositories\MenuRepository;

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
        if (config('base.cache_enable')) {

            $this->app->singleton(MenuRepository::class, function (){
                return new MenuCacheDecorator(new EloquentMenuRepository(new Menu()), new Cache($this->app['cache'],
                    __CLASS__));
            });
        } else {
            $this->app->singleton(MenuRepository::class, function (){
                return new EloquentMenuRepository(new Menu());
            });
        }
    }
}
