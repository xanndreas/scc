@extends('layouts/layoutMaster')

@section('title', trans('cruds.product.title_singular'))

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
    <script src="{{asset('assets/js/admin/product-items.js')}}"></script>
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection


@section('content')

    <!-- Survey Addresses List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">{{ trans('cruds.product.title_singular') }}</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table class="table datatable border-top table-hover datatable-Products">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.product.fields.product_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.category') }}
                    </th>
                    <th class="w-px-14">
                        {{ trans('cruds.product.fields.stock_minimum') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.price_buy') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.price_sell') }}
                    </th>
                    <th>
                        {{ trans('cruds.product.fields.packaging_unit') }}
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
                        <select class="search form-control" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Product::TYPE_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search form-control">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($categories as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
                        <select class="search form-control" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Product::PACKAGING_UNIT_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    {{--    @include('admin.surveyReports._partials.remarks')--}}
@endsection

