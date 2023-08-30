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
                           target="_blank"><span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span
                            ><span class="d-none d-md-block">Sign in</span></a>
                    </li>
                    <li>
                        <button type="button" class="btn text-nowrap d-inline-block">
                            <span class="tf-icons ti ti-shopping-cart"></span>
                            <span class="position-absolute top-0 start-80 badge-notifications translate-middle badge rounded-pill bg-danger">10</span>
                        </button>
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

    <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
        <!-- New Product Slider -->
        <div class="container">
            <div class="row align-items-center gx-0 gy-4 g-lg-5">
                <h2 class="mb-1"><span class="section-title">New Product</span></h2>
                <div class="col-12">
                    <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                        <div class="swiper" id="swiper-reviews">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card" style="width: 20rem;">
                                        <div class="card-body text-body d-flex flex-column justify-content-between">
                                            <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                                 class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="m-0">Detail product.</p>
                                                <p class="badge bg-label-info">Rp.xxxxxx</p>
                                                <div class="d-flex justify-content-startd-flex justify-content-start">
                                                    <input class="form-control w-50 me-2" type="number" value="1"
                                                           id=""/>
                                                    <a href="#" class="btn btn-primary me-2">
                                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <div class="landing-reviews-btns m-3">
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
                </div>

            </div>
        </div>
        <!-- What people say slider: End -->
    </section>
    <!-- Real customers reviews: End -->

    <!-- E-commerce Search Bar Starts -->
    {{--    >--}}
    <!-- E-commerce Search Bar Ends -->

    <!-- E-commerce Products Starts -->
    <section id="ecommerce-products" class="section-py pb-5 grid-view">
        <!-- New Product Slider -->
        <div class="container">
            <div class="text-center mb-3 pb-1">
                <span class="badge bg-label-primary">Products</span>
            </div>

            <h3 class="text-center mb-1">All <span class="section-title">Products</span></h3>
            <p class="text-center mb-5 pb-3">Check this out.</p>
            <div class="container">
                <div class="row gy-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-body d-flex flex-column justify-content-between">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="m-0">Detail product.</p>
                                    <p class="badge bg-label-info">Rp.xxxxxx</p>
                                    <br>
                                    <div class="d-flex justify-content-startd-flex justify-content-start">
                                        <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                        <a href="#" class="btn btn-primary me-2">
                                            <i class="ti ti-shopping-cart ti-sm"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailProduct">
                                            Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- E-commerce Products Ends -->

{{--    Modal Detail product--}}
    <div class="modal fade" id="detailProduct" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Product Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="card mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="card-img card-img-left img-fluid w-100" src="{{asset('assets/img/front-pages/misc/2.jpg')}}" alt="Card image" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Detail Product</h5>
                                            <p class="card-text">
                                                This is a wider card with supporting text below as a natural lead-in to additional content. This content
                                                is a
                                                little bit longer.
                                            </p>
                                            <p class="badge bg-label-info">Rp.xxxxxx</p>
                                            <br>
                                            <div class="d-flex justify-content-startd-flex justify-content-start">
                                                <input class="form-control w-50 me-2" type="number" value="1" id=""/>
                                                <a href="#" class="btn btn-primary me-2">
                                                    <i class="ti ti-shopping-cart ti-sm"></i>
                                                </a>
                                            </div>
                                            <p class="card-text"><small class="text-muted">Another Detail</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
