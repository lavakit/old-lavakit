/**=== Set default language ===*/
var _default_language = 'en';

var Inspired = Inspired || {};

Inspired.getLanguage = function () {
    let language = '/' + _default_language;

    return language;
};
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
