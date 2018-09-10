<?php

if (! App::runningInConsole()) {
    Route::get('/', [
            'uses'  => 'PublicController@index',
            'as'    => 'page.index',
            'middleware'    => config('page.middleware')
    ]);
}
