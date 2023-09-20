@extends('layouts/layoutMaster')

@section('title',  trans('global.create') . " " . trans('cruds.offer.title'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/admin/offer-create.js')}}"></script>
@endsection

@section('content')

    <!-- Modern -->
    <div class="col-12">
        <h5>{{ trans('global.create') }} {{ trans('cruds.offer.title_singular') }}</h5>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route("admin.offers.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="offer_details-repeater form-repeater-container mb-3">
                    <div data-repeater-list="offer_details">
                        <div data-repeater-item>
                            <div class="row">
                                <div class="mb-3 col-10">
                                    <label class="required" for="supply_id">{{ trans('cruds.offerDetail.fields.supply') }}</label>
                                    <select class="form-control select2 {{ $errors->has('supply') ? 'is-invalid' : '' }}" name="supply_id" id="supply_id" required>
                                        @foreach($supplies as $supply)
                                            <option value="{{ $supply->id }}" {{ old('supply_id') == $supply->id ? 'selected' : '' }}>{{ $supply->product->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('supply'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('supply') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.offerDetail.fields.supply_helper') }}</span>
                                </div>
                                <div class="mb-3 col-2">
                                    <label class="required" for="quantity">{{ trans('cruds.offerDetail.fields.quantity') }}</label>
                                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                                    @if($errors->has('quantity'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('quantity') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.offerDetail.fields.quantity_helper') }}</span>
                                </div>
                                <div class="mb-3 col-5">
                                    <label class="required" for="price_offer">{{ trans('cruds.offerDetail.fields.price_offer') }}</label>
                                    <input class="form-control {{ $errors->has('price_offer') ? 'is-invalid' : '' }}" type="number" name="price_offer" id="price_offer" value="{{ old('price_offer', '') }}" step="0.01" required>
                                    @if($errors->has('price_offer'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price_offer') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.offerDetail.fields.price_offer_helper') }}</span>
                                </div>
                                <div class="mb-3 col-5">
                                    <label class="required" for="price_deal">{{ trans('cruds.offerDetail.fields.price_deal') }}</label>
                                    <input disabled class="form-control {{ $errors->has('price_deal') ? 'is-invalid' : '' }}" type="number" name="price_deal" id="price_deal" value="{{ old('price_deal', '') }}" step="0.01" required>
                                    @if($errors->has('price_deal'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price_deal') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.offerDetail.fields.price_deal_helper') }}</span>
                                </div>

                                <div class="mb-3 col-2 d-flex align-items-center">
                                    <a class="w-100 btn btn-label-danger text-danger mt-4" data-repeater-delete>
                                        <i class="ti ti-x ti-xs me-1"></i>
                                        <span class="align-middle">Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-0">
                        <a class="btn btn-sm text-white btn-primary" data-repeater-create>
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">Add</span>
                        </a>
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary float-end" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
