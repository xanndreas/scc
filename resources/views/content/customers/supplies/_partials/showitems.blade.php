<div class="row my-2">
    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
        <div class="d-flex align-items-center justify-content-center">
            @if($supply->product->featured_image->count() !== 0)
                <img
                    class="img-fluid product-img"
                    src="{{$supply->product->featured_image->first()->getUrl()}}"
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
        <h4>
            {{ $supply->product->name }}
        </h4>
        <span class="card-text item-company">
            <a href="#" class="company-name">

                {{ $supply->product->category ? $supply->product->category->name : '' }}
            </a>
        </span>

        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
            <h4 class="item-price me-1">
                IDR {{ $supply->product->price_sell }}
            </h4>
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
        <p class="card-text">@if($supply->product->stocks > 0)
                <span class="text-success">Stok Tersedia</span>
            @else
                <span class="text-danger">Stok Habis</span>
            @endif
        </p>
        <p class="card-text">
            {!! $supply->product->description !!}
        </p>

        <hr/>
        <div class="d-flex flex-column flex-sm-row pt-1">
            <a href="{{ route('admin.offers.index') }}"
               class="btn btn-label-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                <span class="add-to-cart">Suplai</span>
            </a>
        </div>
    </div>
    <!-- Product Details ends -->
</div>
