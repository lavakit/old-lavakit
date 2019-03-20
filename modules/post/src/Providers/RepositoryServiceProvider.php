<?php

namespace Lavakit\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Services\Caches\Cache;
use Lavakit\Post\Models\Post;
use Lavakit\Post\Repositories\Caches\PostCacheDecorator;
use Lavakit\Post\Repositories\Eloquent\PostEloquentRepository;
use Lavakit\Post\Repositories\PostRepository;

/**
 * Class RepositoryServiceProvider
 * @package Lavakit\Post\Providers
 * @copyright 2018 Lavakit Team
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $module = 'Lavakit\Post';

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
