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

mix.setPublicPath('./../../../public').options({
        processCssUrls: false,
    })
    .js([
        'assets/js/app.js'
    ], 'themes/backend/themekit/assets/js')
    .sass('assets/sass/style.scss', 'themes/backend/themekit/assets/css/style.css');
