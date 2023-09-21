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
                <!-- Blog -->
                <div class="col-9 mt-md-3">
                    <div class="card">
                        @if($article->featured_image->count() !== 0)
                            <img
                                class="img-fluid card-img-top"
                                src="{{$article->featured_image->first()->getUrl()}}"
                                alt="img-placeholder"
                            />
                        @else
                            <img
                                class="img-fluid card-img-top"
                                src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                                alt="img-placeholder"
                            />
                        @endif

                        <div class="card-body">
                            <h4 class="card-title">{{ $article->title }}</h4>
                            <div class="d-flex">
                                <div class="author-info">
                                    <small class="text-muted me-25">In</small>
                                    <small><a href="#" class="text-body">{{ $article->categories->first() ? $article->categories->first()->name : '' }}</a></small>
                                    <span class="text-muted ms-50 me-25">|</span>
                                    <small class="text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->diffForHumans() }}</small>
                                </div>
                            </div>
                            <div class="my-1 py-25">
                                @foreach($article->categories as $category)
                                    <a href="javascript:void(0);">
                                        <span class="badge rounded-pill bg-label-primary me-50">{{ $category->name }}</span>
                                    </a>
                                @endforeach

                            </div>
                            <p class="card-text mb-2">
                                {!! $article->page_text !!}
                            </p>

                        </div>
                    </div>
                </div>
                <!--/ Blog -->

                <div class="col-lg-3 col-md-12 mt-md-3">
                    @include('content.customers.blogs._partials.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--/ Blog List -->

@endsection
