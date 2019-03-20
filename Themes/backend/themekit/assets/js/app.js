window._ = require('lodash');
window.Popper = require('popper.js').default;

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.PerfectScrollbar = require('perfect-scrollbar').default;

import Screenfull from 'screenfull';

require('./theme');