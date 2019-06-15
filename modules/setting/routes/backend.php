<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {
    $router->get('/show/{type?}', [
        'as' => 'admin.settings.show',
        'uses' => 'SettingController@show'
    ]);
});
