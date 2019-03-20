<?php

use Illuminate\Routing\Router;
use Lavakit\Theme\Services\Breadcrumbs\Facades\Breadcrumbs;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {
    $router->get('/general', [
        'as'    => 'admin.settings.general',
        'uses'  => 'SettingController@getGeneral'
    ]);

    $router->post('/general', [
        'as'    => 'admin.settings.general',
        'uses'  => 'SettingController@postGeneral'
    ]);

    $router->get('/email', [
        'as'    => 'admin.settings.email',
        'uses'  => 'SettingController@getEmail'
    ]);

    $router->post('/email', [
        'as'    => 'admin.settings.email',
        'uses'  => 'SettingController@postEmail'
    ]);

    $router->get('/media', [
        'as'    => 'admin.settings.media',
        'uses'  => 'SettingController@getMedia'
    ]);

    $router->post('/media', [
        'as'    => 'admin.settings.media',
        'uses'  => 'SettingController@postMedia'
    ]);

    $router->get('/language', [
        'as'    => 'admin.settings.language',
        'uses'  => 'SettingController@getLanguage'
    ]);

    $router->post('/language', [
        'as'    => 'admin.settings.language',
        'uses'  => 'SettingController@postLanguage'
    ]);
});
