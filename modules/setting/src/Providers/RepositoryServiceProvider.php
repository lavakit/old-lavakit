<?php

namespace Inspire\Setting\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Services\Caches\Cache;
use Inspire\Setting\Models\Setting;
use Inspire\Setting\Repositories\Caches\SettingCacheDecorator;
use Inspire\Setting\Repositories\Eloquent\SettingEloquentRepository;
use Inspire\Setting\Repositories\SettingRepository;

/**
 * Class RepositoryServiceProvider
 * @package Inspire\Setting\Providers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Inspire\Setting';

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
