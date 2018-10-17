<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('/posts', [
    'as'    => 'post.index',
    'uses'  => 'PostController@index'
]);
