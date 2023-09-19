'use strict';

$(function () {
    let supplyContainer = $('.infinite-supplies'),
        supplyDetailModalSelector = $('#supply-detail-modal'),
        supplyDetailModalContent = $('.supply-container');

    const delay = ms => new Promise(res => setTimeout(res, ms));

    if (supplyDetailModalSelector.length) {
        let supplyDetailModal = new bootstrap.Modal(document.getElementById('supply-detail-modal'), {});

        $('.supply-detail-show').on('click', function () {
            $.ajax({
                url: '/supplies/' + $(this).data('supply-id'),
                datatype: 'html',
                type: 'get',

                beforeSend: function () {
                    // $('.auto-load').show();
                    supplyDetailModalContent.html('');
                }
            }).done(async function (response) {
                if (response.html === '') {
                    return;
                }

                // $('.auto-load').hide();
                supplyDetailModalContent.append(response.html);
                supplyDetailModal.show();
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });

        });
    }

    if (supplyContainer.length) {
        let page = 1;
        $(window).scroll(async function () {
            if ($(window).scrollTop() >= (supplyContainer.offset().top + supplyContainer.outerHeight() - window.innerHeight) + 100) {
                page++;
                infiniteLoadMore(page);

                await delay(3000);
            }
        });
    }

    function infiniteLoadMore(page) {
        $.ajax({
            url: '/supplies?page=' + page,
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
