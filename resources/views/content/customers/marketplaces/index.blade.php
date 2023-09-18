@extends('layouts/layoutMaster')

@section('title', 'Shop')


@section('content')

    <!-- Hero: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Marketplace</h1>
                    <h2 class="hero-sub-title h6 mb-4 pb-1">
                        Lorem Ipsum has been the industry's standard dummy text ever<br class="d-none d-lg-block"/>
                        since the 1500s.
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero: End -->

    <section class="section-py bg-body landing-products pb-0">
        <!-- What people say slider: Start -->
        <div class="container">
            <div class="row align-items-center gx-0 gy-4 g-lg-5">
                <div class="col-md-6 col-lg-5 col-xl-3">
                    <h3 class="mb-1"><span class="section-title">New Products</span></h3>
                    <p class="mb-3 mb-md-5">
                        Here our new product from<br class="d-none d-xl-block"/>
                        supplier.
                    </p>
                    <div class="landing-products-btns">
                        <button
                            id="products-previous-btn"
                            class="btn btn-label-primary products-btn me-3 scaleX-n1-rtl"
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
                                                <span class="card-text item-company">By <a href="#"
                                                                                           class="company-name">Apple</a></span>
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
                                                <span class="card-text item-company">By <a href="#"
                                                                                           class="company-name">Apple</a></span>
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
                                                <span class="card-text item-company">By <a href="#"
                                                                                           class="company-name">Apple</a></span>
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
                                                <span class="card-text item-company">By <a href="#"
                                                                                           class="company-name">Apple</a></span>
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
                                                <span class="card-text item-company">By <a href="#"
                                                                                           class="company-name">Apple</a></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
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

    <section class="ecommerce-application mb-5">
        <div class="container mt-5">
            <!-- E-commerce Content Section Starts -->
            <h3 class="text-center mb-1">All
                <span class="section-title">Products</span>
            </h3>
            <p class="text-center mb-3 pb-2">Check this out.</p>

            <div class="row">
                <div class="col-sm-12">
                    <div id="ecommerce-header">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <button class="navbar-toggler shop-sidebar-toggler" type="button"
                                        data-bs-toggle="collapse">
                                    <span class="navbar-toggler-icon d-block d-lg-none"><i
                                            data-feather="menu"></i></span>
                                </button>
                                <div class="search-results">16285 results found</div>
                            </div>
                        </div>
                    </div>

                    <!-- E-commerce Search Bar Starts -->
                    <div id="ecommerce-searchbar" class="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <input
                                        type="text"
                                        class="form-control search-product"
                                        id="shop-search"
                                        placeholder="Search Product"
                                        aria-label="Search..."
                                        aria-describedby="shop-search"
                                    />
                                    <span class="input-group-text"><i data-feather="search"
                                                                      class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- E-commerce Search Bar Ends -->

                    <!-- E-commerce Products Starts -->
                    <div id="ecommerce-products" class="grid-view infinite-products">
                        @include('content.customers.marketplaces._partials.items')
                    </div>
                    <!-- E-commerce Products Ends -->
                </div>
            </div>
            <!-- E-commerce Content Section Starts -->
        </div>
    </section>

@endsection
