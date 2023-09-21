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
                    <div class="blog-list-wrapper infinite-article">
                        <!-- Blog List Items -->
                        @include('content.customers.blogs._partials.items')
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
