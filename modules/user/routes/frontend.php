<?php

use Illuminate\Routing\Router;

/** @var $router Router */
$router->group(['prefix' => 'auth'] , function (Router $router) {
    $router->get('/login', [
        'as'  => 'login',
        'uses'  => 'AuthController@showLogin'
    ]);

    $router->post('/login', [
        'as'    => 'auth.login',
        'uses'  => 'AuthController@login'
    ]);
});
