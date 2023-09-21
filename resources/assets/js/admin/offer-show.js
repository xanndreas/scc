'use strict';
$(function () {
    let $actionType = $('input[name="action_type"]');

    $('.negotiation-btn').on('click', function () {
        if (confirm('Are you sure for negotiate?')) {
            $actionType.val('negotiation');
            submitUpdate()
        }
    });

    $('.accept-deal-btn').on('click', function () {
        if (confirm('Are you sure accepting this offers?')) {
            $actionType.val('accept-deal');
            submitUpdate()
        }
    });

    function submitUpdate() {
        $('#update-offers').submit();
    }
});
