@extends('layouts/layoutMaster')

@section('title', 'Member Area')

@section('content')

    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-cover position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Keranjang</h1>
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
                                Keranjang Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.cas.transaction-history') }}" class="nav-link"
                               aria-controls="navs-pills-left-transaction"
                               aria-selected="false">
                                Transaksi
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="navs-pills-left-cart" role="tabpanel">
                            <div id="place-order" class="list-view product-checkout">
                                <!-- Checkout Place Order Left starts -->
                                <div style="width: auto; height: 500px; overflow: auto;" data-scrollbar>
                                    @if($cartCount == 0)
                                        <div class="checkout-items mb-3 ms-2 me-3">
                                            <div class="card shadow-none mb-3">
                                                <div class="card-body">
                                                    <h6> Keranjang Kosong </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @foreach($cart as $index => $item)
                                        <div class="checkout-items mb-3 ms-2 me-3">
                                            <div class="card ecommerce-card shadow-sm mb-3">
                                                <div class="item-img">
                                                    @if($item['item']->featured_image->count() !== 0)
                                                        <a href="{{ route('customers.marketplaces.show', ['slug' => $item['item']->slug ]) }}">
                                                            <img
                                                                src="{{$item['item']->featured_image->first()->getUrl()}}"
                                                                alt="img-placeholder"
                                                            />
                                                        </a>
                                                    @else
                                                        <a href="{{ route('customers.marketplaces.show', ['slug' => $item['item']->slug ]) }}">
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
                                                                href="{{ route('customers.marketplaces.show', ['slug' => $item['item']->slug ]) }}"
                                                                class="text-body"> {{$item['item']->name}}</a></h6>
                                                        <span class="item-company">In
                                                            <a href="javascript:void(0);"
                                                               class="company-name">{{ $item['item']->category->name }} </a>
                                                        </span>
                                                    </div>
                                                    @if($item['item']->stocks < 0)
                                                        <span class="text-danger mb-1">Stok Habis</span>
                                                    @else
                                                        <span class="text-success mb-1">Stok Tersedia</span>
                                                    @endif
                                                </div>
                                                <div class="item-options text-center">
                                                    <div class="item-wrapper">
                                                        <div class="item-cost">
                                                            <h4 class="item-price">
                                                                IDR {{ $item['item']->price_sell }}</h4>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mt-3">
                                                        <input disabled class="form-control text-center" value="{{ $item['qty'] }}"/>
                                                    </div>

                                                    <a class="btn btn-label-danger mt-3" onclick="event.preventDefault(); document.getElementById('remove-cart-{{$item['item']->id}}').submit();">
                                                        <span class="text-danger">Remove</span>
                                                    </a>

                                                    <form method="POST" id="remove-cart-{{$item['item']->id}}" action="{{ route('customers.cas.cart-remove', ['product' => $item['item']->id]) }}">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Checkout Place Order Left ends -->

                                <!-- Checkout Place Order Right starts -->
                                @if($cartCount != 0)
                                <div class="checkout-options mt-sm-2 mt-lg-0">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <label class="section-label form-label mb-1">Opsi</label>
                                            <div class="coupons input-group input-group-merge">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Coupons"
                                                    aria-label="Coupons"
                                                    aria-describedby="input-coupons"
                                                />
                                                <span class="input-group-text text-primary ps-1"
                                                      id="input-coupons">Terapkan</span>
                                            </div>
                                            <hr/>
                                            <div class="price-details">
                                                <h6 class="price-title">Harga Detail</h6>
                                                <ul class="list-unstyled">
                                                    <li class="price-detail">
                                                        <div class="detail-title">Subtotal</div>
                                                        <div class="detail-amt">IDR {{ $cartDetail['subtotal'] }}</div>
                                                    </li>
                                                    <li class="price-detail">
                                                        <div class="detail-title">Pengiriman</div>
                                                        <div class="detail-amt discount-amt text-success">Gratis</div>
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

                                                    Order
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout Place Order Right ends -->
                                </div>
                                @endif
                            </div>
                            <!-- Checkout Place order Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
