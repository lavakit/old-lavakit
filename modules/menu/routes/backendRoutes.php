<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/menus'], function (Router $router) {
    $router->get('/', [
        'as'    => 'menu.index',
        'uses'  => 'MenuController@index'
    ]);
});
