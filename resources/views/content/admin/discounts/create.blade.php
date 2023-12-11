@extends('layouts/layoutMaster')

@section('title',  trans('global.create') . " " . trans('cruds.discount.title'))

@section('page-script')
@endsection

@section('content')

    <!-- Modern -->
    <div class="col-12">
        <h5>{{ trans('global.create') }} {{ trans('cruds.discount.title_singular') }}</h5>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route("admin.discounts.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label class="required" for="name">{{ trans('cruds.discount.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                               name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.name_helper') }}</span>
                    </div>

                    <div class="col-sm-12">
                        <label class="required"
                               for="description">{{ trans('cruds.discount.fields.description') }}</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                  name="description" id="description"
                                  required>{{ old('description', '') }}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.description_helper') }}</span>
                    </div>

                    <div class="col-sm-12">
                        <label for="code">{{ trans('cruds.discount.fields.code') }}</label>
                        <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text"
                               name="code" id="code" value="{{ old('code', '') }}">
                        @if($errors->has('code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.code_helper') }}</span>
                    </div>

                    <div class="col-sm-12">
                        <label class="required" for="percentage">{{ trans('cruds.discount.fields.percentage') }}</label>
                        <input class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}" type="number"
                               name="percentage" id="percentage" value="{{ old('percentage', '') }}"
                               step="1" required>
                        @if($errors->has('percentage'))
                            <div class="invalid-feedback">
                                {{ $errors->first('percentage') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.percentage_helper') }}</span>
                    </div>

                    <div class="col-sm-12">
                        <label class="required"
                               for="max_discount_value">{{ trans('cruds.discount.fields.max_discount_value') }}</label>
                        <input class="form-control {{ $errors->has('max_discount_value') ? 'is-invalid' : '' }}"
                               type="number" name="max_discount_value" id="max_discount_value"
                               value="{{ old('max_discount_value', '') }}" step="0.01"
                               required>
                        @if($errors->has('max_discount_value'))
                            <div class="invalid-feedback">
                                {{ $errors->first('max_discount_value') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.max_discount_value_helper') }}</span>
                    </div>

                    <div class="col-sm-12">
                        <label class="required" for="quota">{{ trans('cruds.discount.fields.quota') }}</label>
                        <input class="form-control {{ $errors->has('quota') ? 'is-invalid' : '' }}" type="number"
                               name="quota" id="quota" value="{{ old('quota', '') }}" step="1" required>
                        @if($errors->has('quota'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quota') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.discount.fields.quota_helper') }}</span>
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
