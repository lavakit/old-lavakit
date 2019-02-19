<?php

use Illuminate\Routing\Router;
use Breadcrumbs;

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

Breadcrumbs::register('admin.dashboards.index', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboards.index'));
});

Breadcrumbs::register('emailSetting', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboards.index');
    $breadcrumbs->push('Email setting' , route('admin.settings.general'));
});
