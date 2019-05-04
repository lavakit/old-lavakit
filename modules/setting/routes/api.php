<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {
    $router->get('/email', [
        'as'    => 'api.settings.email',
        'uses'  => 'SettingController@email',
    ]);
});
