'use strict';

$(function () {
    let productContainer = $('.infinite-article');
    const delay = ms => new Promise(res => setTimeout(res, ms));

    if (productContainer.length) {
        let page = 1;
        $(window).scroll(async function () {
            if ($(window).scrollTop() >= (productContainer.offset().top + productContainer.outerHeight() - window.innerHeight) + 150) {
                page++;
                infiniteLoadMore(page);

                await delay(3000);
            }
        });
    }

    function infiniteLoadMore(page) {
        $.ajax({
            url: '/blogs?page=' + page,
            datatype: 'html',
            type: 'get',

            beforeSend: function () {
                // $('.auto-load').show();
            }
        }).done(async function (response) {
            if (response.html === '') {
                return;
            }

            // $('.auto-load').hide();
            productContainer.append(response.html);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occur');
        });
    }

});
