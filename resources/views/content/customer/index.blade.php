@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('vendor-style')
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/nouislider/nouislider.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-landing.css')}}"/>

    <script src="{{asset('assets/js/front-config.js')}}"></script>
@endsection

@section('page-style')

@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/js/dropdown-hover.js')}}"></script>
    <script src="{{asset('assets/vendor/js/mega-dropdown.js')}}"></script>

    <script src="{{asset('assets/vendor/libs/nouislider/nouislider.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/front-main.js')}}"></script>
    <script src="{{asset('assets/js/front-page-landing.js')}}"></script>
@endsection


@section('content')
    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
        <div class="container">
            <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
                <!-- Menu logo wrapper: Start -->
                <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
                    <!-- Mobile menu toggle: Start-->
                    <button
                        class="navbar-toggler border-0 px-0 me-2"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">

                        <i class="ti ti-menu-2 ti-sm align-middle"></i>
                    </button>
                    <!-- Mobile menu toggle: End-->
                    <a href="{{ route('customer-home') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                    fill="#7367F0"/>
                                <path
                                    opacity="0.06"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                    fill="#161616"/>
                                <path
                                    opacity="0.06"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                    fill="#161616"/>
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                    fill="#7367F0"/>
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">E-Commerce</span>
                    </a>
                </div>
                <!-- Menu logo wrapper: End -->

                <!-- Menu wrapper: Start -->
                <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                    <button
                        class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-x ti-sm"></i>
                    </button>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" aria-current="page"
                               href="#landingHero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="#landingFeatures">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="#landingFAQ">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="#landingContact">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('customer-marketplace') }}" target="_blank">Marketplace</a>
                        </li>
                    </ul>
                </div>
                <div class="landing-menu-overlay d-lg-none"></div>
                <!-- Menu wrapper: End -->
                <!-- Toolbar: Start -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Style Switcher -->
                    <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                           data-bs-toggle="dropdown">
                            <i class="ti ti-sm"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                    <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                    <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                    <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- / Style Switcher-->

                    <!-- navbar button: Start -->
                    <li>
                        <a href="../vertical-menu-template/auth-login-cover.html" class="btn btn-primary"
                           target="_blank" ><span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span
                            ><span class="d-none d-md-block">Sign in</span></a>
                    </li>
                    <!-- navbar button: End -->
                </ul>
                <!-- Toolbar: End -->
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHero" class="section-py landing-hero position-relative">
                <div class="container">
                    <div class="hero-text-box text-center">
                        <h1 class="text-primary hero-title display-6 fw-bold">One dashboard to manage all your
                            businesses</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1">
                            Production-ready & easy to use Admin Template<br class="d-none d-lg-block"/>
                            for Reliability and Customizability.
                        </h2>
                        <div class="landing-hero-btn d-inline-block position-relative">
                        <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">Join community
                            <img src="{{asset('assets/img/front-pages/icons/Join-community-arrow.png')}}"
                                 alt="Join community arrow"
                                 class="scaleX-n1-rtl"/>
                        </span>
                            <a href="#landingPricing" class="btn btn-primary btn-lg">Go to Marketplace</a>
                        </div>
                    </div>
                    <div id="heroDashboardAnimation" class="hero-animation-img">
                        <a href="../vertical-menu-template/dashboards-ecommerce.html" target="_blank">
                            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
                                <img
                                    src="{{asset('assets/img/front-pages/landing-page/hero-dashboard-light.png')}}"
                                    alt="hero dashboard"
                                    class="animation-img"
                                    data-app-light-img="front-pages/landing-page/hero-dashboard-light.png"
                                    data-app-dark-img="front-pages/landing-page/hero-dashboard-dark.png"/>
                                <img
                                    src="{{asset('assets/img/front-pages/landing-page/hero-elements-light.png')}}"
                                    alt="hero elements"
                                    class="position-absolute hero-elements-img animation-img top-0 start-0"
                                    data-app-light-img="front-pages/landing-page/hero-elements-light.png"
                                    data-app-dark-img="front-pages/landing-page/hero-elements-dark.png"/>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="landing-hero-blank"></div>
        </section>
        <!-- Hero: End -->

        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Useful Features</span>
                </div>
                <h3 class="text-center mb-1">
                    <span class="section-title">Everything you need</span> to start your next project
                </h3>
                <p class="text-center mb-3 mb-md-5 pb-3">
                    Not just a set of tools, the package includes ready-to-deploy conceptual application.
                </p>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop charging"/>
                        </div>
                        <h5 class="mb-3">Quality Code</h5>
                        <p class="features-icon-description">
                            Code structure that all developers will easily understand and fall in love with.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/rocket.png')}}" alt="transition up"/>
                        </div>
                        <h5 class="mb-3">Continuous Updates</h5>
                        <p class="features-icon-description">
                            Free updates for the next 12 months, including new demos and features.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/paper.png')}}" alt="edit"/>
                        </div>
                        <h5 class="mb-3">Stater-Kit</h5>
                        <p class="features-icon-description">
                            Start your project quickly without having to remove unnecessary features.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/check.png')}}" alt="3d select solid"/>
                        </div>
                        <h5 class="mb-3">API Ready</h5>
                        <p class="features-icon-description">
                            Just change the endpoint and see your own data loaded within seconds.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/user.png')}}" alt="lifebelt"/>
                        </div>
                        <h5 class="mb-3">Excellent Support</h5>
                        <p class="features-icon-description">An easy-to-follow doc with lots of references and code
                            examples.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/keyboard.png')}}" alt="google docs"/>
                        </div>
                        <h5 class="mb-3">Well Documented</h5>
                        <p class="features-icon-description">An easy-to-follow doc with lots of references and code
                            examples.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">
                    <div class="col-md-6 col-lg-5 col-xl-3">
                        <div class="mb-3 pb-1">
                            <span class="badge bg-label-primary">Real Customers Reviews</span>
                        </div>
                        <h3 class="mb-1"><span class="section-title">What people say</span></h3>
                        <p class="mb-3 mb-md-5">
                            See what our customers have to<br class="d-none d-xl-block"/>
                            say about their experience.
                        </p>
                        <div class="landing-reviews-btns">
                            <button
                                id="reviews-previous-btn"
                                class="btn btn-label-primary reviews-btn me-3 scaleX-n1-rtl"
                                type="button">
                                <i class="ti ti-chevron-left ti-sm"></i>
                            </button>
                            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl"
                                    type="button">
                                <i class="ti ti-chevron-right ti-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-xl-9">
                        <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper" id="swiper-reviews">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img
                                                        src="{{asset('assets/img/front-pages/branding/logo-1.png')}}"
                                                        alt="client logo"
                                                        class="client-logo img-fluid"/>
                                                </div>
                                                <p>
                                                    “E-Commerce is hands down the most useful front end Bootstrap theme I've
                                                    ever used. I can't wait
                                                    to use it again for my next project.”
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar"
                                                             class="rounded-circle"/>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Cecilia Payne</h6>
                                                        <p class="small text-muted mb-0">CEO of Airbnb</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img
                                                        src="{{asset('assets/img/front-pages/branding/logo-2.png')}}"
                                                        alt="client logo"
                                                        class="client-logo img-fluid"/>
                                                </div>
                                                <p>
                                                    “I've never used a theme as versatile and flexible as E-Commerce. It's my
                                                    go to for building
                                                    dashboard sites on almost any project.”
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="{{asset('assets/img/avatars/2.png')}}" alt="Avatar"
                                                             class="rounded-circle"/>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Eugenia Moore</h6>
                                                        <p class="small text-muted mb-0">Founder of Hubspot</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img
                                                        src="{{asset('assets/img/front-pages/branding/logo-3.png')}}"
                                                        alt="client logo"
                                                        class="client-logo img-fluid"/>
                                                </div>
                                                <p>
                                                    This template is really clean & well documented. The docs are really
                                                    easy to understand and
                                                    it's always easy to find a screenshot from their website.
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="{{asset('assets/img/avatars/3.png')}}" alt="Avatar"
                                                             class="rounded-circle"/>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Curtis Fletcher</h6>
                                                        <p class="small text-muted mb-0">Design Lead at Dribbble</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img
                                                        src="{{asset('assets/img/front-pages/branding/logo-4.png')}}"
                                                        alt="client logo"
                                                        class="client-logo img-fluid"/>
                                                </div>
                                                <p>
                                                    All the requirements for developers have been taken into
                                                    consideration, so I’m able to build
                                                    any interface I want.
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star ti-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="{{asset('assets/img/avatars/4.png')}}" alt="Avatar"
                                                             class="rounded-circle"/>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Sara Smith</h6>
                                                        <p class="small text-muted mb-0">Founder of Continental</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img
                                                        src="{{asset('assets/img/front-pages/branding/logo-5.png')}}"
                                                        alt="client logo"
                                                        class="client-logo img-fluid"/>
                                                </div>
                                                <p>
                                                    “I've never used a theme as versatile and flexible as E-Commerce. It's my
                                                    go to for building
                                                    dashboard sites on almost any project.”
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar"
                                                             class="rounded-circle"/>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Eugenia Moore</h6>
                                                        <p class="small text-muted mb-0">Founder of Hubspot</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img
                                                        src="{{asset('assets/img/front-pages/branding/logo-6.png')}}"
                                                        alt="client logo"
                                                        class="client-logo img-fluid"/>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nemo
                                                    mollitia, ad eum
                                                    officia numquam nostrum repellendus consequuntur!
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star-filled ti-sm"></i>
                                                    <i class="ti ti-star ti-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar"
                                                             class="rounded-circle"/>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Sara Smith</h6>
                                                        <p class="small text-muted mb-0">Founder of Continental</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- What people say slider: End -->
            <hr class="m-0"/>
            <!-- Logo slider: Start -->
            <div class="container">
                <div class="swiper-logo-carousel py-4 my-lg-2">
                    <div class="swiper" id="swiper-clients-logos">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img
                                    src="{{asset('assets/img/front-pages/branding/logo_1-light.png')}}"
                                    alt="client logo"
                                    class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_1-light.png"
                                    data-app-dark-img="front-pages/branding/logo_1-dark.png"/>
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="{{asset('assets/img/front-pages/branding/logo_2-light.png')}}"
                                    alt="client logo"
                                    class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_2-light.png"
                                    data-app-dark-img="front-pages/branding/logo_2-dark.png"/>
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="{{asset('assets/img/front-pages/branding/logo_3-light.png')}}"
                                    alt="client logo"
                                    class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_3-light.png"
                                    data-app-dark-img="front-pages/branding/logo_3-dark.png"/>
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="{{asset('assets/img/front-pages/branding/logo_4-light.png')}}"
                                    alt="client logo"
                                    class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_4-light.png"
                                    data-app-dark-img="front-pages/branding/logo_4-dark.png"/>
                            </div>
                            <div class="swiper-slide">
                                <img
                                    src="{{asset('assets/img/front-pages/branding/logo_5-light.png')}}"
                                    alt="client logo"
                                    class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_5-light.png"
                                    data-app-dark-img="front-pages/branding/logo_5-dark.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Logo slider: End -->
        </section>
        <!-- Real customers reviews: End -->

        <!-- Fun facts: Start -->
        <section id="landingFunFacts" class="section-py landing-fun-facts">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop"
                                     class="mb-2"/>
                                <h5 class="h2 mb-1">7.1k+</h5>
                                <p class="fw-medium mb-0">
                                    Support Tickets<br/>
                                    Resolved
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/front-pages/icons/user-success.png')}}" alt="laptop"
                                     class="mb-2"/>
                                <h5 class="h2 mb-1">50k+</h5>
                                <p class="fw-medium mb-0">
                                    Join creatives<br/>
                                    community
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/front-pages/icons/diamond-info.png')}}" alt="laptop"
                                     class="mb-2"/>
                                <h5 class="h2 mb-1">4.8/5</h5>
                                <p class="fw-medium mb-0">
                                    Highly Rated<br/>
                                    Products
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-warning shadow-none">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop"
                                     class="mb-2"/>
                                <h5 class="h2 mb-1">100%</h5>
                                <p class="fw-medium mb-0">
                                    Money Back<br/>
                                    Guarantee
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fun facts: End -->

        <!-- FAQ: Start -->
        <section id="landingFAQ" class="section-py bg-body landing-faq">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">FAQ</span>
                </div>
                <h3 class="text-center mb-1">Frequently asked <span class="section-title">questions</span></h3>
                <p class="text-center mb-5 pb-3">Browse through these FAQs to find answers to commonly asked
                    questions.</p>
                <div class="row gy-5">
                    <div class="col-lg-5">
                        <div class="text-center">
                            <img
                                src="{{asset('assets/img/front-pages/landing-page/faq-boy-with-logos.png')}}"
                                alt="faq boy with logos"
                                class="faq-image"/>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button
                                        type="button"
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#accordionFour"
                                        aria-expanded="false"
                                        aria-controls="accordionFour">
                                        What is extended license?
                                    </button>
                                </h2>
                                <div
                                    id="accordionFour"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis et aliquid
                                        quaerat possimus maxime!
                                        Mollitia reprehenderit neque repellat deleniti delectus architecto dolorum
                                        maxime, blanditiis
                                        earum ea, incidunt quam possimus cumque.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button
                                        type="button"
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#accordionFive"
                                        aria-expanded="false"
                                        aria-controls="accordionFive">
                                        Which license is applicable for SASS application?
                                    </button>
                                </h2>
                                <div
                                    id="accordionFive"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestias
                                        exercitationem ab cum
                                        nemo facere voluptates veritatis quia, eveniet veniam at et repudiandae mollitia
                                        ipsam quasi
                                        labore enim architecto non!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ: End -->

        <!-- CTA: Start -->
        <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
            <div class="container">
                <div class="row align-items-center gy-5 gy-lg-0">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h6 class="h2 text-primary fw-bold mb-1">Ready to Get Started?</h6>
                        <p class="fw-medium mb-4">Start to become our partner!</p>
                        <a href="javascript:void(0)" class="btn btn-lg btn-primary">Get Started</a>
                    </div>
                    <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                        <img
                            src="{{asset('assets/img/front-pages/landing-page/cta-dashboard.png')}}"
                            alt="cta dashboard" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA: End -->

        <!-- Contact Us: Start -->
        <section id="landingContact" class="section-py bg-body landing-contact">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Contact US</span>
                </div>
                <h3 class="text-center mb-1"><span class="section-title">Let's work</span> together</h3>
                <p class="text-center mb-4 mb-lg-5 pb-md-3">Any question or remark? just write us a message</p>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="contact-img-box position-relative border p-2 h-100">
                            <img
                                src="{{asset('assets/img/front-pages/landing-page/contact-customer-service.png')}}"
                                alt="contact customer service"
                                class="contact-img w-100 scaleX-n1-rtl"/>
                            <div class="pt-3 px-4 pb-1">
                                <div class="row gy-3 gx-md-4">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-primary rounded p-2 me-2"><i
                                                    class="ti ti-mail ti-sm"></i></div>
                                            <div>
                                                <p class="mb-0">Email</p>
                                                <h5 class="mb-0">
                                                    <a href="mailto:example@gmail.com" class="text-heading">example@gmail.com</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-success rounded p-2 me-2">
                                                <i class="ti ti-phone-call ti-sm"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Phone</p>
                                                <h5 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+62
                                                        821 6000 8000</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-1">Send a message</h4>
                                <p class="mb-4">
                                    If you would like to discuss anything related to payment, account, partnerships,
                                    <br class="d-none d-lg-block"/>
                                    or have pre-sales questions, you’re at the right place.
                                </p>

                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-fullname">Full Name</label>
                                            <input type="text" class="form-control" id="contact-form-fullname"
                                                   placeholder="john"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-email">Email</label>
                                            <input
                                                type="text"
                                                id="contact-form-email"
                                                class="form-control"
                                                placeholder="johndoe@gmail.com"/>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="contact-form-message">Message</label>
                                            <textarea
                                                id="contact-form-message"
                                                class="form-control"
                                                rows="8"
                                                placeholder="Write a message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Send inquiry</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us: End -->
    </div>
    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
        <div class="footer-top">
            <div class="container">
                <div class="row gx-0 gy-4 g-md-5">
                    <div class="col-lg-6">
                        <a href="landing-page.html" class="app-brand-link mb-4">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                        fill="#7367F0"/>
                                    <path
                                        opacity="0.06"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                        fill="#161616"/>
                                    <path
                                        opacity="0.06"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                        fill="#161616"/>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                        fill="#7367F0"/>
                                </svg>
                            </span>
                            <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">E-Commerce</span>
                        </a>

                        <p class="footer-text footer-logo-description mb-4">
                            Most developer friendly & highly customisable Admin Dashboard Template.
                        </p>
                        <form class="footer-form">
                            <label for="footer-email" class="small">Subscribe to newsletter</label>
                            <div class="d-flex mt-1">
                                <input
                                    type="email"
                                    class="form-control rounded-0 rounded-start-bottom rounded-start-top"
                                    id="footer-email"
                                    placeholder="Your email"/>
                                <button
                                    type="submit"
                                    class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <h6 class="footer-title mb-4">Pages</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="pricing-page.html" class="footer-link">Pricing</a>
                            </li>
                            <li class="mb-3">
                                <a href="payment-page.html" class="footer-link"
                                >Payment<span class="badge rounded bg-primary ms-2">New</span></a
                                >
                            </li>
                            <li class="mb-3">
                                <a href="checkout-page.html" class="footer-link">Checkout</a>
                            </li>
                            <li class="mb-3">
                                <a href="help-center-landing.html" class="footer-link">Help Center</a>
                            </li>
                            <li class="mb-3">
                                <a href="../vertical-menu-template/auth-login-cover.html" target="_blank"
                                   class="footer-link"
                                >Login/Register</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div
                class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-text">©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                    </span>
                    <a href="javascript:void(0);" target="_blank"
                       class="fw-medium text-white footer-link">Kampoeng Toga,</a>
                    <span class="footer-text"> All Right reserved.</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->
@endsection
