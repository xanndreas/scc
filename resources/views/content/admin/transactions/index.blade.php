@extends('layouts/layoutMaster')

@section('title', trans('cruds.transaction.title_singular'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}"/>
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
    <script src="{{asset('assets/js/admin/transaction-index.js')}}"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">{{ trans('cruds.transaction.title_singular') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.transactions.export') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="required" for="data_type">Data Types</label>
                    <select class="form-control select2 {{ $errors->has('data_type') ? 'is-invalid' : '' }}"
                            name="data_type" id="data_type" required>
                        <option value
                                disabled {{ old('data_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        <option value="supply" {{ old('data_type', null) === null ? 'selected' : '' }}>Supply</option>
                        <option value="income" {{ old('data_type', null) === null ? 'selected' : '' }}>Pendapatan
                        </option>
                        <option value="stock_under" {{ old('data_type', null) === null ? 'selected' : '' }}>Riwayat Stok
                        </option>
                    </select>
                    @if($errors->has('data_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('data_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.export.fields.data_type_helper') }}</span>
                </div>

                <div id="date-container">

                    <div class="mb-3">
                        <label class="required" for="start_date">{{ trans('cruds.export.fields.start_date') }}</label>
                        <input
                            class="form-control flatpickr-datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                            type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                        @if($errors->has('start_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('start_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.export.fields.start_date_helper') }}</span>
                    </div>
                    <div class="mb-3">
                        <label class="required" for="end_date">{{ trans('cruds.export.fields.end_date') }}</label>
                        <input
                            class="form-control flatpickr-datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                            type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                        @if($errors->has('end_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('end_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.export.fields.end_date_helper') }}</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary waves-effect text-primary me-sm-3 me-1 ">
                    {{ trans('cruds.export.title') }}
                </button>
            </form>
        </div>
    </div>
@endsection
