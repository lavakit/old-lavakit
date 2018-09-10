<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'post'], function (Router $router){
    $router->get('posts', [
        'as'        => 'admin.post.index',
        'uses'      => 'PostController@index',
        'middleware'=> 'web'
    ]);
});