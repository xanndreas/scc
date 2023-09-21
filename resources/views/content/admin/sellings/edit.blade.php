@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.selling.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sellings.update", [$selling->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="batch_code">{{ trans('cruds.selling.fields.batch_code') }}</label>
                <input class="form-control {{ $errors->has('batch_code') ? 'is-invalid' : '' }}" type="text" name="batch_code" id="batch_code" value="{{ old('batch_code', $selling->batch_code) }}" required>
                @if($errors->has('batch_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('batch_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.batch_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grand_total">{{ trans('cruds.selling.fields.grand_total') }}</label>
                <input class="form-control {{ $errors->has('grand_total') ? 'is-invalid' : '' }}" type="number" name="grand_total" id="grand_total" value="{{ old('grand_total', $selling->grand_total) }}" step="0.01" required>
                @if($errors->has('grand_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grand_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.grand_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.selling.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', $selling->notes) }}">
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rounding_cost">{{ trans('cruds.selling.fields.rounding_cost') }}</label>
                <input class="form-control {{ $errors->has('rounding_cost') ? 'is-invalid' : '' }}" type="number" name="rounding_cost" id="rounding_cost" value="{{ old('rounding_cost', $selling->rounding_cost) }}" step="0.01">
                @if($errors->has('rounding_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rounding_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.rounding_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_cost">{{ trans('cruds.selling.fields.additional_cost') }}</label>
                <input class="form-control {{ $errors->has('additional_cost') ? 'is-invalid' : '' }}" type="number" name="additional_cost" id="additional_cost" value="{{ old('additional_cost', $selling->additional_cost) }}" step="0.01">
                @if($errors->has('additional_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('additional_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.additional_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_discounts">{{ trans('cruds.selling.fields.price_discounts') }}</label>
                <input class="form-control {{ $errors->has('price_discounts') ? 'is-invalid' : '' }}" type="number" name="price_discounts" id="price_discounts" value="{{ old('price_discounts', $selling->price_discounts) }}" step="0.01">
                @if($errors->has('price_discounts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_discounts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.price_discounts_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.selling.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $selling->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.selling.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Selling::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $selling->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="selling_details">{{ trans('cruds.selling.fields.selling_detail') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('selling_details') ? 'is-invalid' : '' }}" name="selling_details[]" id="selling_details" multiple required>
                    @foreach($selling_details as $id => $selling_detail)
                        <option value="{{ $id }}" {{ (in_array($id, old('selling_details', [])) || $selling->selling_details->contains($id)) ? 'selected' : '' }}>{{ $selling_detail }}</option>
                    @endforeach
                </select>
                @if($errors->has('selling_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.selling_detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="selling_transaction_number">{{ trans('cruds.selling.fields.selling_transaction_number') }}</label>
                <input class="form-control {{ $errors->has('selling_transaction_number') ? 'is-invalid' : '' }}" type="text" name="selling_transaction_number" id="selling_transaction_number" value="{{ old('selling_transaction_number', $selling->selling_transaction_number) }}" required>
                @if($errors->has('selling_transaction_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_transaction_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.selling_transaction_number_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
