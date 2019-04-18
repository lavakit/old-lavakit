<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/auth'], function (Router $router) {
    $router->post('/login', [
        'as'    => 'api.auth.login',
        'uses'  => 'AuthController@login',
    ]);

    //$router->group(['middleware' => 'auth:api'], function (Router $router) {
        $router->get('/getUser', [
            'as'    => 'api.auth.getUser',
            'uses'  => 'AuthController@getUser',
        ]);
    //});
});
