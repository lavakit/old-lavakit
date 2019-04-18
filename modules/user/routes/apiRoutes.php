<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/auth'], function (Router $router) {
    $router->post('/login', [
        'as'    => 'api.auth.login',
        'uses'  => 'AuthController@login',
    ]);
});
