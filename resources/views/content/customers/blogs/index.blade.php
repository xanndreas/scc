@extends('layouts/layoutMaster')

@section('title', 'Blogs')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css/pages/page-blog.css') }}"/>
@endsection

@section('content')

    <!-- Hero: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Blogs</h1>
                    <h2 class="hero-sub-title h6 mb-4 pb-1">
                        Lorem Ipsum has been the industry's standard dummy text ever<br class="d-none d-lg-block"/>
                        since the 1500s.
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero: End -->

    <!-- Blog List -->
    <section class="">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog-list-wrapper">
                        <!-- Blog List Items -->
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <a href="{{ asset('page/blog/detail') }}">
                                        <img class="card-img-top img-fluid"
                                             src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                             alt="Blog Post pic"/>
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{ asset('page/blog/detail') }}"
                                               class="blog-title-truncate text-body-heading"
                                            >The Best Features Coming to iOS and Web design</a
                                            >
                                        </h4>
                                        <div class="d-flex">
                                            <div class="author-info">
                                                <small class="text-muted me-25">by</small>
                                                <small><a href="#" class="text-body">Ghani Pradita</a></small>
                                                <span class="text-muted ms-50 me-25">|</span>
                                                <small class="text-muted">Jan 10, 2020</small>
                                            </div>
                                        </div>
                                        <div class="my-1 py-25">
                                            <a href="#">
                                                <span class="badge rounded-pill badge-light-info me-50">Quote</span>
                                            </a>
                                            <a href="#">
                                                <span class="badge rounded-pill badge-light-primary">Fashion</span>
                                            </a>
                                        </div>
                                        <p class="card-text blog-content-truncate">
                                            Donut fruitcake soufflé apple pie candy canes jujubes croissant chocolate bar ice
                                            cream.
                                        </p>
                                        <hr/>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ asset('page/blog/detail#blogComment') }}">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="message-square" class="font-medium-1 text-body me-50"></i>
                                                    <span class="text-body fw-bold">76 Comments</span>
                                                </div>
                                            </a>
                                            <a href="{{ asset('page/blog/detail') }}" class="fw-bold">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Blog List Items -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-md-3">
                    @include('content.customers.blogs._partials.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--/ Blog List -->

@endsection
