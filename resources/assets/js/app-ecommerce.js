/*=========================================================================================
    File Name: app-ecommerce.js
    Description: Ecommerce pages js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

'use strict';

$(function () {
    // RTL Support
    var direction = 'ltr',
        isRTL = false;
    if ($('html').data('textdirection') == 'rtl') {
        direction = 'rtl';
    }

    if (direction === 'rtl') {
        isRTL = true;
    }
    var sidebarShop = $('.sidebar-shop'),
        btnCart = $('.btn-cart'),
        overlay = $('.body-content-overlay'),
        sidebarToggler = $('.shop-sidebar-toggler'),
        gridViewBtn = $('.grid-view-btn'),
        listViewBtn = $('.list-view-btn'),
        priceSlider = document.getElementById('price-slider'),
        ecommerceProducts = $('#ecommerce-products'),
        sortingDropdown = $('.dropdown-sort .dropdown-item'),
        sortingText = $('.dropdown-toggle .active-sorting'),
        wishlist = $('.btn-wishlist'),
        checkout = 'app-ecommerce-checkout.html';

    if ($('body').attr('data-framework') === 'laravel') {
        var url = $('body').attr('data-asset-path');
        checkout = url + 'app/ecommerce/checkout';
    }
});

// on window resize hide sidebar
$(window).on('resize', function () {
    if ($(window).outerWidth() >= 991) {
        $('.sidebar-shop').removeClass('show');
        $('.body-content-overlay').removeClass('show');
    }
});
