@extends('layouts/layoutMaster')

@section('title', 'Supplies')


@section('content')

    <!-- Hero: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-cover position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Suplai</h1>
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
            <h3 class="text-center mb-1">Semua
                <span class="section-title">Produk Dibutuhkan</span>
            </h3>
            <p class="text-center mb-3 pb-2">Lihat dan Jadilah Suplier.</p>

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
                                        id="supply-search"
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

                <div class="row mt-5 d-none supply-end-of-content" data-end="0">
                    <div class="col-12">
                        <div class="text-center">
                            <span>End of Contents</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 d-none supply-spinner">
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
