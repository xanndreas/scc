'use strict';

$(function () {
    let direction = 'ltr',
        isRTL = false,
        productContainer = $('.infinite-products'),
        productContainerDetail = $('.container-products'),
        marketplaceSpinner = $('.marketplace-spinner'),
        marketplaceEndEof = $('.marketplace-end-of-content'),
        marketplaceSearch = $('#marketplace-search');

    const delay = ms => new Promise(res => setTimeout(res, ms));

    if ($('html').data('textdirection') === 'rtl') {
        direction = 'rtl';
    }

    if (direction === 'rtl') {
        isRTL = true;
    }

    if (productContainer.length) {
        let page = 1;
        $(window).scroll(async function () {
            if ($(window).scrollTop() >= (productContainer.offset().top + productContainer.outerHeight() - window.innerHeight) + 150) {
                page++;

                if (marketplaceEndEof.attr('data-end') !== '1') {
                    infiniteLoadMore(page);
                    await delay(3000);
                }
            }
        });
    }

    if (marketplaceSearch.length) {
        marketplaceSearch.on('keyup', function () {
            let $this = $(this);
            $.ajax({
                url: '/marketplaces?q=' + $this.val(),
                datatype: 'html',
                type: 'get',

                beforeSend: function () {
                    productContainer.html('');
                    marketplaceSpinner.removeClass('d-none');
                }
            }).done(async function (response) {
                if (response.html === '') {
                    marketplaceSpinner.addClass('d-none');
                    marketplaceEndEof.removeClass('d-none');
                    marketplaceEndEof.attr('data-end', '1');

                    return; 
                }

                marketplaceSpinner.addClass('d-none');
                productContainer.html(response.html);
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });
        });
    }

    function infiniteLoadMore(page) {
        $.ajax({
            url: '/marketplaces?q=' + marketplaceSearch.val() + '&page=' + page,
            datatype: 'html',
            type: 'get',

            beforeSend: function () {
                marketplaceSpinner.removeClass('d-none');
            }
        }).done(async function (response) {
            if (response.html === '') {
                marketplaceSpinner.addClass('d-none');
                marketplaceEndEof.removeClass('d-none');
                marketplaceEndEof.attr('data-end', '1');

                return;
            }

            marketplaceSpinner.addClass('d-none');
            productContainer.append(response.html);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occur');
        });
    }

    // On cart & view cart btn click to cart
    if (productContainer.length) {
        productContainer.on('click', 'a.btn-cart', function (e) {
            let $this = $(this),
                addToCart = $this.find('.add-to-cart');

            if (addToCart.length > 0) {
                e.preventDefault();
            }

            $.ajax({
                url: '/marketplaces/' + $this.data('product-id'),
                type: 'post',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(async function (response) {
                if (response.status_code !== 200) {
                    toastr['error']('', response.message, {
                        closeButton: false,
                        tapToDismiss: true,
                        rtl: isRTL
                    });

                    if (response.redirect !== '') {
                        window.location.href = response.redirect;
                    }
                } else {
                    toastr['success']('', response.message, {
                        closeButton: false,
                        tapToDismiss: true,
                        rtl: isRTL
                    });
                }

            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });
        });
    }

    if (productContainerDetail.length) {
        productContainerDetail.on('click', 'a.btn-cart', function (e) {
            let $this = $(this),
                addToCart = $this.find('.add-to-cart');

            if (addToCart.length > 0) {
                e.preventDefault();
            }

            $.ajax({
                url: '/marketplaces/' + $this.data('product-id'),
                type: 'post',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
            }).done(async function (response) {
                if (response.status_code !== 200) {
                    toastr['error']('', response.message, {
                        closeButton: false,
                        tapToDismiss: true,
                        rtl: isRTL
                    });

                    if (response.redirect !== '') {
                        window.location.href = response.redirect;
                    }
                } else {
                    toastr['success']('', response.message, {
                        closeButton: false,
                        tapToDismiss: true,
                        rtl: isRTL
                    });
                }

            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occur');
            });
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
