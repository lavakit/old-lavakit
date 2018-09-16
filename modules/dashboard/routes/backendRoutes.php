<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('/', [
   'as'            => 'admin.dashboard.index',
   'uses'          => 'DashboardController@index',
   'middleware'    => 'web'
]);
