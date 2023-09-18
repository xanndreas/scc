'use strict';

$(function () {
    let direction = 'ltr',
        isRTL = false,
        btnCart = $('.btn-cart'),
        productContainer = $('.infinite-products'),
        checkout = '/cas/cart';

    if ($('html').data('textdirection') === 'rtl') {
        direction = 'rtl';
    }

    if (direction === 'rtl') {
        isRTL = true;
    }

    if (productContainer.length) {
        let page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() >= (productContainer.offset().top + productContainer.outerHeight() - window.innerHeight) + 150) {
                page++;
                infiniteLoadMore(page);
            }
        });
    }

    function infiniteLoadMore(page) {
        $.ajax({
            url: '/marketplaces?page=' + page,
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
            await delay(5000);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occur');
        });
    }

    // On cart & view cart btn click to cart
    if (btnCart.length) {
        btnCart.on('click', function (e) {
            let $this = $(this),
                addToCart = $this.find('.add-to-cart');
            if (addToCart.length > 0) {
                e.preventDefault();
            }

            addToCart.text('View In Cart').removeClass('add-to-cart').addClass('view-in-cart');
            toastr['success']('', 'Item Added to cart', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRTL
            });

            $this.attr('href', checkout);
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
