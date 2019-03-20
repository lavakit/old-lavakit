<?php

namespace Lavakit\Base\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
}
