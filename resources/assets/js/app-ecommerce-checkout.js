/*=========================================================================================
    File Name: app-ecommerce.js
    Description: Ecommerce pages js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';

    var quantityCounter = $('.quantity-counter'),
        CounterMin = 1,
        CounterMax = 10,
        bsStepper = document.querySelectorAll('.bs-stepper'),
        checkoutWizard = document.querySelector('.checkout-tab-steps'),
        removeItem = $('.remove-wishlist'),
        moveToCart = $('.move-cart'),
        isRtl = $('html').attr('data-textdirection') === 'rtl';

    // remove items from wishlist page
    removeItem.on('click', function () {
        $(this).closest('.ecommerce-card').remove();
        toastr['error']('', 'Removed Item 🗑️', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
        });
    });

    // move items to cart
    moveToCart.on('click', function () {
        $(this).closest('.ecommerce-card').remove();
        toastr['success']('', 'Added to wishlist ❤️', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
        });
    });
});
