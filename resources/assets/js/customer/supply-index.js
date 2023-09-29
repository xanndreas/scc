'use strict';

$(function () {
    let supplyContainer = $('.infinite-supplies'),
        supplyDetailModalSelector = $('#supply-detail-modal'),
        supplyDetailModalContent = $('.supply-container'),
        supplySpinner = $('.supply-spinner'),
        supplyEndEof = $('.supply-end-of-content'),
        supplySearch = $('#supply-search');

    const delay = ms => new Promise(res => setTimeout(res, ms));

    if (supplyContainer.length) {
        let page = 1;
        $(window).scroll(async function () {
            if ($(window).scrollTop() >= (supplyContainer.offset().top + supplyContainer.outerHeight() - window.innerHeight) + 100) {
                page++;

                if (supplyEndEof.attr('data-end') !== '1') {
                    infiniteLoadMore(page);
                    await delay(3000);
                }
            }
        });
    }

    if (supplyDetailModalSelector.length) {
        let supplyDetailModal = new bootstrap.Modal(document.getElementById('supply-detail-modal'), {});

        supplyContainer.on('click', 'a.supply-detail-show', function () {
            $.ajax({
                url: '/supplies/' + $(this).data('supply-id'),
                datatype: 'html',
                type: 'get',

                beforeSend: function () {
                    supplyDetailModalContent.html('');
                }
            }).done(async function (response) {
                if (response.html === '') {
                    return;
                }

                supplyDetailModalContent.append(response.html);
                supplyDetailModal.show();
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });

        });
    }

    if (supplySearch.length) {
        supplySearch.on('keyup', function () {
            let $this = $(this);
            $.ajax({
                url: '/supplies?q=' + $this.val(),
                datatype: 'html',
                type: 'get',

                beforeSend: function () {
                    supplyContainer.html('');
                    supplySpinner.removeClass('d-none');
                }
            }).done(async function (response) {
                if (response.html === '') {
                    supplySpinner.addClass('d-none');
                    supplyEndEof.removeClass('d-none');
                    supplyEndEof.attr('data-end', '1');

                    return; 
                }

                supplySpinner.addClass('d-none');
                supplyContainer.html(response.html);
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });
        });
    }

    function infiniteLoadMore(page) {
        $.ajax({
            url: '/supplies?q=' + supplySearch.val() + '&page=' + page,
            datatype: 'html',
            type: 'get',

            beforeSend: function () {
                supplySpinner.removeClass('d-none');
            }
        }).done(async function (response) {
            if (response.html === '') {
                supplySpinner.addClass('d-none');
                supplyEndEof.removeClass('d-none');
                supplyEndEof.attr('data-end', '1');

                return;
            }

            supplySpinner.addClass('d-none');
            supplyContainer.append(response.html);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occur');
        });
    }


    let swiperProducts = document.getElementById('swiper-products'),
        ProductsPreviousBtn = document.getElementById('products-previous-btn'),
        ProductsNextBtn = document.getElementById('products-next-btn'),
        ProductsSliderPrev = document.querySelector('.swiper-button-prev'),
        ProductsSliderNext = document.querySelector('.swiper-button-next');

    // swiper carousel
    // Customers reviews
    // -----------------------------------
    if (swiperProducts) {
        new Swiper(swiperProducts, {
            slidesPerView: 1,
            spaceBetween: 5,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            loop: true,
            loopAdditionalSlides: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 26
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            }
        });
    }


    // Reviews slider next and previous
    // -----------------------------------
    // Add click event listener to next butto
    if (ProductsNextBtn) {
        ProductsNextBtn.addEventListener('click', function () {
            ProductsSliderNext.click();
        });
        ProductsPreviousBtn.addEventListener('click', function () {
            ProductsSliderPrev.click();
        });
    }

});
