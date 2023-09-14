@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stockOpname.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stock-opnames.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="notes">{{ trans('cruds.stockOpname.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', '') }}">
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockOpname.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.stockOpname.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockOpname.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.stockOpname.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockOpname.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.stockOpname.fields.types') }}</label>
                <select class="form-control {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types" id="types" required>
                    <option value disabled {{ old('types', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StockOpname::TYPES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('types', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockOpname.fields.types_helper') }}</span>
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