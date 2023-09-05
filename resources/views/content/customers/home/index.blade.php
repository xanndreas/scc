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

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHero" class="section-py landing-hero position-relative">
                <div class="container">
                    <div class="hero-text-box text-center">
                        <h1 class="text-primary hero-title display-6 fw-bold">Supply Center Kampung Industri Toga</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1">
                            E-commerce make easy, explore our new product <br class="d-none d-lg-block"/>
                            and get many discounts.
                        </h2>
                        <div class="landing-hero-btn d-inline-block position-relative">
                        <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">Explore products
                            <img src="{{asset('assets/img/front-pages/icons/Join-community-arrow.png')}}"
                                 alt="Join community arrow"
                                 class="scaleX-n1-rtl"/>
                        </span>
                            <a href="{{ route('customers.marketplaces.index') }}" class="btn btn-primary btn-lg">Go to Marketplace</a>
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
                    <span class="section-title">Lorem Ipsum is </span> simply dummy text
                </h3>
                <p class="text-center mb-3 mb-md-5 pb-3">
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                </p>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop charging"/>
                        </div>
                        <h5 class="mb-3">Lorem Ipsum</h5>
                        <p class="features-icon-description">
                            is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop charging"/>
                        </div>
                        <h5 class="mb-3">Lorem Ipsum</h5>
                        <p class="features-icon-description">
                            is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{asset('assets/img/front-pages/icons/check-warning.png')}}" alt="laptop charging"/>
                        </div>
                        <h5 class="mb-3">Lorem Ipsum</h5>
                        <p class="features-icon-description">
                            is simply dummy text of the printing and typesetting industry.
                        </p>
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
                            <span class="badge bg-label-primary">New Products</span>
                        </div>
                        <h3 class="mb-1"><span class="section-title">What's new?</span></h3>
                        <p class="mb-3 mb-md-5">
                            See our new product, you <br class="d-none d-xl-block"/>
                            can explore more on Marketplace.
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
                                            <div class="item-img text-center">
                                                <a href="{{url('app/ecommerce/details')}}">
                                                    <img
                                                        class="img-fluid card-img-top"
                                                        src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                        alt="img-placeholder"
                                                    /></a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-wrapper">
                                                    <div>
                                                        <h6 class="item-price text-primary">$339.99</h6>
                                                    </div>
                                                </div>
                                                <h6 class="item-name">
                                                    <a class="text-body" href="#">Apple Watch Series 5</a>
                                                    <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div class="item-img text-center">
                                                <a href="{{url('app/ecommerce/details')}}">
                                                    <img
                                                        class="img-fluid card-img-top"
                                                        src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                        alt="img-placeholder"
                                                    /></a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-wrapper">
                                                    <div>
                                                        <h6 class="item-price text-primary">$339.99</h6>
                                                    </div>
                                                </div>
                                                <h6 class="item-name">
                                                    <a class="text-body" href="#">Apple Watch Series 5</a>
                                                    <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div class="item-img text-center">
                                                <a href="{{url('app/ecommerce/details')}}">
                                                    <img
                                                        class="img-fluid card-img-top"
                                                        src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                        alt="img-placeholder"
                                                    /></a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-wrapper">
                                                    <div>
                                                        <h6 class="item-price text-primary">$339.99</h6>
                                                    </div>
                                                </div>
                                                <h6 class="item-name">
                                                    <a class="text-body" href="#">Apple Watch Series 5</a>
                                                    <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div class="item-img text-center">
                                                <a href="{{url('app/ecommerce/details')}}">
                                                    <img
                                                        class="img-fluid card-img-top"
                                                        src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                        alt="img-placeholder"
                                                    /></a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-wrapper">
                                                    <div>
                                                        <h6 class="item-price text-primary">$339.99</h6>
                                                    </div>
                                                </div>
                                                <h6 class="item-name">
                                                    <a class="text-body" href="#">Apple Watch Series 5</a>
                                                    <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div class="item-img text-center">
                                                <a href="{{url('app/ecommerce/details')}}">
                                                    <img
                                                        class="img-fluid card-img-top"
                                                        src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                        alt="img-placeholder"
                                                    /></a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-wrapper">
                                                    <div>
                                                        <h6 class="item-price text-primary">$339.99</h6>
                                                    </div>
                                                </div>
                                                <h6 class="item-name">
                                                    <a class="text-body" href="#">Apple Watch Series 5</a>
                                                    <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                                                </h6>
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
                                <h5 class="h2 mb-1">3k+</h5>
                                <p class="fw-medium mb-0">
                                    Total supplier<br/>
                                    Offers
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/front-pages/icons/user-success.png')}}" alt="laptop"
                                     class="mb-2"/>
                                <h5 class="h2 mb-1">1k+</h5>
                                <p class="fw-medium mb-0">
                                    Join success<br/>
                                    supplier
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/img/front-pages/icons/diamond-info.png')}}" alt="laptop"
                                     class="mb-2"/>
                                <h5 class="h2 mb-1">5/5</h5>
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
                                    Safe online<br/>
                                    Transaction
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
                                        Lorem ipsum dolor sit amet?
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
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit?
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
    </div>
    <!-- / Sections:End -->

@endsection
