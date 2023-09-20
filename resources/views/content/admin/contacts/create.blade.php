@extends('layouts/layoutMaster')

@section('title',  trans('global.create') . " " . trans('cruds.contact.title'))

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
        Dropzone.options.identityImageDropzone = {
            url: '{{ route('admin.contacts.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
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
                $('form').find('input[name="identity_image"]').remove()
                $('form').append('<input type="hidden" name="identity_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="identity_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($contact) && $contact->identity_image)
                var file = {!! json_encode($contact->identity_image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="identity_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
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
    <script>
        Dropzone.options.selfImageDropzone = {
            url: '{{ route('admin.contacts.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
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
                $('form').find('input[name="self_image"]').remove()
                $('form').append('<input type="hidden" name="self_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="self_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($contact) && $contact->self_image)
                var file = {!! json_encode($contact->self_image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="self_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
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
        <h5>{{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}</h5>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route("admin.contacts.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label class="required" for="user_id">{{ trans('cruds.contact.fields.user') }}</label>
                        <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                            @foreach($users as $id => $entry)
                                <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.user_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="code">{{ trans('cruds.contact.fields.code') }}</label>
                        <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}">
                        @if($errors->has('code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.code_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="name">{{ trans('cruds.contact.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.name_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="address">{{ trans('cruds.contact.fields.address') }}</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.address_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="address_2">{{ trans('cruds.contact.fields.address_2') }}</label>
                        <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', '') }}">
                        @if($errors->has('address_2'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address_2') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.address_2_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required">{{ trans('cruds.contact.fields.type') }}</label>
                        <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                            <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Contact::TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.type_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label class="required" for="pos_code">{{ trans('cruds.contact.fields.pos_code') }}</label>
                        <input class="form-control {{ $errors->has('pos_code') ? 'is-invalid' : '' }}" type="text" name="pos_code" id="pos_code" value="{{ old('pos_code', '') }}" required>
                        @if($errors->has('pos_code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('pos_code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.pos_code_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label>{{ trans('cruds.contact.fields.enterprises') }}</label>
                        <select class="form-control {{ $errors->has('enterprises') ? 'is-invalid' : '' }}" name="enterprises" id="enterprises">
                            <option value disabled {{ old('enterprises', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Contact::ENTERPRISES_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('enterprises', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('enterprises'))
                            <div class="invalid-feedback">
                                {{ $errors->first('enterprises') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.enterprises_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="identity_image">{{ trans('cruds.contact.fields.identity_image') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('identity_image') ? 'is-invalid' : '' }}" id="identity_image-dropzone">
                        </div>
                        @if($errors->has('identity_image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_image') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.identity_image_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="self_image">{{ trans('cruds.contact.fields.self_image') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('self_image') ? 'is-invalid' : '' }}" id="self_image-dropzone">
                        </div>
                        @if($errors->has('self_image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('self_image') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.self_image_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <label for="npwp">{{ trans('cruds.contact.fields.npwp') }}</label>
                        <input class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}" type="text" name="npwp" id="npwp" value="{{ old('npwp', '') }}">
                        @if($errors->has('npwp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('npwp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contact.fields.npwp_helper') }}</span>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary waves-effect float-end" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
