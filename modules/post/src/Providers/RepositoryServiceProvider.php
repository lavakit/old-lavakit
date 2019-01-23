<?php

namespace Inspire\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Services\Caches\Cache;
use Inspire\Post\Models\Post;
use Inspire\Post\Repositories\Caches\PostCacheDecorator;
use Inspire\Post\Repositories\Eloquent\PostEloquentRepository;
use Inspire\Post\Repositories\PostRepository;

/**
 * Class RepositoryServiceProvider
 * @package Inspire\Post\Providers
 * @copyright 2018 Inspire Team
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $module = 'Inspire\Post';

    /**
     * Bootstrap the application services
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services
     *
     * @return void
     */
    public function register()
    {
        if (config('base.cache.cache_enable')) {
            $this->app->singleton(PostRepository::class, function () {
                return new PostCacheDecorator(
                    new PostEloquentRepository(new Post()),
                    new Cache($this->app['cache'], PostRepository::class)
                );
            });
        } else {
            $this->app->singleton(PostRepository::class, function () {
                return new PostEloquentRepository(new Post());
            });
        }
    }
}
