@extends('layouts/layoutMaster')

@section('title', trans('global.edit') . " " . trans('cruds.product.title'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection

@section('page-script')
    <script>
        var uploadedFeaturedImageMap = {}
        Dropzone.options.featuredImageDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="featured_image[]" value="' + response.name + '">')
                uploadedFeaturedImageMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFeaturedImageMap[file.name]
                }
                $('form').find('input[name="featured_image[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($product) && $product->featured_image)
                var files = {!! json_encode($product->featured_image) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="featured_image[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>
@endsection

@section('content')
    <!-- Modern -->
    <div class="col-12">
        <h5>{{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}</h5>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row g-3">
                    <div class="col-sm-12">
                        <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required">{{ trans('cruds.product.fields.type') }}</label>
                        <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                            <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Product::TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('type', $product->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.type_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                        <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                            @foreach($categories as $id => $entry)
                                <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $product->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="stock_minimum">{{ trans('cruds.product.fields.stock_minimum') }}</label>
                        <input class="form-control {{ $errors->has('stock_minimum') ? 'is-invalid' : '' }}" type="number" name="stock_minimum" id="stock_minimum" value="{{ old('stock_minimum', $product->stock_minimum) }}" step="1" required>
                        @if($errors->has('stock_minimum'))
                            <div class="invalid-feedback">
                                {{ $errors->first('stock_minimum') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.stock_minimum_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="price_buy">{{ trans('cruds.product.fields.price_buy') }}</label>
                        <input class="form-control {{ $errors->has('price_buy') ? 'is-invalid' : '' }}" type="number" name="price_buy" id="price_buy" value="{{ old('price_buy', $product->price_buy) }}" step="0.01" required>
                        @if($errors->has('price_buy'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price_buy') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.price_buy_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="price_sell">{{ trans('cruds.product.fields.price_sell') }}</label>
                        <input class="form-control {{ $errors->has('price_sell') ? 'is-invalid' : '' }}" type="number" name="price_sell" id="price_sell" value="{{ old('price_sell', $product->price_sell) }}" step="0.01" required>
                        @if($errors->has('price_sell'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price_sell') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.price_sell_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label>{{ trans('cruds.product.fields.packaging_unit') }}</label>
                        <select class="form-control {{ $errors->has('packaging_unit') ? 'is-invalid' : '' }}" name="packaging_unit" id="packaging_unit">
                            <option value disabled {{ old('packaging_unit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Product::PACKAGING_UNIT_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('packaging_unit', $product->packaging_unit) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('packaging_unit'))
                            <div class="invalid-feedback">
                                {{ $errors->first('packaging_unit') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.packaging_unit_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="slug">{{ trans('cruds.product.fields.slug') }}</label>
                        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}">
                        @if($errors->has('slug'))
                            <div class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.slug_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="featured_image">{{ trans('cruds.product.fields.featured_image') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                        </div>
                        @if($errors->has('featured_image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('featured_image') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.featured_image_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="product_code">{{ trans('cruds.product.fields.product_code') }}</label>
                        <input class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" type="text" name="product_code" id="product_code" value="{{ old('product_code', $product->product_code) }}" required>
                        @if($errors->has('product_code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product_code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.product_code_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="description">{{ trans('cruds.product.fields.description') }}</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $product->description) }}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-danger float-end" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

