<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('/menus', [
        'as'    => 'menu.index',
        'uses'  => 'MenuController@index'
]);
