<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/settings'], function (Router $router) {

    $router->get('/setting/{type?}', [
        'as' => 'api.settings.setting',
        'uses' => 'SettingController@setting'
    ]);
    
    $router->post('post-setting', [
        'as'    => 'api.settings.post_setting',
        'uses'  => 'SettingController@postSetting',
    ]);

//    $router->group(['middleware' => 'auth:api'], function (Router $router) {
//        $router->post('post-general', [
//            'as'    => 'api.settings.post_general',
//            'uses'  => 'SettingController@postVeneral',
//        ]);
//    });
});
