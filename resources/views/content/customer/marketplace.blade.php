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
                        <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">Vuexy</span>
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

    <!-- E-commerce Search Bar Starts -->
    <section id="ecommerce-searchbar" class="ecommerce-searchbar">
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
                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                </div>
            </div>
        </div>
    </section>
    <!-- E-commerce Search Bar Ends -->

    <!-- E-commerce Products Starts -->
    <section id="ecommerce-products" class="grid-view">
        <div class="card ecommerce-card">
            <div class="item-img text-center">
                <a href="{{url('app/ecommerce/details')}}">
                    <img
                        class="img-fluid card-img-top"
                        src="{{asset('images/pages/eCommerce/1.png')}}"
                        alt="img-placeholder"
                    /></a>
            </div>
            <div class="card-body">
                <div class="item-wrapper">
                    <div class="item-rating">
                        <ul class="unstyled-list list-inline">
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="item-price">$339.99</h6>
                    </div>
                </div>
                <h6 class="item-name">
                    <a class="text-body" href="{{url('app/ecommerce/details')}}">Apple Watch Series 5</a>
                    <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                </h6>
                <p class="card-text item-description">
                    On Retina display that never sleeps, so it’s easy to see the time and other important information, without
                    raising or tapping the display. New location features, from a built-in compass to current elevation, help users
                    better navigate their day, while international emergency calling1 allows customers to call emergency services
                    directly from Apple Watch in over 150 countries, even without iPhone nearby. Apple Watch Series 5 is available
                    in a wider range of materials, including aluminium, stainless steel, ceramic and an all-new titanium.
                </p>
            </div>
            <div class="item-options text-center">
                <div class="item-wrapper">
                    <div class="item-cost">
                        <h4 class="item-price">$339.99</h4>
                    </div>
                </div>
                <a href="#" class="btn btn-light btn-wishlist">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
                <a href="#" class="btn btn-primary btn-cart">
                    <i data-feather="shopping-cart"></i>
                    <span class="add-to-cart">Add to cart</span>
                </a>
            </div>
        </div>
    </section>
    <!-- E-commerce Products Ends -->


@endsection
