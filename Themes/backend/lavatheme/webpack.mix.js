let mix = require('laravel-mix');
const { version, name } = require('./package.json')
const webpack = require('webpack');
const path = require('path');

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

mix.webpackConfig({
    resolve:{
        alias: {
            '@modules': path.resolve(__dirname, '../../../modules/'),
            '@layouts': path.resolve(__dirname, './../../../Themes/backend/lavatheme/resources/src/js/views/'),
            '@packages': path.resolve(__dirname, './node_modules/')
        }
    },
    plugins: [
        new webpack.DefinePlugin({
            THEME_VERSION: JSON.stringify(version),
            THEME_NAME: JSON.stringify(name),
        }),
    ]
});

mix.setPublicPath('./');

mix.js('resources/src/js/lavatheme.js', 'assets/js/lavakit.js').extract(['vue'])
    .sass('resources/src/sass/style.scss', 'assets/css/style.css').options({
        processCssUrls: false,

    }).sourceMaps(true, 'source-map');

/** Copy vendor */
mix.copy('node_modules/icon-kit/dist/fonts', 'assets/fonts');
mix.copy('node_modules/font-awesome/fonts', 'assets/fonts');
mix.copy('node_modules/element-ui/lib/theme-chalk/fonts', 'assets/fonts');

/*Copy an entire Images directory*/
mix.copy('resources/src/images', 'assets/images');

/** Publish*/
mix.copy('assets','./../../../public/themes/backend/lavatheme/assets');

if (mix.inProduction) {
    mix.version();
    mix.disableNotifications();
}

mix.browserSync({
    proxy: 'lavakit.local'
});