@extends('layouts/layoutMaster')

@section('title', 'Shop')


@section('content')

    <!-- Hero: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative"
             data-background="{{ asset('assets/img/scc/2.png') }}">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">
                        <br class="d-none d-lg-block"/>
                    </h1>
                    <h2 class="hero-sub-title h6 mb-4 pb-1">
                        <br class="d-none d-lg-block"/>
                        <br class="d-none d-lg-block"/>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero: End -->


    <section class="ecommerce-application mb-5">
        <div class="container mt-5">
            <!-- E-commerce Content Section Starts -->
            <h1 class="text-center mb-1">Produk
                <span class="section-title">Unggulan</span>
            </h1>
            <p class="text-center mb-3 pb-2">Lihat dan Jelajahi.</p>

            <div class="row">
                <div class="col-sm-12">

                    <!-- E-commerce Search Bar Starts -->
                    <div id="ecommerce-searchbar" class="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <input
                                        type="text"
                                        class="form-control search-product"
                                        id="marketplace-search"
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

                <div class="row mt-5 d-none marketplace-end-of-content" data-end="0">
                    <div class="col-12">
                        <div class="text-center">
                            <span>End of Contents</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 d-none marketplace-spinner">
                    <div class="col-12">
                        <div class="text-center">
                            <div class="spinner-border spinner-border-lg text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- E-commerce Content Section Starts -->
        </div>
    </section>

@endsection
