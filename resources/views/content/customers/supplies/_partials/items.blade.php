@foreach($supplies as $supply)
    <div class="card ecommerce-card mb-3">
        <div class="item-img text-center">
            @if($supply->product->featured_image->count() !== 0)
                <a href="javascript:void(0);" class="supply-detail-show" data-supply-id="{{ $supply->id }}">
                    <img
                        class="img-fluid card-img-top"
                        src="{{$supply->product->featured_image->first()->getUrl()}}"
                        alt="img-placeholder"
                    />
                </a>
            @else
                <a href="javascript:void(0);" class="supply-detail-show" data-supply-id="{{ $supply->id }}">
                    <img
                        class="img-fluid card-img-top"
                        src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                        alt="img-placeholder"
                    />
                </a>
            @endif
        </div>
        <div class="card-body">
            <div class="item-wrapper">
                <div class="item-rating">
                    <ul class="unstyled-list list-inline">
                        <li class="ratings-list-item"><i data-feather="star"
                                                         class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star"
                                                         class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star"
                                                         class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star"
                                                         class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star"
                                                         class="filled-star"></i></li>
                    </ul>
                </div>
                <div>
                    <h6 class="item-price">IDR {{  $supply->product->price_sell }}</h6>
                </div>
            </div>
            <h6 class="item-name">
                <a class="text-body" href="#">{{ $supply->product->name }}</a>
            </h6>
            <p class="card-text item-description">
                {{ $supply->product->description }}
            </p>
        </div>
        <div class="item-options text-center">
            <div class="item-wrapper">
                <div class="item-cost">
                    <h4 class="item-price">{{ $supply->selling_price }}</h4>
                </div>
            </div>
            <a href="{{ route('admin.offers.index') }}" class="btn btn-primary btn-supply">
                <i data-feather="shopping-cart"></i>
                <span class="add-to-cart">Suplai</span>
            </a>
        </div>
    </div>
@endforeach
