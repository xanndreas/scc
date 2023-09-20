@extends('layouts/layoutMaster')

@section('title', trans('cruds.purchasing.title_singular'))

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
    <script src="{{asset('assets/js/admin/purchasings-index.js')}}"></script>
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">{{ trans('cruds.purchasing.title_singular') }}</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatable table border-top table-hover datatable-Purchasing">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.id') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.batch_code') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.grand_total') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.notes') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.rounding_cost') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.additional_cost') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.price_discounts') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.supplier') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.status') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.purchasing_detail') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.purchasing.fields.purchasing_transaction_number') }}
                    </th>
                    <th class="w-px-18">
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="form-control search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Purchasing::STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($purchasing_details as $key => $item)
                                <option value="{{ $item->subtotal }}">{{ $item->subtotal }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td class="d-none">
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
