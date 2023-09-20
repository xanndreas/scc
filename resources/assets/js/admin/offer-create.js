'use strict';
$(function () {

    // repeater
    $('.form-repeater-container').on('submit', function (e) {
        e.preventDefault();
    });

    let rowOfferDetails = 2;
    let colOfferDetails = 1;

    $('.offer_details-repeater').repeater({
        show: function () {
            let fromControl = $(this).find('.form-control, .form-select');
            let formLabel = $(this).find('.form-label');

            $('.select2-container').remove();
            $('.select2').select2();

            fromControl.each(function (i) {
                let id = 'form-repeater-' + rowOfferDetails + '-' + colOfferDetails;
                $(fromControl[i]).attr('id', id);
                $(formLabel[i]).attr('for', id);
                colOfferDetails++;
            });

            rowOfferDetails++;

            $(this).slideDown();
        },

        hide: function (e) {
            confirm('Are you sure you want to delete this element?') && $(this).slideUp(e);
        }
    });
});
