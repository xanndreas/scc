@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

@php
    $configData = Helper::appClasses();

    /* Display elements */
    $customizerHidden = ($customizerHidden ?? '');
@endphp

@extends('layouts/commonMaster' )

@section('vendor-style')
    <!-- Vendor css files -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">

    <script src="{{asset('assets/js/front-config.js')}}"></script>
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce-details.css') }}">
@endsection


@section('vendor-script')
    <!-- Vendor js files -->
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('assets/js/app-ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/front-main.js')}}"></script>
    <script src="{{ asset('assets/js/front-page-landing.js')}}"></script>

    <script src="{{ asset('assets/vendor/libs/jscroll/jquery.jscroll.min.js')}}"></script>
    <script src="{{ asset('assets/js/customer/marketplace-index.js')}}"></script>
    <script src="{{ asset('assets/js/customer/supply-index.js')}}"></script>
    <script src="{{ asset('assets/js/customer/cas-transaction.js')}}"></script>
    <script src="{{ asset('assets/js/customer/article-index.js')}}"></script>
@endsection

@section('layoutContent')

    <div class="layout-navbar-fixed">
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

                        <a href="{{ route('customers.home') }}" class="app-brand-link">

                        <span class="app-brand-logo demo">
                            @php($height = 20)
                            @include('_partials.macros', compact('height'))
                        </span>
                            <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">Scc </span>
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
                                <a class="nav-link fw-medium"
                                   href="{{ route('customers.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium"
                                   href="{{ route('customers.marketplaces.index') }}">Marketplace</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium"
                                   href="{{ route('customers.supplies.index') }}">Supplies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium"
                                   href="{{ route('customers.blogs.index') }}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium"
                                   href="{{ route('customers.contacts') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="landing-menu-overlay d-lg-none"></div>
                    <!-- Menu wrapper: End -->
                    <!-- Toolbar: Start -->
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Style Switcher -->
                        <li class="nav-item dropdown-style-switcher dropdown me-xl-0">
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
                                        <span class="align-middle"><i
                                                class="ti ti-device-desktop me-2"></i>System</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- / Style Switcher-->

                        <!-- navbar button: Start -->
                        @if(!\Illuminate\Support\Facades\Auth::check())
                            <li>
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span>
                                    <span class="d-none d-md-block">Sign in</span>
                                </a>
                            </li>
                        @else
                            @can('admin_page_access')
                                <li>
                                    <a href="{{ route('admin.home') }}" class="btn btn-primary">
                                        <span class="tf-icons ti ti-smart-home scaleX-n1-rtl me-md-1"></span>
                                        <span class="d-none d-md-block">Dashboard</span>
                                    </a>
                                </li>
                            @endcan

                            @cannot('admin_page_access')
                                <li class="nav-item">
                                    <a class="btn text-nowrap d-inline-block" href="{{ route('customers.cas.cart') }}">
                                        <span class="tf-icons ti ti-shopping-cart"></span>
                                        <span
                                            class="position-absolute top-0 start-80 badge-notifications translate-middle badge rounded-pill bg-danger">0</span>
                                    </a>
                                </li>
                            @endcannot
                        @endif
                        <!-- navbar button: End -->
                    </ul>
                    <!-- Toolbar: End -->
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar: End -->

    <!-- Content -->
    @yield('content')
    <!--/ Content -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
        <div class="footer-top">
            <div class="container">
                <div class="row gx-0 gy-4 g-md-5">
                    <div class="col-lg-4">
                        <a href="landing-page.html" class="app-brand-link mb-4">
                            @include('_partials.macros', compact('height'))

                            <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">Scc</span>
                        </a>

                        <p class="footer-text footer-logo-description mb-4">
                            Most trusted e-commerce on Kampoeng Toga, how we can reach you?
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

                    <div class="col-lg-2">
                        <h6 class="footer-title mb-4">Pages</h6>
                        <ul class="list-unstyled">

                            <li class="mb-3">
                                <a href="{{ route('customers.marketplaces.index') }}"
                                   class="footer-link">Marketplace</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('customers.supplies.index') }}"
                                   class="footer-link">Supplies</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('customers.blogs.index') }}"
                                   class="footer-link">Blogs</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('customers.contacts') }}"
                                   class="footer-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="footer-title mb-4">Blogs</h6>
                        <ul class="list-unstyled">
                            @foreach($recent_blog_footers as $recent_blog_footer)
                                <li class="mb-3">
                                    <a href="{{ route('customers.blogs.show', ['slug' =>$recent_blog_footer->slug]) }}"
                                       class="footer-link">{{ substr($recent_blog_footer->title, 0, 100) }}</a>
                                </li>
                            @endforeach
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
