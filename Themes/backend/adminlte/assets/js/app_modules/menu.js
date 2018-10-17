var InspiredMenu = function () {

    var menuObj = 'menu';

    var getData = function () {
        console.log('getData');
    };

    let create = function () {
        console.log('Create Menu');
    };

    return {
        init: function () {
            
        },

        storeMenu: function () {
            create();
        }
    }
};

$(function () {
    InspiredMenu.init();

    $(document).on('click', '.create-menu', function () {
       InspiredMenu.storeMenu();
    });
});
