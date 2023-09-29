@extends('layouts/layoutMaster')

@section('title', 'Contact')

@section('content')

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHero" class="section-py landing-cover position-relative">
                <div class="container">
                    <div class="hero-text-box text-center">
                        <h1 class="text-primary hero-title display-6 fw-bold">Hubungi Kami</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1">
                            Untuk detail lebih lanjut atau pertanyaan bisnis <br class="d-none d-lg-block"/>
                            anda dapat hubungi kami.
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero: End -->

        <!-- Contact Us: Start -->
        <section id="landingContact" class="section-py bg-body landing-contact">
            <div class="container">
                <h3 class="text-center mb-1"><span class="section-title">Mari bekerja</span> bersama</h3>
                <p class="text-center mb-4 mb-lg-5 pb-md-3">Ada pertanyaan atau komentar? cukup tulis pesan kepada kami</p>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="contact-img-box position-relative border p-2 h-100">
                            <img
                                src="{{asset('assets/img/front-pages/landing-page/contact-customer-service.png')}}"
                                alt="contact customer service"
                                class="contact-img w-100 scaleX-n1-rtl"/>
                            <div class="pt-3 px-4 pb-1">
                                <div class="row gy-3 gx-md-4">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-primary rounded p-2 me-2"><i
                                                    class="ti ti-mail ti-sm"></i></div>
                                            <div>
                                                <p class="mb-0">Email</p>
                                                <h5 class="mb-0">
                                                    <a href="mailto:example@gmail.com" class="text-heading">example@gmail.com</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-success rounded p-2 me-2">
                                                <i class="ti ti-phone-call ti-sm"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Phone</p>
                                                <h5 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+62
                                                        821 6000 8000</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-1">Kirim kami pertanyaan.</h4>
                                <p class="mb-4">
                                    Jika Anda ingin mendiskusikan apa pun yang berkaitan dengan pembayaran, akun, kemitraan,
                                    <br class="d-none d-lg-block"/>
                                    atau memiliki pertanyaan pra-penjualan, Anda berada di tempat yang tepat.
                                </p>

                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-fullname">Full Name</label>
                                            <input type="text" class="form-control" id="contact-form-fullname"
                                                   placeholder="john"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-email">Email</label>
                                            <input
                                                type="text"
                                                id="contact-form-email"
                                                class="form-control"
                                                placeholder="johndoe@gmail.com"/>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="contact-form-message">Message</label>
                                            <textarea
                                                id="contact-form-message"
                                                class="form-control"
                                                rows="8"
                                                placeholder="Write a message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Send inquiry</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us: End -->
    </div>
    <!-- / Sections:End -->

@endsection
