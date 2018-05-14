<?php namespace Inspire\Posts\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\Posts\Models\Posts;
use Inspire\Posts\Repositories\Eloquent\EloquentPostsRepository;
use Inspire\Posts\Repositories\PostsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $module = 'Inspire\Posts';

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
        $this->app->singleton(PostsRepository::class,function () {
            return new EloquentPostsRepository(new Posts());
        });
    }
}
