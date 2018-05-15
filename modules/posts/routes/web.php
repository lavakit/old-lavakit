<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your Module. Just tell Your app the URIs it should respond to
| using a Closure or controller method. Build something great!
|
*/

Route::get('posts', 'PostsController@index');
Route::get('posts/config', function (){
    echo config('base.admin_dir');
    echo '<br/>';
    return config_path('base.php');
});
