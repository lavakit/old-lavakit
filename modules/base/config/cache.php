<?php

return [
    'cache_enable'  =>  env('CACHE_ENABLE', false),
    'cache_time'    =>  10,
    'cache_store'   =>  storage_path() . '/framework/cache/cache_keys.json'
];
