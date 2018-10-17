<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/posts'], function (Router $router) {
    $router->get('/', [
        'as'        => 'admin.post.index',
        'uses'      => 'PostController@index',
        'middleware'=> 'web'
    ]);
});
