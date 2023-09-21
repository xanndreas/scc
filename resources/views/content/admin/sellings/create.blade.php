<!-- Offcanvas to add -->
<div class="offcanvas offcanvas-end {{ $errors->any() ? 'show' : '' }}" tabindex="-1" id="offcanvasCreateNew"
     aria-labelledby="offcanvasCreateNewLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCreateNewLabel"
            class="offcanvas-title"> {{ trans('global.create') }} {{ trans('cruds.selling.title_singular') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="pt-0" id="createNewForm" method="POST" data-operation="store"
              action="{{ route('admin.sellings.store') }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="required" for="batch_code">{{ trans('cruds.selling.fields.batch_code') }}</label>
                <input class="form-control {{ $errors->has('batch_code') ? 'is-invalid' : '' }}" type="text" name="batch_code" id="batch_code" value="{{ old('batch_code', '') }}" required>
                @if($errors->has('batch_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('batch_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.batch_code_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="grand_total">{{ trans('cruds.selling.fields.grand_total') }}</label>
                <input class="form-control {{ $errors->has('grand_total') ? 'is-invalid' : '' }}" type="number" name="grand_total" id="grand_total" value="{{ old('grand_total', '') }}" step="0.01" required>
                @if($errors->has('grand_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grand_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.grand_total_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="notes">{{ trans('cruds.selling.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', '') }}">
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.notes_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="rounding_cost">{{ trans('cruds.selling.fields.rounding_cost') }}</label>
                <input class="form-control {{ $errors->has('rounding_cost') ? 'is-invalid' : '' }}" type="number" name="rounding_cost" id="rounding_cost" value="{{ old('rounding_cost', '') }}" step="0.01">
                @if($errors->has('rounding_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rounding_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.rounding_cost_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="additional_cost">{{ trans('cruds.selling.fields.additional_cost') }}</label>
                <input class="form-control {{ $errors->has('additional_cost') ? 'is-invalid' : '' }}" type="number" name="additional_cost" id="additional_cost" value="{{ old('additional_cost', '') }}" step="0.01">
                @if($errors->has('additional_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('additional_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.additional_cost_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="price_discounts">{{ trans('cruds.selling.fields.price_discounts') }}</label>
                <input class="form-control {{ $errors->has('price_discounts') ? 'is-invalid' : '' }}" type="number" name="price_discounts" id="price_discounts" value="{{ old('price_discounts', '') }}" step="0.01">
                @if($errors->has('price_discounts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_discounts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.price_discounts_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="customer_id">{{ trans('cruds.selling.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.customer_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required">{{ trans('cruds.selling.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Selling::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.status_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="selling_details">{{ trans('cruds.selling.fields.selling_detail') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('selling_details') ? 'is-invalid' : '' }}" name="selling_details[]" id="selling_details" multiple required>
                    @foreach($selling_detail as $id => $detail)
                        <option value="{{ $id }}" {{ in_array($id, old('selling_details', [])) ? 'selected' : '' }}>{{ $detail }}</option>
                    @endforeach
                </select>
                @if($errors->has('selling_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.selling_detail_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="selling_transaction_number">{{ trans('cruds.selling.fields.selling_transaction_number') }}</label>
                <input class="form-control {{ $errors->has('selling_transaction_number') ? 'is-invalid' : '' }}" type="text" name="selling_transaction_number" id="selling_transaction_number" value="{{ old('selling_transaction_number', '') }}" required>
                @if($errors->has('selling_transaction_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_transaction_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.selling.fields.selling_transaction_number_helper') }}</span>
            </div>

            <button type="submit" class="btn btn-outline-primary waves-effect text-primary me-sm-3 me-1 ">
                {{ trans('global.save') }}
            </button>
        </form>
    </div>
</div>
