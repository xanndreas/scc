'use strict';

$(function () {

    let landingHeroLight = $(".light-style .landing-hero"),
        landingHeroDark = $(".dark-style .landing-hero");

    if (landingHeroLight.length) {
        landingHeroLight.css({ "background-image": "url("+landingHeroLight.data('background')+"), linear-gradient(0deg, rgba(190, 190, 213, 0.40) 0%, rgba(112, 102, 102, 0.93) 94.44%)"});
    }

    if (landingHeroDark.length) {
        landingHeroDark.css({ "background-image": "url("+landingHeroDark.data('background')+"), linear-gradient(138.18deg, #2f2e34 0%, rgba(162, 147, 148, 0.93) 94.44%)"});
    }



    let swiperReviews = document.getElementById('swiper-reviews'),
        ReviewsPreviousBtn = document.getElementById('reviews-previous-btn'),
        ReviewsNextBtn = document.getElementById('reviews-next-btn'),
        ReviewsSliderPrev = document.querySelector('.swiper-reviews-button-prev'),
        ReviewsSliderNext = document.querySelector('.swiper-reviews-button-next');

    if (swiperReviews) {
        new Swiper(swiperReviews, {
            slidesPerView: 1,
            spaceBetween: 5,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            loop: true,
            loopAdditionalSlides: 1,
            navigation: {
                nextEl: '.swiper-reviews-button-next',
                prevEl: '.swiper-reviews-button-prev'
            },
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 26
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 20
                }
            }
        });
    }


    // Reviews slider next and previous
    // -----------------------------------
    // Add click event listener to next butto
    if (ReviewsNextBtn) {
        ReviewsNextBtn.addEventListener('click', function () {
            ReviewsSliderNext.click();
        });
        ReviewsPreviousBtn.addEventListener('click', function () {
            ReviewsSliderPrev.click();
        });
    }
});
//
