let mix = require('laravel-mix');
const dir_destination = '../../../public/themes/backend/adminlte/assets';

/**
 * Compile Sass
 */
mix.sass('assets/sass/style.scss', 'assets/css/style.css');
mix.sass('../../../modules/menu/resources/assets/sass/menu.scss', 'assets/css/menu.css');

/**
 * Compile javascript
 */
mix.scripts([
    '../../../modules/base/resources/assets/js/variable.js',
    '../../../modules/base/resources/assets/js/core.js',
    '../../../modules/base/resources/assets/js/csrf.js',
], 'assets/js/core.js');


mix
    .scripts('../../../modules/base/resources/assets/js/editor.js', 'assets/js/app_modules/editor.js')
    .scripts('../../../modules/menu/resources/assets/js/menu.js', 'assets/js/app_modules/menu.js')
    .scripts('../../../modules/post/resources/assets/js/post.js', 'assets/js/app_modules/post.js');


/**
 * Combine files css
 */
mix.combine([
    'assets/css/style.css',
    'assets/css/menu.css'
], dir_destination + '/css/all.css').minify(dir_destination + '/css/all.css');

/**
 * Copy scripts
 */
mix.copyDirectory('assets/js', dir_destination + '/js');

/**
 * Copy images
 */
mix.copyDirectory('assets/images', dir_destination + '/images');

/**
 * Copy vendor
 */
mix.copyDirectory('assets/vendor', dir_destination + '/vendor');