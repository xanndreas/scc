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
});
// 