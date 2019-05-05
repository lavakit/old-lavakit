<?php

use Illuminate\Routing\Router;
use Lavakit\Theme\Services\Breadcrumbs\Facades\Breadcrumbs;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {
    $router->get('/general', [
        'as'    => 'admin.settings.general',
        'uses'  => 'SettingController@general'
    ]);

    $router->get('/email', [
        'as'    => 'admin.settings.email',
        'uses'  => 'SettingController@email'
    ]);

    $router->get('/media', [
        'as'    => 'admin.settings.media',
        'uses'  => 'SettingController@getMedia'
    ]);

    $router->post('/media', [
        'as'    => 'admin.settings.media',
        'uses'  => 'SettingController@postMedia'
    ]);
});
