<?php

namespace Lavakit\User\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Arr;
use Lavakit\Base\Events\Translations\LoadBackendTranslation;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function register()
    {
        $this->app['events']->listen(LoadBackendTranslation::class, function (LoadBackendTranslation $event) {
            $event->load('user::auth', Arr::dot(trans('user::auth')));
            $event->load('user::email', Arr::dot(trans('user::email')));
            $event->load('user::social', Arr::dot(trans('user::social')));
        });
    }
}
