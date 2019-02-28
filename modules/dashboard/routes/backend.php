<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('/', [
   'as'            => 'admin.dashboards.index',
   'uses'          => 'DashboardController@index'
]);
