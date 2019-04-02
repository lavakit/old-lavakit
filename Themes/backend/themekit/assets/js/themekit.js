window.Popper = require('popper.js').default;

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('@fortawesome/fontawesome-free/js/all');
} catch (e) {}

window.PerfectScrollbar = require('perfect-scrollbar').default;

window._ = window.screenfull = require('screenfull');

window.Selectize = require('selectize');

require('./theme');

require('./bootstrap');

require('./vue');