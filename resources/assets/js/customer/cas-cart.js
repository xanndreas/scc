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
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'qty': $this.val()
            },

            success: function (data) {
                window.location.href = '/cas/cart'
            }
        });
    });

    $('.check-voucher').on('click', function () {
        let discountCode = $('#discount_code');
        let discountCodeRel = $('#discount_code_rel');
        $.ajax({
            type: 'POST',
            url: '/cas/check-voucher',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'discount_code': discountCode.val()
            },

            success: function (response) {
                if (response.status_code === 200) {
                    discountCodeRel.attr('name', 'discount_code');
                    discountCodeRel.val(discountCode.val());

                    toastr['success']('', response.message, {
                        closeButton: false,
                        tapToDismiss: true,
                    });
                } else {
                    toastr['error']('', response.message, {
                        closeButton: false,
                        tapToDismiss: true,
                    });
                }

            }
        });
    });

});
