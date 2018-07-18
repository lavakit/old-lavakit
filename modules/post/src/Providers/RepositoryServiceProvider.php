<?php namespace Inspire\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Base\Services\Caches\Cache;
use Inspire\Post\Models\Post;
use Inspire\Post\Repositories\Caches\PostCacheDecorator;
use Inspire\Post\Repositories\Eloquent\EloquentPostRepository;
use Inspire\Post\Repositories\PostRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Inspire\Post';

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
            $this->app->singleton(PostRepository::class, function (){
                return new PostCacheDecorator(new EloquentPostRepository(new Post()), new Cache($this->app['cache'],__CLASS__));
            });
        } else {
            $this->app->singleton(PostRepository::class,function () {
                return new EloquentPostRepository(new Post());
            });
        }
    }
}
