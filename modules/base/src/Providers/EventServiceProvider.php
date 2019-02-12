<?php

namespace Inspire\Base\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Inspire\Base\Providers
 * @copyright 2019 Inspire Group
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
        'Inspire\Base\Events\SendMailEvent' => [
            'Inspire\Base\Listeners\SendMailListener'
        ],
    ];
}
