<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/user'], function (Router $router) {
    $router->get('/', [
        'as'        => 'admin.user.index',
        'uses'      => 'UserController@index',
        'middleware'=> 'web'
    ]);
});
