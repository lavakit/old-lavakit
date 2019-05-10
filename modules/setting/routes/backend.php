<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {
    $router->get('/setting/{type?}', [
        'as' => 'admin.settings.setting',
        'uses' => 'SettingController@setting'
    ]);
});
