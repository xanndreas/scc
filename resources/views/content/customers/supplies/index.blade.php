@extends('layouts/layoutMaster')

@section('title', 'Supplies')


@section('content')

    <!-- Hero: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Supplies</h1>
                    <h2 class="hero-sub-title h6 mb-4 pb-1">
                        Lorem Ipsum has been the industry's standard dummy text ever<br class="d-none d-lg-block"/>
                        since the 1500s.
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero: End -->

    <section class="ecommerce-application mb-5">
        <div class="container mt-5">
            <!-- E-commerce Content Section Starts -->
            <h3 class="text-center mb-1">All
                <span class="section-title">Products Needs</span>
            </h3>
            <p class="text-center mb-3 pb-2">Check this out.</p>

            <div class="row">
                <div class="col-sm-12">
                    <div id="ecommerce-header">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <button class="navbar-toggler shop-sidebar-toggler" type="button" data-bs-toggle="collapse">
                                    <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                                </button>
                                <div class="search-results">0 results found</div>
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
                                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- E-commerce Search Bar Ends -->

                    <!-- E-commerce Products Starts -->
                    <div id="ecommerce-products" class="grid-view infinite-supplies">
                        @include('content.customers.supplies._partials.items')
                        @include('content.customers.supplies._partials.show')
                    </div>
                    <!-- E-commerce Products Ends -->

                </div>
            </div>
            <!-- E-commerce Content Section Starts -->
        </div>
    </section>

@endsection
