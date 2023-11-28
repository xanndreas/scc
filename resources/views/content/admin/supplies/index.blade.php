@extends('layouts/layoutMaster')

@section('title', trans('cruds.supply.title_singular'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
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
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/admin/supply-index.js')}}"></script>
    <script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">{{ trans('cruds.supply.title_singular') }}</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatable table border-top table-hover datatable-Supply">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.id') }}
                    </th>
                    <th class="w-px-18">
                        No. {{ trans('cruds.supply.title_singular') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.quantity_needs') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.initial_price') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.product') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.start_date') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.end_date') }}
                    </th>
                    <th class="w-px-18">
                        {{ trans('cruds.supply.fields.status') }}
                    </th>
                    <th class="w-px-18">
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td class="d-none">
                    </td>
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
                        <select class="form-control search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($products as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="form-control search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="form-control search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Supply::STATUS_SELECT as $key => $item)
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
    @include('content.admin.supplies.create')
@endsection
