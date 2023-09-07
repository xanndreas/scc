@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchasing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchasings.update", [$purchasing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="batch_code">{{ trans('cruds.purchasing.fields.batch_code') }}</label>
                <input class="form-control {{ $errors->has('batch_code') ? 'is-invalid' : '' }}" type="text" name="batch_code" id="batch_code" value="{{ old('batch_code', $purchasing->batch_code) }}" required>
                @if($errors->has('batch_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('batch_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.batch_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grand_total">{{ trans('cruds.purchasing.fields.grand_total') }}</label>
                <input class="form-control {{ $errors->has('grand_total') ? 'is-invalid' : '' }}" type="number" name="grand_total" id="grand_total" value="{{ old('grand_total', $purchasing->grand_total) }}" step="0.01" required>
                @if($errors->has('grand_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grand_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.grand_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.purchasing.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', $purchasing->notes) }}">
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rounding_cost">{{ trans('cruds.purchasing.fields.rounding_cost') }}</label>
                <input class="form-control {{ $errors->has('rounding_cost') ? 'is-invalid' : '' }}" type="number" name="rounding_cost" id="rounding_cost" value="{{ old('rounding_cost', $purchasing->rounding_cost) }}" step="0.01">
                @if($errors->has('rounding_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rounding_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.rounding_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_cost">{{ trans('cruds.purchasing.fields.additional_cost') }}</label>
                <input class="form-control {{ $errors->has('additional_cost') ? 'is-invalid' : '' }}" type="number" name="additional_cost" id="additional_cost" value="{{ old('additional_cost', $purchasing->additional_cost) }}" step="0.01">
                @if($errors->has('additional_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('additional_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.additional_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_discounts">{{ trans('cruds.purchasing.fields.price_discounts') }}</label>
                <input class="form-control {{ $errors->has('price_discounts') ? 'is-invalid' : '' }}" type="number" name="price_discounts" id="price_discounts" value="{{ old('price_discounts', $purchasing->price_discounts) }}" step="0.01">
                @if($errors->has('price_discounts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_discounts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.price_discounts_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="supplier_id">{{ trans('cruds.purchasing.fields.supplier') }}</label>
                <select class="form-control select2 {{ $errors->has('supplier') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id" required>
                    @foreach($suppliers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('supplier_id') ? old('supplier_id') : $purchasing->supplier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.purchasing.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Purchasing::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $purchasing->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="purchasing_details">{{ trans('cruds.purchasing.fields.purchasing_detail') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('purchasing_details') ? 'is-invalid' : '' }}" name="purchasing_details[]" id="purchasing_details" multiple required>
                    @foreach($purchasing_details as $id => $purchasing_detail)
                        <option value="{{ $id }}" {{ (in_array($id, old('purchasing_details', [])) || $purchasing->purchasing_details->contains($id)) ? 'selected' : '' }}>{{ $purchasing_detail }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchasing_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchasing_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.purchasing_detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="purchasing_transaction_number">{{ trans('cruds.purchasing.fields.purchasing_transaction_number') }}</label>
                <input class="form-control {{ $errors->has('purchasing_transaction_number') ? 'is-invalid' : '' }}" type="text" name="purchasing_transaction_number" id="purchasing_transaction_number" value="{{ old('purchasing_transaction_number', $purchasing->purchasing_transaction_number) }}" required>
                @if($errors->has('purchasing_transaction_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchasing_transaction_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasing.fields.purchasing_transaction_number_helper') }}</span>
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