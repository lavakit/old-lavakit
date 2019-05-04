<?php

namespace Lavakit\Dashboard\Providers;

use Illuminate\Events\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Arr;
use Lavakit\Base\Events\Translations\LoadBackendTranslation;

/**
 * Class EventServiceProvider
 * @package Lavakit\Dashboard\Providers
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function register()
    {
        $this->app['events']->listen(LoadBackendTranslation::class, function (LoadBackendTranslation $event) {
            $event->load('dashboard::dashboard', Arr::dot(trans('dashboard::dashboard')));
        });
    }
}
