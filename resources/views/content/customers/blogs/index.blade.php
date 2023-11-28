@extends('layouts/layoutMaster')

@section('title', 'Blogs')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css/pages/page-blog.css') }}"/>
@endsection

@section('content')

    <!-- Hero: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative"
             data-background="{{ asset('assets/img/scc/4.png') }}">
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

    <!-- Blog List -->
    <section>
        <div class="container mt-5 mb-5">
            <div class="row mb-5">
                <div class="col-lg-5">
                    <div class="contact-img-box position-relative border p-2 h-100">
                        <img
                            src="{{asset('assets/img/front-pages/landing-page/contact-customer-service.png')}}"
                            alt="contact customer service"
                            class="contact-img w-100 scaleX-n1-rtl"/>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <p class="mb-4">
                                Supply Chain Center Toga ini dikembangkan oleh para mahasiswa yang tergabung dalam tim
                                PPK
                                Ormawa HIMA Teknik Industri UNIM di bawah bimbingan Dr. Erly Ekayanti Rosyida, ST,
                                MT serta arahan dari Bapak kepala Desa Kebontunggul Bpk. Siandi, SE, MM pada tahun 2023
                                dibawah support pendanaan DIKTI melalui program PPK Ormawa tahun 2023.
                            </p>
                            <p class="mb-4">
                                Tujuan dari dikembangkannya Supply Chain Center Toga ini adalah untuk memudahkan
                                masyarakat Desa
                                kebontunggul khususnya dan seluruh penghasil Toga dalam proses supply toga yang telah
                                dihasilkannya serta memberikan kemudahan para customer toga dan produk olahannya untuk
                                melakukan pemesanan dengan harga yang bersahabat. Selain itu, diharapkan Supply Chain
                                Center
                                Toga ini bisa memberikan kemudahan para petani ataupun industry kecil pengolah toga
                                untuk meraih
                                kesuksesan secara berkelanjutan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row ">
                <h1 class="text-primary mb-5">Article</h1>
                <div class="col-lg-9 col-md-12">
                    <div class="blog-list-wrapper e">
                        <div class="row infinite-article d-flex">
                            <!-- Blog List Items -->
                            @include('content.customers.blogs._partials.items')
                            <!--/ Blog List Items -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-md-3">
                    @include('content.customers.blogs._partials.sidebar')
                </div>
            </div>

            <div class="row mt-5 d-none article-end-of-content" data-end="0">
                <div class="col-12">
                    <div class="text-center">
                        <span>End of Contents</span>
                    </div>
                </div>
            </div>

            <div class="row mt-5 d-none article-spinner">
                <div class="col-12">
                    <div class="text-center">
                        <div class="spinner-border spinner-border-lg text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Blog List -->

@endsection
