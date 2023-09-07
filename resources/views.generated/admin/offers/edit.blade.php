@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.offer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offers.update", [$offer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="supplier_id">{{ trans('cruds.offer.fields.supplier') }}</label>
                <select class="form-control select2 {{ $errors->has('supplier') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id" required>
                    @foreach($suppliers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('supplier_id') ? old('supplier_id') : $offer->supplier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.offer.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Offer::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $offer->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grand_total">{{ trans('cruds.offer.fields.grand_total') }}</label>
                <input class="form-control {{ $errors->has('grand_total') ? 'is-invalid' : '' }}" type="number" name="grand_total" id="grand_total" value="{{ old('grand_total', $offer->grand_total) }}" step="0.01" required>
                @if($errors->has('grand_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grand_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.grand_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="offer_details">{{ trans('cruds.offer.fields.offer_detail') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('offer_details') ? 'is-invalid' : '' }}" name="offer_details[]" id="offer_details" multiple required>
                    @foreach($offer_details as $id => $offer_detail)
                        <option value="{{ $id }}" {{ (in_array($id, old('offer_details', [])) || $offer->offer_details->contains($id)) ? 'selected' : '' }}>{{ $offer_detail }}</option>
                    @endforeach
                </select>
                @if($errors->has('offer_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offer_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.offer_detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="offering_expired_date">{{ trans('cruds.offer.fields.offering_expired_date') }}</label>
                <input class="form-control date {{ $errors->has('offering_expired_date') ? 'is-invalid' : '' }}" type="text" name="offering_expired_date" id="offering_expired_date" value="{{ old('offering_expired_date', $offer->offering_expired_date) }}" required>
                @if($errors->has('offering_expired_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offering_expired_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.offering_expired_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="offering_number">{{ trans('cruds.offer.fields.offering_number') }}</label>
                <input class="form-control {{ $errors->has('offering_number') ? 'is-invalid' : '' }}" type="text" name="offering_number" id="offering_number" value="{{ old('offering_number', $offer->offering_number) }}" required>
                @if($errors->has('offering_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('offering_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.offer.fields.offering_number_helper') }}</span>
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