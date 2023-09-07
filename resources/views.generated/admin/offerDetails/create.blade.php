@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.offerDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offer-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.offerDetail.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerDetail.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_offer">{{ trans('cruds.offerDetail.fields.price_offer') }}</label>
                <input class="form-control {{ $errors->has('price_offer') ? 'is-invalid' : '' }}" type="number" name="price_offer" id="price_offer" value="{{ old('price_offer', '') }}" step="0.01" required>
                @if($errors->has('price_offer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_offer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerDetail.fields.price_offer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_deal">{{ trans('cruds.offerDetail.fields.price_deal') }}</label>
                <input class="form-control {{ $errors->has('price_deal') ? 'is-invalid' : '' }}" type="number" name="price_deal" id="price_deal" value="{{ old('price_deal', '') }}" step="0.01" required>
                @if($errors->has('price_deal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_deal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerDetail.fields.price_deal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="supply_id">{{ trans('cruds.offerDetail.fields.supply') }}</label>
                <select class="form-control select2 {{ $errors->has('supply') ? 'is-invalid' : '' }}" name="supply_id" id="supply_id" required>
                    @foreach($supplies as $id => $entry)
                        <option value="{{ $id }}" {{ old('supply_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supply'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supply') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offerDetail.fields.supply_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection