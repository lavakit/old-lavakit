<?php

namespace Lavakit\User\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\User\Models\User;
use Lavakit\User\Repositories\Eloquent\UserEloquentRepository;
use Lavakit\User\Repositories\Interfaces\UserRepository;

/**
 * Class RepositoryServiceProvider
 * @package Lavakit\User\Providers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /** @var string */
    protected $module = 'Lavakit\User';

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
        $this->app->singleton(UserRepository::class, function () {
            return new UserEloquentRepository(new User());
        });
    }
}

