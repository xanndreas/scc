@extends('layouts/layoutMaster')

@section('title', trans('cruds.setting.title_singular'))

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/admin/setting-index.js') }}"></script>
    <script>
        Dropzone.options.logoMacrosDropzone = {
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
            success: function(file, response) {
                $('form').find('input[name="logo_macros"]').remove()
                $('form').append('<input type="hidden" name="logo_macros" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo_macros"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->logo_macros)
                    var file = {!! json_encode($setting->logo_macros) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo_macros" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        Dropzone.options.homeCoverDropzone = {
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
            success: function(file, response) {
                $('form').find('input[name="home_cover"]').remove()
                $('form').append('<input type="hidden" name="home_cover" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="home_cover"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->home_cover)
                    var file = {!! json_encode($setting->home_cover) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="home_cover" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        Dropzone.options.homeLogoMainDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="home_logo_main"]').remove()
                $('form').append('<input type="hidden" name="home_logo_main" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="home_logo_main"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->home_logo_main)
                    var file = {!! json_encode($setting->home_logo_main) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="home_logo_main" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        Dropzone.options.homeLogoOneDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="home_logo_one"]').remove()
                $('form').append('<input type="hidden" name="home_logo_one" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="home_logo_one"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->home_logo_one)
                    var file = {!! json_encode($setting->home_logo_one) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="home_logo_one" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        Dropzone.options.homeLogoTwoDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="home_logo_two"]').remove()
                $('form').append('<input type="hidden" name="home_logo_two" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="home_logo_two"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->home_logo_two)
                    var file = {!! json_encode($setting->home_logo_two) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="home_logo_two" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        Dropzone.options.homeLogoThreeDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="home_logo_three"]').remove()
                $('form').append('<input type="hidden" name="home_logo_three" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="home_logo_three"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->home_logo_three)
                    var file = {!! json_encode($setting->home_logo_three) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="home_logo_three" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
    <div class="row">
        <div class="col-12">
            <h6 class="text-muted">{{ trans('cruds.setting.title_singular') }}</h6>
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-page-settings" aria-controls="navs-pills-page-settings"
                            aria-selected="false">Page Setitngs
                        </button>
                    </li>

                    @can('audit_log_access')
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-audit-logs" aria-controls="navs-pills-audit-logs"
                                aria-selected="false">Audit Logs
                            </button>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-roles" aria-controls="navs-pills-top-roles"
                                aria-selected="false">Roles
                            </button>
                        </li>
                    @endcan
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-page-settings" role="tabpanel">
                        <div class="card-header border-bottom">
                            <h5 class="card-title mb-3">Page Settings</h5>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.settings.update') }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="mb-3">
                                    <label class="required"
                                        for="mail_text">{{ trans('cruds.setting.fields.mail_text') }}</label>
                                    <input class="form-control {{ $errors->has('mail_text') ? 'is-invalid' : '' }}"
                                        type="text" name="mail_text" id="mail_text"
                                        value="{{ old('mail_text', $setting->mail_text) }}" required>
                                    @if ($errors->has('mail_text'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('mail_text') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.setting.fields.mail_text_helper') }}</span>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="required"
                                                for="whatsapp_link">{{ trans('cruds.setting.fields.whatsapp_link') }}</label>
                                            <input class="form-control {{ $errors->has('whatsapp_link') ? 'is-invalid' : '' }}"
                                                type="text" name="whatsapp_link" id="whatsapp_link"
                                                value="{{ old('whatsapp_link', $setting->whatsapp_link) }}" required>
                                            @if ($errors->has('whatsapp_link'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('whatsapp_link') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.whatsapp_link_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="required"
                                                for="whatsapp_text">{{ trans('cruds.setting.fields.whatsapp_text') }}</label>
                                            <input class="form-control {{ $errors->has('whatsapp_text') ? 'is-invalid' : '' }}"
                                                type="text" name="whatsapp_text" id="whatsapp_text"
                                                value="{{ old('whatsapp_text', $setting->whatsapp_text) }}" required>
                                            @if ($errors->has('whatsapp_text'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('whatsapp_text') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.whatsapp_text_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="logo_macros">{{ trans('cruds.setting.fields.logo_macros') }}</label>
                                    <div class="needsclick dropzone form-control {{ $errors->has('logo_macros') ? 'is-invalid' : '' }}"
                                        id="logo_macros-dropzone">
                                    </div>
                                    @if ($errors->has('logo_macros'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('logo_macros') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.setting.fields.logo_macros_helper') }}</span>
                                </div>

                                <div class="mb-3">
                                    <label for="home_cover">{{ trans('cruds.setting.fields.home_cover') }}</label>
                                    <div class="needsclick dropzone form-control {{ $errors->has('home_cover') ? 'is-invalid' : '' }}"
                                        id="home_cover-dropzone">
                                    </div>
                                    @if ($errors->has('home_cover'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('home_cover') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.setting.fields.home_cover_helper') }}</span>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label
                                                for="home_logo_main">{{ trans('cruds.setting.fields.home_logo_main') }}</label>
                                            <div class="needsclick dropzone form-control {{ $errors->has('home_logo_main') ? 'is-invalid' : '' }}"
                                                id="home_logo_main-dropzone">
                                            </div>
                                            @if ($errors->has('home_logo_main'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_main') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_main_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label
                                                for="home_logo_one">{{ trans('cruds.setting.fields.home_logo_one') }}</label>
                                            <div class="needsclick dropzone form-control {{ $errors->has('home_logo_one') ? 'is-invalid' : '' }}"
                                                id="home_logo_one-dropzone">
                                            </div>
                                            @if ($errors->has('home_logo_one'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_one') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_one_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label
                                                for="home_logo_two">{{ trans('cruds.setting.fields.home_logo_two') }}</label>
                                            <div class="needsclick dropzone form-control {{ $errors->has('home_logo_two') ? 'is-invalid' : '' }}"
                                                id="home_logo_two-dropzone">
                                            </div>
                                            @if ($errors->has('home_logo_two'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_two') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_two_helper') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label
                                                for="home_logo_three">{{ trans('cruds.setting.fields.home_logo_three') }}</label>
                                            <div class="needsclick dropzone form-control {{ $errors->has('home_logo_three') ? 'is-invalid' : '' }}"
                                                id="home_logo_three-dropzone">
                                            </div>
                                            @if ($errors->has('home_logo_three'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_three') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_three_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-sm-12">
                                            <label
                                                for="home_logo_one_info">{{ trans('cruds.setting.fields.home_logo_one_info') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('home_logo_one_info') ? 'is-invalid' : '' }}"
                                                type="text" name="home_logo_one_info" id="home_logo_one_info"
                                                value="{{ old('home_logo_one_info', $setting->home_logo_one_info) }}">
                                            @if ($errors->has('home_logo_one_info'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_one_info') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_one_info_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-sm-12">
                                            <label
                                                for="home_logo_one_description">{{ trans('cruds.setting.fields.home_logo_one_description') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('home_logo_one_description') ? 'is-invalid' : '' }}"
                                                type="text" name="home_logo_one_description"
                                                id="home_logo_one_description"
                                                value="{{ old('home_logo_one_description', $setting->home_logo_one_description) }}">
                                            @if ($errors->has('home_logo_one_description'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_one_description') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_one_description_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-sm-12">
                                            <label
                                                for="home_logo_two_info">{{ trans('cruds.setting.fields.home_logo_two_info') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('home_logo_two_info') ? 'is-invalid' : '' }}"
                                                type="text" name="home_logo_two_info" id="home_logo_two_info"
                                                value="{{ old('home_logo_two_info', $setting->home_logo_two_info) }}">
                                            @if ($errors->has('home_logo_two_info'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_two_info') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_two_info_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-sm-12">
                                            <label
                                                for="home_logo_two_description">{{ trans('cruds.setting.fields.home_logo_two_description') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('home_logo_two_description') ? 'is-invalid' : '' }}"
                                                type="text" name="home_logo_two_description"
                                                id="home_logo_two_description"
                                                value="{{ old('home_logo_two_description', $setting->home_logo_two_description) }}">
                                            @if ($errors->has('home_logo_two_description'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_two_description') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_two_description_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-sm-12">
                                            <label
                                                for="home_logo_three_info">{{ trans('cruds.setting.fields.home_logo_three_info') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('home_logo_three_info') ? 'is-invalid' : '' }}"
                                                type="text" name="home_logo_three_info" id="home_logo_three_info"
                                                value="{{ old('home_logo_three_info', $setting->home_logo_three_info) }}">
                                            @if ($errors->has('home_logo_three_info'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_three_info') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_three_info_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-sm-12">
                                            <label
                                                for="home_logo_three_description">{{ trans('cruds.setting.fields.home_logo_three_description') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('home_logo_three_description') ? 'is-invalid' : '' }}"
                                                type="text" name="home_logo_three_description"
                                                id="home_logo_three_description"
                                                value="{{ old('home_logo_three_description', $setting->home_logo_three_description) }}">
                                            @if ($errors->has('home_logo_three_description'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('home_logo_three_description') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.setting.fields.home_logo_three_description_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @can('audit_log_access')
                        <div class="tab-pane fade" id="navs-pills-audit-logs" role="tabpanel">
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-3">Audit Logs</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table border-top table-hover datatable-AuditLog">
                                    <thead>
                                        <tr>
                                            <th width="10">
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.description') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.subject_id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.subject_type') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.user_id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.host') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.auditLog.fields.created_at') }}
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    @endcan

                    @can('role_access')
                        <div class="tab-pane fade" id="navs-pills-top-roles" role="tabpanel">
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-3">Roles</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="datatables-users table border-top table-hover datatable-Role">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.role.fields.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.role.fields.title') }}
                                            </th>
                                            <th>
                                                {{ trans('global.actions') }}
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            @include('content.admin.settings.roles.show')
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
