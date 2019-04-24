<?php

namespace Lavakit\Setting\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Services\Caches\Cache;
use Lavakit\Setting\Models\Setting;
use Lavakit\Setting\Repositories\Caches\SettingCacheDecorator;
use Lavakit\Setting\Repositories\Eloquent\SettingEloquentRepository;
use Lavakit\Setting\Repositories\SettingRepository;

/**
 * Class RepositoryServiceProvider
 * @package Lavakit\Setting\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Lavakit\Setting';

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SettingRepository::class, function () {
            if (config('base.cache.cache_enable')) {
                return new SettingCacheDecorator(
                    new SettingEloquentRepository(new Setting()),
                    new Cache($this->app['cache'], SettingRepository::class)
                );
            }

            return new SettingEloquentRepository(new Setting());
        });
    }
}
