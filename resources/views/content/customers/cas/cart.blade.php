@extends('layouts/layoutMaster')

@section('title', 'Member Area')

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

    <section id="ecommerce-checkout">
        <div class="ecommerce-application container mt-5 " style="margin-bottom: 200px;">
            <div class="col-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link active"
                               aria-controls="navs-pills-left-cart"
                               aria-selected="true">
                                My Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.cas.transaction-history') }}" class="nav-link"
                               aria-controls="navs-pills-left-transaction"
                               aria-selected="false">
                                Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.cas.profile') }}" class="nav-link"
                               aria-controls="navs-pills-left-profile"
                               aria-selected="false">
                                Profile
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="navs-pills-left-cart" role="tabpanel">
                            <div id="place-order" class="list-view product-checkout">
                                <!-- Checkout Place Order Left starts -->
                                <div style="width: auto; height: 500px; overflow: auto;" data-scrollbar>
                                    @foreach($cart as $item)
                                        <div class="checkout-items mb-3 ms-2 me-3">
                                            <div class="card ecommerce-card shadow-sm mb-3">
                                                <div class="item-img">
                                                    @if($item->product->featured_image->count() !== 0)
                                                        <a href="{{ route('customers.marketplaces.show', ['slug' => $item->product->slug ]) }}">
                                                            <img
                                                                src="{{$item->product->featured_image->first()->getUrl()}}"
                                                                alt="img-placeholder"
                                                            />
                                                        </a>
                                                    @else
                                                        <a href="{{ route('customers.marketplaces.show', ['slug' => $item->product->slug ]) }}">
                                                            <img
                                                                src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                                                                alt="img-placeholder"
                                                            />
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <div class="item-name">
                                                        <h6 class="mb-0"><a
                                                                href="{{ route('customers.marketplaces.show', ['slug' => $item->product->slug ]) }}"
                                                                class="text-body"> {{$item->product->name}}</a></h6>
                                                        <span class="item-company">In
                                                            <a href="javascript:void(0);"
                                                               class="company-name">{{ $item->product->category->name }} </a>
                                                        </span>
                                                    </div>
                                                    @if($item->stocks < 0)
                                                        <span class="text-danger mb-1">Out Of Stock</span>
                                                    @else
                                                        <span class="text-success mb-1">In Stock</span>
                                                    @endif
                                                </div>
                                                <div class="item-options text-center">
                                                    <div class="item-wrapper">
                                                        <div class="item-cost">
                                                            <h4 class="item-price">
                                                                IDR {{ $item->product->price_sell }}</h4>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-label-danger mt-1">
                                                        <i data-feather="x" class="align-middle me-25"></i>
                                                        <span>Remove</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Checkout Place Order Left ends -->

                                <!-- Checkout Place Order Right starts -->
                                <div class="checkout-options mt-sm-2 mt-lg-0">
                                    <div class="card shadow-none">
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
                                                        <div class="detail-title">Subtotal</div>
                                                        <div class="detail-amt">IDR {{ $cartDetail['subtotal'] }}</div>
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
                                                        <div class="detail-amt fw-bolder">
                                                            IDR {{ $cartDetail['grand_total'] }}</div>
                                                    </li>
                                                </ul>

                                                <form method="post" id="checkout-form"
                                                      action="{{ route('customers.marketplaces.checkout') }}"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                </form>

                                                <a class="btn btn-primary w-100 btn-next text-white place-order"
                                                   href="javascript:void(0);"
                                                   onclick="if (confirm('Are you sure checkout your cart?')){
                                                       document.getElementById('checkout-form').submit() }
                                                       else{event.stopPropagation(); event.preventDefault();}">

                                                    Place Order
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout Place Order Right ends -->
                                </div>
                            </div>
                            <!-- Checkout Place order Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
