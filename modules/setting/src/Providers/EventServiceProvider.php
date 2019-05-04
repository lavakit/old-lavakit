<?php

namespace Lavakit\Setting\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Arr;
use Lavakit\Base\Events\Translations\LoadBackendTranslation;

/**
 * Class EventServiceProvider
 * @package Lavakit\Setting\Providers
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
            $event->load('setting::setting', Arr::dot(trans('setting::setting')));
        });
    }
}
