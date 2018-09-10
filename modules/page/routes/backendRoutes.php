<?php

Route::group(['prefix'  =>  '/page'], function (){
    Route::get('pages', [
        'as'            => 'admin.page.index',
        'uses'          => 'PageController@index',
        'middleware'    => 'web'
    ]);
});
