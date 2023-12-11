@extends('layouts/layoutMaster')

@section('title', trans('cruds.discount.title_singular'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}"/>
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/admin/discount-index.js')}}"></script>
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection


@section('content')

    <!-- Survey Addresses List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">{{ trans('cruds.discount.title_singular') }}</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table class="table datatable border-top table-hover datatable-Discounts">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.discount.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.discount.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.discount.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.discount.fields.percentage') }}
                    </th>
                    <th>
                        {{ trans('cruds.discount.fields.max_discount_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.discount.fields.quota') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>

                    <td class="d-none">
                    </td>
                    <td>
                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

