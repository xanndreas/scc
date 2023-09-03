@extends('layouts/layoutMaster')

@section('title', 'Checkout')

@section('vendor-style')
    <!-- Vendor css files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css')}}"/>

    <script src="{{asset('assets/js/front-config.js')}}"></script>
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce.css') }}">

@endsection

@section('vendor-script')
    <!-- Vendor js files -->
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('assets/js/app-ecommerce-checkout.js') }}"></script>
    <script src="{{ asset('assets/js/front-main.js')}}"></script>
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
                    <!-- navbar button: End -->
                </ul>
                <!-- Toolbar: End -->
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->

    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Checkout</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="ecommerce-checkout">
        <div class="ecommerce-application container mt-5 " style="margin-bottom: 200px;">

            <div id="place-order" class="list-view product-checkout">
                <!-- Checkout Place Order Left starts -->
                <div class="checkout-items">
                    <div class="card ecommerce-card">
                        <div class="item-img">
                            <a href="{{url('app/ecommerce/details')}}">
                                <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                     alt="img-placeholder"/>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-name">
                                <h6 class="mb-0"><a href="{{url('app/ecommerce/details')}}"
                                                    class="text-body">Apple
                                        Watch Series 5</a></h6>
                                <span class="item-company">By <a href="#"
                                                                 class="company-name">Apple</a></span>
                            </div>
                            <span class="text-success mb-1">In Stock</span>
                            {{--                                        <div class="item-quantity">--}}
                            {{--                                            <span class="quantity-title">Qty:</span>--}}
                            {{--                                            <div class="quantity-counter-wrapper">--}}
                            {{--                                                <div class="input-group">--}}
                            {{--                                                    <input type="text" class="form-control quantity-counter" value="1"/>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">$19.99</h4>
                                    <p class="card-text shipping">
                                                <span
                                                    class="badge rounded-pill badge-light-success">Free Shipping</span>
                                    </p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-label-danger mt-1">
                                <i data-feather="x" class="align-middle me-25"></i>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Checkout Place Order Left ends -->

                <!-- Checkout Place Order Right starts -->
                <div class="checkout-options">
                    <div class="card">
                        <div class="card-body">
                            <label class="section-label form-label mb-1">Options</label>
                            <div class="coupons input-group input-group-merge">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Coupons"
                                    aria-label="Coupons"
                                    aria-describedby="input-coupons"
                                />
                                <span class="input-group-text text-primary ps-1"
                                      id="input-coupons">Apply</span>
                            </div>
                            <hr/>
                            <div class="price-details">
                                <h6 class="price-title">Price Details</h6>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title">Total MRP</div>
                                        <div class="detail-amt">$598</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Bag Discount</div>
                                        <div class="detail-amt discount-amt text-success">-25$</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Estimated Tax</div>
                                        <div class="detail-amt">$1.3</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">EMI Eligibility</div>
                                        <a href="#" class="detail-amt text-primary">Details</a>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Delivery Charges</div>
                                        <div class="detail-amt discount-amt text-success">Free</div>
                                    </li>
                                </ul>
                                <hr/>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title detail-total">Total</div>
                                        <div class="detail-amt fw-bolder">$574</div>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-primary w-100 btn-next place-order">
                                    Place
                                    Order
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Place Order Right ends -->
                </div>
            </div>
            <!-- Checkout Place order Ends -->
        </div>
    </section>

    <footer class="landing-footer bg-body footer-text mt-5">
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

@endsection
