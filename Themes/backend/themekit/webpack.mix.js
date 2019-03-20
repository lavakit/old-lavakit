let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
|
*/

const dir_destination = './../../../public/themes/backend/themekit/assets';

/*Load file Js scss*/
let filesJsModules = [
    {module: 'base', file: 'editor'},
];

/*Load file scss*/
let filesStylesheetModules = [
    {module: 'post', file: 'post'},
];

/*Combine file style*/
let fileStyle = [
    dir_destination + '/css/build/style.css'
];

mix.setPublicPath('./../../../public').options({
        processCssUrls: false,
    })
    .js([
        'assets/js/app.js'
    ], 'themes/backend/themekit/assets/js/theme.js')
    .sass('assets/sass/style.scss', 'themes/backend/themekit/assets/css/build/style.css');


mix.babel([
    './../../../modules/base/resources/assets/js/variable.js',
    './../../../modules/base/resources/assets/js/csrf.js',
    './../../../modules/base/resources/assets/js/core.js',
], dir_destination + '/js/core.js');

/*Javascript in the module*/
filesJsModules.forEach(function (data) {
    mix.scripts('./../../../modules/' + data.module + '/resources/assets/js/' + data.file + '.js', dir_destination + '/js/app_modules/' + data.file + '.js');
});

/*StyleSheet in the module */
filesStylesheetModules.forEach(function (data) {
    mix.sass('./../../../modules/'+ data.module +'/resources/assets/sass/'+ data.file +'.scss', dir_destination + '/css/build/');

    fileStyle.push(dir_destination + '/css/build/' + data.file + '.css');
});


/*Copy an entire Images directory*/
mix.copy('assets/images', dir_destination + '/images');

mix.styles(fileStyle, dir_destination + '/css/style.css');

mix.disableNotifications();