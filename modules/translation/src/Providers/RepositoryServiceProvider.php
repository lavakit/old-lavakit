<?php

namespace Lavakit\Translation\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Services\Caches\Cache;
use Lavakit\Translation\Models\Translation;
use Lavakit\Translation\Models\TranslationTranslation;
use Lavakit\Translation\Repositories\Caches\TranslationCacheDecorator;
use Lavakit\Translation\Repositories\Caches\TranslationTranslationCacheDecorator;
use Lavakit\Translation\Repositories\Eloquent\TranslationEloquentRepository;
use Lavakit\Translation\Repositories\Eloquent\TranslationTranslationEloquentRepository;
use Lavakit\Translation\Repositories\Interfaces\TranslationRepository;
use Lavakit\Translation\Repositories\Interfaces\TranslationTranslationRepository;

/**
 * Class RepositoryServiceProvider
 * @package Lavakit\Translation\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Lavakit\Translation';

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
        $this->app->singleton(TranslationRepository::class, function () {
            if (config('base.cache.cache_enable')) {
                return new TranslationCacheDecorator(
                    new TranslationEloquentRepository(new Translation()),
                    new Cache($this->app['cache'], TranslationRepository::class)
                );
            }

            return new TranslationEloquentRepository(new Translation());
        });

        $this->app->singleton(TranslationTranslationRepository::class, function () {
            if (config('base.cache.cache_enable')) {
                return new TranslationTranslationCacheDecorator(
                    new TranslationTranslationEloquentRepository(new TranslationTranslation()),
                    new Cache($this->app['cache'], TranslationTranslationRepository::class)
                );
            }

            return new TranslationTranslationEloquentRepository(new TranslationTranslation());
        });
    }
}
