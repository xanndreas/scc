@extends('layouts/layoutMaster')

@section('title', 'Checkout')

@section('content')

    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Account</h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="col-xl-6">
            <h6 class="text-muted">Vertical</h6>
            <div class="nav-align-left mb-4">
                <ul class="nav nav-pills me-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-home" aria-controls="navs-pills-left-home" aria-selected="false" tabindex="-1">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-profile" aria-controls="navs-pills-left-profile" aria-selected="false" tabindex="-1">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-left-messages" aria-controls="navs-pills-left-messages" aria-selected="true">Messages</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="navs-pills-left-home" role="tabpanel">
                        <p>
                            Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
                            claw
                            candy topping.
                        </p>
                        <p class="mb-0">
                            Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
                            jelly-o ice
                            cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-left-profile" role="tabpanel">
                        <p>
                            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
                            halvah
                            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
                        </p>
                        <p class="mb-0">
                            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
                            liquorice caramels.
                        </p>
                    </div>
                    <div class="tab-pane fade active show" id="navs-pills-left-messages" role="tabpanel">
                        <p>
                            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                            bears
                            cake chocolate.
                        </p>
                        <p class="mb-0">
                            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                            sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                            jelly.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ecommerce-checkout">
        <div class="ecommerce-application container mt-5 " style="margin-bottom: 200px;">

            <div id="place-order" class="list-view product-checkout">
                <!-- Checkout Place Order Left starts -->
                <div style="width: auto; height: 500px; overflow: auto;" data-scrollbar>
                    <div class="checkout-items mb-3">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="{{url('app/ecommerce/details')}}">
                                    <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                         alt="img-placeholder"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="{{url('app/ecommerce/details')}}"
                                                        class="text-body">Apple
                                            Watch Series 5</a></h6>
                                    <span class="item-company">By <a href="#"
                                                                     class="company-name">Apple</a></span>
                                </div>
                                <span class="text-success mb-1">In Stock</span>
                                {{--                                        <div class="item-quantity">--}}
                                {{--                                            <span class="quantity-title">Qty:</span>--}}
                                {{--                                            <div class="quantity-counter-wrapper">--}}
                                {{--                                                <div class="input-group">--}}
                                {{--                                                    <input type="text" class="form-control quantity-counter" value="1"/>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">$19.99</h4>
                                        <p class="card-text shipping">
                                                <span
                                                    class="badge rounded-pill badge-light-success">Free Shipping</span>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-label-danger mt-1">
                                    <i data-feather="x" class="align-middle me-25"></i>
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-items mb-3">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="{{url('app/ecommerce/details')}}">
                                    <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                         alt="img-placeholder"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="{{url('app/ecommerce/details')}}"
                                                        class="text-body">Apple
                                            Watch Series 5</a></h6>
                                    <span class="item-company">By <a href="#"
                                                                     class="company-name">Apple</a></span>
                                </div>
                                <span class="text-success mb-1">In Stock</span>
                                {{--                                        <div class="item-quantity">--}}
                                {{--                                            <span class="quantity-title">Qty:</span>--}}
                                {{--                                            <div class="quantity-counter-wrapper">--}}
                                {{--                                                <div class="input-group">--}}
                                {{--                                                    <input type="text" class="form-control quantity-counter" value="1"/>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">$19.99</h4>
                                        <p class="card-text shipping">
                                                <span
                                                    class="badge rounded-pill badge-light-success">Free Shipping</span>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-label-danger mt-1">
                                    <i data-feather="x" class="align-middle me-25"></i>
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-items mb-3">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="{{url('app/ecommerce/details')}}">
                                    <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                         alt="img-placeholder"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="{{url('app/ecommerce/details')}}"
                                                        class="text-body">Apple
                                            Watch Series 5</a></h6>
                                    <span class="item-company">By <a href="#"
                                                                     class="company-name">Apple</a></span>
                                </div>
                                <span class="text-success mb-1">In Stock</span>
                                {{--                                        <div class="item-quantity">--}}
                                {{--                                            <span class="quantity-title">Qty:</span>--}}
                                {{--                                            <div class="quantity-counter-wrapper">--}}
                                {{--                                                <div class="input-group">--}}
                                {{--                                                    <input type="text" class="form-control quantity-counter" value="1"/>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">$19.99</h4>
                                        <p class="card-text shipping">
                                                <span
                                                    class="badge rounded-pill badge-light-success">Free Shipping</span>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-label-danger mt-1">
                                    <i data-feather="x" class="align-middle me-25"></i>
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-items mb-3">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="{{url('app/ecommerce/details')}}">
                                    <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                         alt="img-placeholder"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="{{url('app/ecommerce/details')}}"
                                                        class="text-body">Apple
                                            Watch Series 5</a></h6>
                                    <span class="item-company">By <a href="#"
                                                                     class="company-name">Apple</a></span>
                                </div>
                                <span class="text-success mb-1">In Stock</span>
                                {{--                                        <div class="item-quantity">--}}
                                {{--                                            <span class="quantity-title">Qty:</span>--}}
                                {{--                                            <div class="quantity-counter-wrapper">--}}
                                {{--                                                <div class="input-group">--}}
                                {{--                                                    <input type="text" class="form-control quantity-counter" value="1"/>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">$19.99</h4>
                                        <p class="card-text shipping">
                                                <span
                                                    class="badge rounded-pill badge-light-success">Free Shipping</span>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-label-danger mt-1">
                                    <i data-feather="x" class="align-middle me-25"></i>
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-items mb-3">
                        <div class="card ecommerce-card">
                            <div class="item-img">
                                <a href="{{url('app/ecommerce/details')}}">
                                    <img src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                                         alt="img-placeholder"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-name">
                                    <h6 class="mb-0"><a href="{{url('app/ecommerce/details')}}"
                                                        class="text-body">Apple
                                            Watch Series 5</a></h6>
                                    <span class="item-company">By <a href="#"
                                                                     class="company-name">Apple</a></span>
                                </div>
                                <span class="text-success mb-1">In Stock</span>
                                {{--                                        <div class="item-quantity">--}}
                                {{--                                            <span class="quantity-title">Qty:</span>--}}
                                {{--                                            <div class="quantity-counter-wrapper">--}}
                                {{--                                                <div class="input-group">--}}
                                {{--                                                    <input type="text" class="form-control quantity-counter" value="1"/>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h4 class="item-price">$19.99</h4>
                                        <p class="card-text shipping">
                                                <span
                                                    class="badge rounded-pill badge-light-success">Free Shipping</span>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-label-danger mt-1">
                                    <i data-feather="x" class="align-middle me-25"></i>
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Checkout Place Order Left ends -->

                <!-- Checkout Place Order Right starts -->
                <div class="checkout-options mt-sm-2 mt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <label class="section-label form-label mb-1">Options</label>
                            <div class="coupons input-group input-group-merge">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Coupons"
                                    aria-label="Coupons"
                                    aria-describedby="input-coupons"
                                />
                                <span class="input-group-text text-primary ps-1"
                                      id="input-coupons">Apply</span>
                            </div>
                            <hr/>
                            <div class="price-details">
                                <h6 class="price-title">Price Details</h6>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title">Total MRP</div>
                                        <div class="detail-amt">$598</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Bag Discount</div>
                                        <div class="detail-amt discount-amt text-success">-25$</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Estimated Tax</div>
                                        <div class="detail-amt">$1.3</div>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">EMI Eligibility</div>
                                        <a href="#" class="detail-amt text-primary">Details</a>
                                    </li>
                                    <li class="price-detail">
                                        <div class="detail-title">Delivery Charges</div>
                                        <div class="detail-amt discount-amt text-success">Free</div>
                                    </li>
                                </ul>
                                <hr/>
                                <ul class="list-unstyled">
                                    <li class="price-detail">
                                        <div class="detail-title detail-total">Total</div>
                                        <div class="detail-amt fw-bolder">$574</div>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-primary w-100 btn-next place-order">
                                    Place
                                    Order
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Place Order Right ends -->
                </div>
            </div>
            <!-- Checkout Place order Ends -->
        </div>
    </section>
@endsection
