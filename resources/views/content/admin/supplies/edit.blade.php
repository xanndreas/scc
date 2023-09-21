@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.supply.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supplies.update", [$supply->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="required" for="quantity_needs">{{ trans('cruds.supply.fields.quantity_needs') }}</label>
                <input class="form-control {{ $errors->has('quantity_needs') ? 'is-invalid' : '' }}" type="number" name="quantity_needs" id="quantity_needs" value="{{ old('quantity_needs', $supply->quantity_needs) }}" step="1" required>
                @if($errors->has('quantity_needs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity_needs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supply.fields.quantity_needs_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="initial_price">{{ trans('cruds.supply.fields.initial_price') }}</label>
                <input class="form-control {{ $errors->has('initial_price') ? 'is-invalid' : '' }}" type="number" name="initial_price" id="initial_price" value="{{ old('initial_price', $supply->initial_price) }}" step="0.01" required>
                @if($errors->has('initial_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('initial_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supply.fields.initial_price_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="product_id">{{ trans('cruds.supply.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $supply->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supply.fields.product_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="start_date">{{ trans('cruds.supply.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $supply->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supply.fields.start_date_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="end_date">{{ trans('cruds.supply.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $supply->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supply.fields.end_date_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required">{{ trans('cruds.supply.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Supply::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $supply->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supply.fields.status_helper') }}</span>
            </div>
            <div class="mb-3">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
