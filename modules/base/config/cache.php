<?php

return [
    'cache_enable'  =>  env('CACHE_ENABLE', false),
    'cache_time'    =>  10,
    'cache_store'   =>  storage_path() . '/framework/cache/cache_keys.json',
    
    /*
    |--------------------------------------------------------------------------
    | Here you may specify the number of minutes that you wish
    | the Cache tags remember
    |--------------------------------------------------------------------------
    */
    'cache_remember_time' => env('CACHE_REMEMBER_TIME', 120),
];
