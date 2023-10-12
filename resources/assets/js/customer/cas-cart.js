'use strict';

$(function () {
    let itemQty = $('.item-qty');

    itemQty.on('change', function () {
        let $this = $(this),
            dataId = $this.data('item-id');

        $.ajax({
            type: 'POST',
            url: '/cas/cart-change/' + dataId,
            data: {
                '_token':  $('meta[name="csrf-token"]').attr('content'),
                'qty': $this.val()
            },

            success: function (data) {
                window.location.href = '/cas/cart'
            }
        });
    });

});
