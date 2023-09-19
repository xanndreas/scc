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
                <span class="text-success">In stock</span>
            @else
                <span class="text-danger">Out of stock</span>
            @endif
        </p>
        <p class="card-text">
            {!! $supply->product->description !!}
        </p>

        <hr/>
        <div class="d-flex flex-column flex-sm-row pt-1">
            @if($supply->product->stocks > 0)
                <a href="#" class="btn btn-label-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0"
                   data-product-id="{{ $supply->product->id }}">
                    <i data-feather="shopping-cart" class="me-50"></i>
                    <span class="add-to-cart">Add to cart</span>
                </a>
            @else
                <a href="{{ route('admin.offers.index') }}" class="btn btn-label-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                    <span class="add-to-cart">Supply Product</span>
                </a>
            @endif
        </div>
    </div>
    <!-- Product Details ends -->
</div>
