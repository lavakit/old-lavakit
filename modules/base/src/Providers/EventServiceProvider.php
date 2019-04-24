<?php

namespace Lavakit\Base\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Arr;
use Lavakit\Base\Events\Translations\LoadBackendTranslation;

/**
 * Class EventServiceProvider
 * @package Lavakit\Base\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application
     *
     * @var array
     */
    protected $listen = [
        'Lavakit\Base\Events\SendMailEvent' => [
            'Lavakit\Base\Listeners\SendMailListener'
        ],
    ];

    /***
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function register()
    {
        $this->app['events']->listen(LoadBackendTranslation::class, function (LoadBackendTranslation $event) {
            $event->load('base::base', Arr::dot(trans('base::base')));
            $event->load('user::auth', Arr::dot(trans('user::auth')));
            $event->load('user::email', Arr::dot(trans('user::email')));
        });
    }
}
