<?php

/**
 * @Date 2018-09-18
 * @author hoatq <tqhoa8th@gmail.com>
 */

if (!defined('FRONTEND_ASSET')) {
    define('FRONTEND_ASSET', '/themes/frontend/' . env('FRONTEND_DEFAULT', 'default') . '/assets/');
}

if (!defined('FRONTEND_VENDOR')) {
    define('FRONTEND_VENDOR', FRONTEND_ASSET . 'vendor/');
}

if (!defined('BACKEND_ASSET')) {
    define('BACKEND_ASSET', '/themes/backend/' . env('BACKEND_DEFAULT', 'adminlte') . '/assets/');
}

if (!defined('BACKEND_VENDOR')) {
    define('BACKEND_VENDOR', BACKEND_ASSET . 'vendor/');
}
