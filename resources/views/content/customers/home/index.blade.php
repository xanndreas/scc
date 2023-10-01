@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')

    <!-- Sections:Start -->
    <div class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHero" class="section-py landing-hero position-relative"
                data-background="{{ $page_settings ? ($page_settings->home_cover ? $page_settings->home_cover->getUrl() : '') : '' }}">
                <div class="container">
                    <div class="hero-text-box text-center">
                        <h1 class="text-black hero-title display-6">SUPPLY CHAIN CENTER TOGA</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1 text-white">
                            Yuk jaga imun kamu dengan produk kami (toga, jamu herbal dan variannya).  <br class="d-none d-lg-block" />
                            Raih kesempatan juga untuk bermitra sebagai supplier disini. 
                        </h2>
                        <div class="landing-hero-btn d-inline-block position-relative mb-3">
                            {{-- <span class="hero-btn-item position-absolute d-none d-md-flex text-white">Jelajahi Produk
                                <img src="{{ asset('assets/img/front-pages/icons/Join-community-arrow.png') }}"
                                    alt="Join community arrow" class="scaleX-n1-rtl" />
                            </span>
                            <a href="{{ route('customers.marketplaces.index') }}" class="btn btn-primary btn-lg">Jelajahi
                                Produk</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero: End -->

        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <img width="64" height="64"
                        src="{{ $page_settings ? ($page_settings->home_logo_main ? $page_settings->home_logo_main->getUrl() : asset('assets/img/front-pages/icons/check-warning.png')) : '' }}" />
                </div>
                <h3 class="text-center mb-1">
                    <span class="section-title">SUPPLY CHAIN </span> CENTER TOGA SOLUTIONS
                </h3>
                <p class="text-center mb-3 mb-md-5 pb-3">
                    Solusi tepercaya untuk memenuhi kebutuhan anda serta berkomitmen untuk mewujudkan potensi usaha Anda.
                </p>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img width="64" height="64"
                                src="{{ $page_settings ? ($page_settings->home_logo_one ? $page_settings->home_logo_one->getUrl() : asset('assets/img/front-pages/icons/check-warning.png')) : '' }}"
                                alt="laptop charging" />
                        </div>
                        <h5 class="mb-3">{{ $page_settings->home_logo_one_info ?? '' }}</h5>
                        <p class="features-icon-description">
                            {{ $page_settings->home_logo_one_description ?? '' }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img width="64" height="64"
                                src="{{ $page_settings ? ($page_settings->home_logo_two ? $page_settings->home_logo_two->getUrl() : asset('assets/img/front-pages/icons/check-warning.png')) : '' }}"
                                alt="laptop charging" />
                        </div>
                        <h5 class="mb-3">{{ $page_settings->home_logo_two_info ?? '' }}</h5>
                        <p class="features-icon-description">
                            {{ $page_settings->home_logo_two_description ?? '' }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img width="64" height="64"
                                src="{{ $page_settings ? ($page_settings->home_logo_three ? $page_settings->home_logo_three->getUrl() : asset('assets/img/front-pages/icons/check-warning.png')) : '' }}"
                                alt="laptop charging" />
                        </div>
                        <h5 class="mb-3">{{ $page_settings->home_logo_three_info ?? '' }}</h5>
                        <p class="features-icon-description">
                            {{ $page_settings->home_logo_three_description ?? '' }}
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        <section class="section-py bg-body landing-products pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">
                    <div class="col-md-6 col-lg-5 col-xl-3">
                        <h3 class="mb-1"><span class="section-title">Produk Terbaru</span></h3>
                        <p class="mb-3 mb-md-5">
                            Ini produk baru kami dari<br class="d-none d-xl-block" />
                            supplier.
                        </p>
                        <div class="landing-products-btns">
                            <button id="products-previous-btn" class="btn btn-label-primary products-btn me-3 scaleX-n1-rtl"
                                type="button">
                                <i class="ti ti-chevron-left ti-sm"></i>
                            </button>
                            <button id="products-next-btn" class="btn btn-label-primary products-btn scaleX-n1-rtl"
                                type="button">
                                <i class="ti ti-chevron-right ti-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-xl-9">
                        <div class="swiper-products-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper" id="swiper-products">
                                <div class="swiper-wrapper">
                                    @foreach ($newProducts as $newProduct)
                                        <div class="swiper-slide">
                                            <div class="card h-100">
                                                <div class="item-img text-center">
                                                    @if ($newProduct->featured_image->count() !== 0)
                                                        <a
                                                            href="{{ route('customers.marketplaces.show', ['slug' => $newProduct->slug]) }}">
                                                            <img class="img-fluid card-img-top"
                                                                src="{{ $newProduct->featured_image->first()->getUrl() }}"
                                                                alt="img-placeholder" />
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ route('customers.marketplaces.show', ['slug' => $newProduct->slug]) }}">
                                                            <img class="img-fluid card-img-top"
                                                                src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                                                                alt="img-placeholder" />
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <div class="item-wrapper">
                                                        <div>
                                                            <h6 class="item-price text-primary">
                                                                IDR {{ $newProduct->price_sell }}</h6>
                                                        </div>
                                                    </div>
                                                    <h6 class="item-name">
                                                        <a class="text-body"
                                                            href="#">{{ substr($newProduct->name, 0, 30) }}
                                                            .. </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next d-none"></div>
                                <div class="swiper-button-prev d-none"></div>
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
                                <img src="{{ asset('assets/img/front-pages/icons/laptop.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">3k+</h5>
                                <p class="fw-medium mb-0">
                                    Total supplier<br />
                                    Offers
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/user-success.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">1k+</h5>
                                <p class="fw-medium mb-0">
                                    Join success<br />
                                    supplier
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/diamond-info.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">5/5</h5>
                                <p class="fw-medium mb-0">
                                    Highly Rated<br />
                                    Products
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-warning shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/check-warning.png') }}" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">100%</h5>
                                <p class="fw-medium mb-0">
                                    Safe online<br />
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
                            <img src="{{ asset('assets/img/front-pages/landing-page/faq-boy-with-logos.png') }}"
                                alt="faq boy with logos" class="faq-image" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionFour" aria-expanded="false"
                                        aria-controls="accordionFour">
                                        Lorem ipsum dolor sit amet?
                                    </button>
                                </h2>
                                <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
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
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionFive" aria-expanded="false"
                                        aria-controls="accordionFive">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit?
                                    </button>
                                </h2>
                                <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
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
