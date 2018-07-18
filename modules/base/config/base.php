<?php

return [
    /*
    |--------------------------------------------------------------------------
    | App name
    |--------------------------------------------------------------------------
    */
    'app_name' => env('APP_NAME','Inspired'),


    /*
    |--------------------------------------------------------------------------
    | These are the core modules that should NOT be disabled under any circumstance
    |--------------------------------------------------------------------------
    */
    'core-modules' => [
        'base',
        'acl',
        'post',
        'page',
        'dashboard'
    ],

    /*
    |--------------------------------------------------------------------------
    | The prefix that'll be used for the administration
    |--------------------------------------------------------------------------
    */
    'admin-prefix' => env('APP_ADMIN','admin'),

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
            'auth',
        ],
        'frontend' => [
        ],
        'api' => [
            'api',
        ],
    ],
];
