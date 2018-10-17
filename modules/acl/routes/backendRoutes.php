<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/acl'], function (Router $router) {
    $router->get('/', [
        'as'            =>  'admin.acl.index',
        'uses'          =>  'AclController@index',
        'middleware'    =>  'web'
    ]);
});
