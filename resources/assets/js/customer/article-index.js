'use strict';

$(function () {
    let productContainer = $('.infinite-article'),
        articleSpinner = $('.article-spinner'),
        articleEndEof = $('.article-end-of-content');

    const delay = ms => new Promise(res => setTimeout(res, ms));

    if (productContainer.length) {
        let page = 1;
        $(window).scroll(async function () {
            if ($(window).scrollTop() >= (productContainer.offset().top + productContainer.outerHeight() - window.innerHeight) + 150) {
                page++;

                if (articleEndEof.attr('data-end') !== '1') {
                    infiniteLoadMore(page);
                    await delay(3000);
                }
            }
        });
    }

    function infiniteLoadMore(page) {
        let url_string = window.location.href;
        let url = new URL(url_string);
        let categories = url.searchParams.get("categories");

        $.ajax({
            url: '/blogs?page=' + page + '&categories=' + (categories ?? ''),
            datatype: 'html',
            type: 'get',

            beforeSend: function () {
                articleSpinner.removeClass('d-none');
            }
        }).done(async function (response) {
            if (response.html === '') {
                articleSpinner.addClass('d-none');
                articleEndEof.removeClass('d-none');
                articleEndEof.attr('data-end', '1');

                return;
            }

            articleSpinner.addClass('d-none');
            productContainer.append(response.html);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occur');
        });
    }

});
