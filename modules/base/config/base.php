<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Version & Author
    |--------------------------------------------------------------------------
    */
    'version' => env('VERSION', 'v1.0'),
    'crafted' => env('APP_CRAFTED', 'Cms Inspired'),

    /*
    |--------------------------------------------------------------------------
    | App name
    |--------------------------------------------------------------------------
    */
    'app_name' => env('APP_NAME', 'Inspired'),

    /*
    |--------------------------------------------------------------------------
    | These are the core modules that should NOT be disabled
    | under any circumstance
    |--------------------------------------------------------------------------
    */
    'core-modules' => [
        'base',
        'dashboard',
        'menu',
        'page',
        'post',
        'setting',
        'theme',
        'user'
    ],

    /*
    |--------------------------------------------------------------------------
    | The prefix that'll be used for the administration
    |--------------------------------------------------------------------------
    */
    'admin-prefix' => env('APP_ADMIN_PREFIX', 'admin'),

    /*
   |--------------------------------------------------------------------------
   | Middleware
   |--------------------------------------------------------------------------
   | You can customise the Middleware that should be loaded.
   | The localizationRedirect middleware is automatically loaded for both
   | Backend and Frontend routes.
   */
    'middleware' => [
        'backend' => [
            'auth'
        ],
        'frontend' => [
        ],
        'api' => [
            'api',
        ],
    ],
];
