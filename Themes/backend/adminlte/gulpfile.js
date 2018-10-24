process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');
const gulp = require('gulp');

const dir_destination = './../../../public/themes/backend/adminlte/assets';

/*Load file scss*/
let filesStylesheetModules = [
    {module: 'post', file: 'post'},
    {module: 'menu', file: 'menu'},
];

/*Load file Js scss*/
let filesJsModules = [
    {module:'post', file: 'post'},
    {module: 'menu', file: 'menu'},
];

/*Combine file style*/
let fileStyle = [
    './assets/css/style.css'
];

elixir.config.sourcemaps = false;
elixir.inProduction = false;

elixir(function (mix) {

    mix.sass('./assets/sass/style.scss', 'assets/css/style.css');

    /*StyleSheet in the module */
    filesStylesheetModules.forEach(function (data) {
        mix.sass('./../../../modules/'+ data.module +'/resources/assets/sass/'+ data.file +'.scss', 'assets/css/'+  data.file +'.css');

        fileStyle.push('./assets/css/' + data.file + '.css');
    });

    elixir(function(mix) {
        mix.styles(fileStyle, dir_destination + '/css/style.css');
    });

    mix.scripts([
        './../../../modules/base/resources/assets/js/variable.js',
        './../../../modules/base/resources/assets/js/csrf.js',
        './../../../modules/base/resources/assets/js/core.js'
    ], 'assets/js/core.js')

    /*Javascript in the module*/
    filesJsModules.forEach(function (data) {
        mix.scripts('./../../../modules/' + data.module + '/resources/assets/js/' + data.file + '.js', 'assets/js/app_modules/' + data.file + '.js');
        mix.scripts('./../../../modules/' + data.module + '/resources/assets/js/' + data.file + '.js', dir_destination + '/js/app_modules/' + data.file + '.js');
    });

    /*Copy an entire Images directory*/
    mix.copy('assets/images', '../../../public/themes/backend/adminlte/assets/images');

    /*Copy an entire vendor directory*/
    mix.copy('assets/vendor', '../../../public/themes/backend/adminlte/assets/vendor');

    /*Copy file core.js */
    mix.copy('assets/js/core.js', '../../../public/themes/backend/adminlte/assets/js/core.js');
});