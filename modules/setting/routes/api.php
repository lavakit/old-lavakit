<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {

    $router->get('/show/{type?}', [
        'as' => 'api.settings.show',
        'uses' => 'SettingController@show'
    ]);
    
    $router->post('store', [
        'as'    => 'api.settings.store',
        'uses'  => 'SettingController@store',
    ]);
});
