<?php

namespace Inspire\Translation\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Services\Caches\Cache;
use Inspire\Translation\Models\Translation;
use Inspire\Translation\Models\TranslationTranslation;
use Inspire\Translation\Repositories\Caches\TranslationCacheDecorator;
use Inspire\Translation\Repositories\Caches\TranslationTranslationCacheDecorator;
use Inspire\Translation\Repositories\Eloquent\TranslationEloquentRepository;
use Inspire\Translation\Repositories\Eloquent\TranslationTranslationEloquentRepository;
use Inspire\Translation\Repositories\Interfaces\TranslationRepository;
use Inspire\Translation\Repositories\Interfaces\TranslationTranslationRepository;

/**
 * Class RepositoryServiceProvider
 * @package Inspire\Translation\Providers
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Inspire\Translation';

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
