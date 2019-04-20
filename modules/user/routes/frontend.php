<?php

use Illuminate\Routing\Router;

/** @var $router Router */
$router->group([
    'prefix' => config('user.user.auth-prefix'),
    'middleware' => 'backend:' . config('theme.theme.types.middleware.backend')
], function (Router $router) {
    $router->get('/login', [
        'as'  => 'login',
        'uses'  => 'AuthController@getLogin'
    ]);

    if (config('user.user.allow_register')) {
        $router->get('/register', [
            'as' => 'register',
            'uses' => 'AuthController@getRegister'
        ]);

        $router->post('/register', [
            'as' => 'auth.register',
            'uses' => 'AuthController@register'
        ]);
    }

    $router->get('/confirm/{email?}', [
        'as'    => 'auth.confirm',
        'uses'  => 'AuthController@confirm'
    ]);

    $router->get('/forgot', [
        'as'    => 'forgot',
        'uses'  => 'AuthController@getForgot'
    ]);

    $router->post('/forgot', [
        'as'    => 'auth.forgot',
        'uses'  => 'AuthController@forgot'
    ]);

    $router->get('/reset/{email?}/{token?}', [
        'as'    => 'password.reset',
        'uses'  => 'AuthController@getReset'
    ]);

    $router->post('/reset', [
        'as'    => 'auth.reset',
        'uses'  => 'AuthController@reset'
    ]);

    $router->get('/logout', [
        'as'    => 'auth.logout',
        'uses'  => 'AuthController@logout'
    ]);
});
