<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/acl'], function (Router $router){
    $router->get('acls', [
        'as'            =>  'admin.acl.index',
        'uses'          =>  'AclController@index',
        'middleware'    =>  'web'
    ]);
});