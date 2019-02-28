<?php

namespace Inspire\User\Providers;

use Illuminate\Support\ServiceProvider;
use Inspire\User\Models\User;
use Inspire\User\Repositories\Eloquent\UserEloquentRepository;
use Inspire\User\Repositories\Interfaces\UserRepository;

/**
 * Class RepositoryServiceProvider
 * @package Inspire\User\Providers
 * @copyright 2018 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /** @var string */
    protected $module = 'Inspire\User';

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

