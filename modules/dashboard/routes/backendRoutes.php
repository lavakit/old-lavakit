<?php

Route::get('/', [
    'as'            =>  'admin.dashboard.index',
    'uses'          =>  'DashboardController@index',
    'middleware'    =>  'web'
]);
