@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

@php
    $configData = Helper::appClasses();

    /* Display elements */
    $customizerHidden = $customizerHidden ?? '';
@endphp

@extends('layouts/commonMaster')

@section('vendor-style')
    <!-- Vendor css files -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">

    <script src="{{ asset('assets/js/front-config.js') }}"></script>
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce-details.css') }}">
@endsection


@section('vendor-script')
    <!-- Vendor js files -->
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('assets/js/app-ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/front-main.js') }}"></script>
    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/jscroll/jquery.jscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/customer/marketplace-index.js') }}"></script>
    <script src="{{ asset('assets/js/customer/supply-index.js') }}"></script>
    <script src="{{ asset('assets/js/customer/cas-transaction.js') }}"></script>
    <script src="{{ asset('assets/js/customer/cas-cart.js') }}"></script>
    <script src="{{ asset('assets/js/customer/article-index.js') }}"></script>
    <script src="{{ asset('assets/js/customer/home-index.js') }}"></script>
@endsection

@section('layoutContent')
    <div class="layout-navbar-fixed">
        <nav class="layout-navbar shadow-none py-0">
            <div class="container">
                <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
                    <!-- Menu logo wrapper: Start -->
                    <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
                        <!-- Mobile menu toggle: Start-->
                        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">

                            <i class="ti ti-menu-2 ti-sm align-middle"></i>
                        </button>
                        <!-- Mobile menu toggle: End-->

                        <a href="{{ route('customers.home') }}" class="app-brand-link">
                            <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">
                                @include('_partials.macros', [($height = 32)])
                            </span>
                        </a>
                    </div>
                    <!-- Menu logo wrapper: End -->

                    <!-- Menu wrapper: Start -->
                    <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                                type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <i class="ti ti-x ti-sm"></i>
                        </button>
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="{{ route('customers.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium"
                                   href="{{ route('customers.marketplaces.index') }}">Produk</a>
                            </li>

                            @if(!auth()->check())
                                <li class="nav-item">
                                    <a class="nav-link fw-medium"
                                       href="{{ route('customers.supplies.index') }}">Supplier / Mitra</a>
                                </li>
                            @endif

                            @can('actor_admin')
                                <li class="nav-item">
                                    <a class="nav-link fw-medium"
                                       href="{{ route('customers.supplies.index') }}">Supplier / Mitra</a>
                                </li>
                            @endcan

                            @can('actor_supplier')
                                <li class="nav-item">
                                    <a class="nav-link fw-medium"
                                       href="{{ route('customers.supplies.index') }}">Supplier / Mitra</a>
                                </li>
                            @endcan

                            @can('actor_user')
                                @cannot('actor_admin')
                                    <li class="nav-item">
                                        <a class="nav-link fw-medium"
                                           href="{{ $page_settings->whatsapp_link ?? 'javascript:void(0);' }}">Supplier / Mitra</a>
                                    </li>
                                @endcan
                            @endcan

                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="{{ route('customers.blogs.index') }}">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-medium" href="{{ route('customers.contacts') }}">Contact</a>
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

                        @if (!\Illuminate\Support\Facades\Auth::check())
                            <li>
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span>
                                    <span class="d-none d-md-block">Sign in</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                   data-bs-toggle="dropdown">
                                    <span class="tf-icons ti ti-user"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('customers.cas.profile') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <span class="avatar-initial rounded-circle bg-label-primary">
                                                            {{ Auth::user() ? substr(Auth::user()->name, 0, 2) : '' }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        @if (Auth::check())
                                                            {{ Auth::user()->name }}
                                                        @else
                                                            John Doe
                                                        @endif
                                                    </span>
                                                    <small class="text-muted">
                                                        @if (Auth::user()->load('roles')->roles)
                                                            {{ Auth::user()->load('roles')->roles->first() ? Auth::user()->load('roles')->roles->first()->title : 'No Roles'}}
                                                        @else
                                                            No Roles
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    @can('admin_page_access')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.home') }}">
                                                <span class="align-middle">Dashboard</span>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('actor_user')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('customers.cas.cart') }}">
                                                <span class="align-middle">Cart</span>
                                            </a>
                                        </li>
                                    @endcan


                                    @if (Auth::check())
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class='ti ti-logout me-2'></i>
                                                <span class="align-middle">Logout</span>
                                            </a>
                                        </li>
                                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    @endif
                                </ul>
                            </li>
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
                        <a href="{{ route('customers.home') }}" class="app-brand-link mb-4">
                            @include('_partials.macros', compact('height'))

                            <span
                                class="app-brand-text demo footer-link fw-bold ms-2 ps-1">Supply Chain Center Toga</span>
                        </a>

                        <p class="footer-text footer-logo-description mb-4">
                            Pusat supply dan distribusi toga dan produk hasil olahan toga
                            (jamu, minuman, makanan, kosmetik, dan produk lainnya) yang berkantor pusat di Desa
                            Kebontunggul Kecamatan Dlanggu Kabupaten Mojokerto.
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <h6 class="footer-title mb-4">Supply Chain Center Toga</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="{{ route('customers.marketplaces.index') }}" class="footer-link">Produk</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('customers.supplies.index') }}" class="footer-link">Supplier/Mitra</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('customers.blogs.index') }}" class="footer-link">Tentang </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('customers.contacts') }}" class="footer-link">Kontak</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <h6 class="footer-title mb-4">Desa Kebontunggul</h6>
                        @foreach($recent_blog_footers as $items)
                            <p class="footer-text footer-logo-description mb-3">
                                <a href="{{ route('customers.blogs.show', ['slug' => $items->slug]) }}"
                                   class="footer-link">
                                    {{ $items->title ?? '' }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div
                class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-text">PPK ORMAWA ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                    <a href="javascript:void(0);" target="_blank" class="fw-medium text-white footer-link">Himaprodi
                        Teknik Industri,</a>
                    <span class="footer-text">Universitas Islam Majapahit.</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->
@endsection
