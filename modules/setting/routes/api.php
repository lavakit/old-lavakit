<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {
    $router->get('/general', [
        'as'    => 'api.settings.general',
        'uses'  => 'SettingController@general',
    ]);

    $router->get('/email', [
        'as'    => 'api.settings.email',
        'uses'  => 'SettingController@email',
    ]);
});
