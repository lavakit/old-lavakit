process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;
elixir.inProduction = false;

const dir_destination = './../../../public/themes/backend/themekit/assets';

/*Load file scss*/
let filesStylesheetModules = [
    //{module: 'post', file: 'post'},
];

/*Load file Js scss*/
let filesJsModules = [
    //{module:'post', file: 'post'},
];

/*Combine file style*/
let fileStyle = [
    dir_destination + '/css/build/style.css'
];

elixir(function (mix) {

    mix.sass('./assets/sass/style.scss', dir_destination + '/css/build/style.css');

    /*StyleSheet in the module */
    filesStylesheetModules.forEach(function (data) {
        mix.sass('./../../../modules/'+ data.module +'/resources/assets/sass/'+ data.file +'.scss', dir_destination + '/css/build/');

        fileStyle.push(dir_destination + '/css/build/' + data.file + '.css');
    });

    mix.scripts([
        './../../../modules/base/resources/assets/js/variable.js',
        './../../../modules/base/resources/assets/js/csrf.js',
        './../../../modules/base/resources/assets/js/core.js'
    ], dir_destination + '/js/core.js')

    /*Javascript in the module*/
    filesJsModules.forEach(function (data) {
        mix.scripts('./../../../modules/' + data.module + '/resources/assets/js/' + data.file + '.js', dir_destination + '/js/app_modules/' + data.file + '.js');
    });

    /*Copy an entire Images directory*/
    mix.copy('assets/images', '../../../public/themes/backend/adminlte/assets/images');
});

elixir(function(mix) {
    mix.styles(fileStyle, dir_destination + '/css/all.css');
});