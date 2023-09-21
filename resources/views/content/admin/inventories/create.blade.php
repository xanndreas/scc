<!-- Offcanvas to add -->
<div class="offcanvas offcanvas-end {{ $errors->any() ? 'show' : '' }}" tabindex="-1" id="offcanvasCreateNew"
     aria-labelledby="offcanvasCreateNewLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCreateNewLabel"
            class="offcanvas-title"> {{ trans('global.create') }} {{ trans('cruds.inventory.title_singular') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="pt-0" id="createNewForm" method="POST" data-operation="store"
              action="{{ route('admin.inventories.store') }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="required" for="model_key">{{ trans('cruds.inventory.fields.model_key') }}</label>
                <input class="form-control {{ $errors->has('model_key') ? 'is-invalid' : '' }}" type="text" name="model_key" id="model_key" value="{{ old('model_key', '') }}" required>
                @if($errors->has('model_key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model_key') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inventory.fields.model_key_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="model_name">{{ trans('cruds.inventory.fields.model_name') }}</label>
                <input class="form-control {{ $errors->has('model_name') ? 'is-invalid' : '' }}" type="text" name="model_name" id="model_name" value="{{ old('model_name', '') }}" required>
                @if($errors->has('model_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('model_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inventory.fields.model_name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required">{{ trans('cruds.inventory.fields.types') }}</label>
                <select class="form-control {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types" id="types" required>
                    <option value disabled {{ old('types', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Inventory::TYPES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('types', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inventory.fields.types_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="quantity">{{ trans('cruds.inventory.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inventory.fields.quantity_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="required" for="product_id">{{ trans('cruds.inventory.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($product as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inventory.fields.product_helper') }}</span>
            </div>

            <button type="submit" class="btn btn-outline-primary waves-effect text-primary me-sm-3 me-1 ">
                {{ trans('global.save') }}
            </button>
        </form>
    </div>
</div>
