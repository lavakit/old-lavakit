<?php

use Illuminate\Routing\Router;

/** @var $router Router */
$router->group(['prefix' => 'auth'], function (Router $router) {
    $router->get('/login', [
        'as'  => 'login',
        'uses'  => 'AuthController@getLogin'
    ]);

    $router->post('/login', [
        'as'    => 'auth.login',
        'uses'  => 'AuthController@login'
    ]);

    $router->get('/register', [
        'as'    => 'register',
        'uses'  => 'AuthController@getRegister'
    ]);

    $router->post('/register', [
        'as'    => 'auth.register',
        'uses'  => 'AuthController@register'
    ]);

    $router->get('/confirm/{email?}', [
        'as'    => 'auth.confirm',
        'uses'  => 'AuthController@confirm'
    ]);

    $router->get('/forgot', [
        'as'    => 'forgot',
        'uses'  => 'AuthController@getForgot'
    ]);

    $router->post('/forgot', [
        'as'    => 'auth.forgot',
        'uses'  => 'AuthController@forgot'
    ]);

    $router->get('/logout', [
        'as'    => 'auth.logout',
        'uses'  => 'AuthController@logout'
    ]);
});
