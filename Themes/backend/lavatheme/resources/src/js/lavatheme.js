window.Popper = require('popper.js').default;

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.PerfectScrollbar = require('perfect-scrollbar').default;

require('./bootstrap');
require('./vue');