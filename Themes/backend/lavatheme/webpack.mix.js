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

const dir_destination = './../../../public/themes/backend/lavatheme/assets';

mix.setPublicPath('./../../../public');

mix.js('assets/js/lavatheme.js', 'themes/backend/lavatheme/assets/js/lavakit.js').extract(['jquery', 'vue'])
    .sass('./assets/sass/style.scss', 'themes/backend/lavatheme/assets/css/style.css').options({
    processCssUrls: false,
});

/** Copy vendor */
mix.copy('node_modules/icon-kit/dist/fonts', dir_destination + '/fonts');

/*Copy an entire Images directory*/
mix.copy('assets/images', dir_destination + '/images');