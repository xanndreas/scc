@extends('layouts/layoutMaster')

@section('title', 'Product Details')


@section('content')

    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-cover position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">{{ substr($product->name, 0, 40) }} ..</h1>
                    <h2 class="hero-sub-title h6 mb-4 pb-1">
                        Lorem Ipsum has been the industry's standard dummy text ever<br class="d-none d-lg-block"/>
                        since the 1500s.
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <!-- app e-commerce details start -->
    <section class="ecommerce-application">
        <div class="container mt-5 mb-5">
            <div class="app-ecommerce-details">
                <!-- Product Details starts -->
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">

                            @if($product->featured_image->count() !== 0)
                                <img
                                    class="img-fluid product-img"
                                    src="{{$product->featured_image->first()->getUrl()}}"
                                    alt="img-placeholder"
                                />
                            @else
                                <img
                                    class="img-fluid product-img"
                                    src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                                    alt="img-placeholder"
                                />
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>{{ $product->name }}</h4>
                        <span class="card-text item-company">
                            <a href="#" class="company-name">
                                {{ $product->category ? $product->category->name : '' }}
                            </a>
                        </span>

                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price me-1">IDR {{ $product->price_sell }}</h4>
                            <ul class="unstyled-list list-inline ps-1 border-start">
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i>
                                </li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i>
                                </li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i>
                                </li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i>
                                </li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i>
                                </li>
                            </ul>
                        </div>
                        <p class="card-text">@if($product->stocks > 0)
                                <span class="text-success">In stock</span>
                            @else
                                <span class="text-danger">Out of stock</span>
                            @endif
                        </p>
                        <p class="card-text">
                            {!! $product->description !!}
                        </p>

                        <hr/>
                        <div class="d-flex flex-column flex-sm-row pt-1 infinite-products">
                            @if($product->stocks > 0)
                                <a href="#" class="btn btn-label-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0"
                                   data-product-id="{{ $product->id }}">
                                    <i data-feather="shopping-cart" class="me-50"></i>
                                    <span class="add-to-cart">Add to cart</span>
                                </a>
                            @else
                                <button disabled href="#" class="btn btn-label-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0"
                                   data-product-id="{{ $product->id }}">
                                    <i data-feather="shopping-cart" class="me-50"></i>
                                    <span class="add-to-cart">Out of stock</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    <!-- Product Details ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- app e-commerce details end -->

    <!-- Item features starts -->
    <section class="item-features section-py bg-body">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="w-75 mx-auto">
                        <i data-feather="award"></i>
                        <h4 class="mt-2 mb-1">100% Original</h4>
                        <p class="card-text">Chocolate bar candy canes ice cream toffee. Croissant pie
                            cookie halvah.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="w-75 mx-auto">
                        <i data-feather="clock"></i>
                        <h4 class="mt-2 mb-1">10 Day Replacement</h4>
                        <p class="card-text">Marshmallow biscuit donut dragée fruitcake. Jujubes wafer
                            cupcake.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="w-75 mx-auto">
                        <i data-feather="shield"></i>
                        <h4 class="mt-2 mb-1">1 Year Warranty</h4>
                        <p class="card-text">Cotton candy gingerbread cake I love sugar plum I love sweet
                            croissant.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
