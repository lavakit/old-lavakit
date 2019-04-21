<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/auth'], function (Router $router) {
    $router->post('/login', [
        'as'    => 'api.auth.login',
        'uses'  => 'AuthController@login',
    ]);


    $router->post('/register', [
        'as'    => 'api.auth.register',
        'uses'  => 'AuthController@register',
    ]);

    $router->get('/confirm/{token}', [
        'as'    => 'api.auth.confirm',
        'uses'  => 'AuthController@confirm'
    ]);


    $router->group(['middleware' => 'auth:api'], function (Router $router) {
        $router->get('/getUser', [
            'as'    => 'api.auth.getUser',
            'uses'  => 'AuthController@getUser',
        ]);

        $router->get('/logout', [
            'as' => 'api.auth.logout',
            'uses' => 'AuthController@logout'
        ]);
    });
});
