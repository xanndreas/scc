@extends('layouts/layoutMaster')

@section('title',  trans('global.show') . " " . trans('cruds.offer.title'))

@section('page-script')
    <script src="{{asset('assets/js/admin/offer-show.js')}}"></script>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.selling.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.sellings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped mb-5">
                    <tbody>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.id') }}
                        </th>
                        <td>
                            {{ $selling->id }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.batch_code') }}
                        </th>
                        <td>
                            {{ $selling->batch_code }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.grand_total') }}
                        </th>
                        <td>
                            {{ $selling->grand_total }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.rounding_cost') }}
                        </th>
                        <td>
                            {{ $selling->rounding_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.additional_cost') }}
                        </th>
                        <td>
                            {{ $selling->additional_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.price_discounts') }}
                        </th>
                        <td>
                            {{ $selling->price_discounts }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.customer') }}
                        </th>
                        <td>
                            {{ $selling->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.status') }}
                        </th>
                        <td>
                            <form method="POST" id="update-offers"
                                  action="{{ route("admin.sellings.update", [$selling->id]) }}"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-10">
                                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                                name="status" id="status" required>
                                            <option value
                                                    disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\Models\Selling::STATUS_SELECT as $key => $label)
                                                <option
                                                    value="{{ $key }}" {{ $selling->status === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-label-success w-100 update-status-btn"
                                           href="javascript:void(0);">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.selling.fields.selling_transaction_number') }}
                        </th>
                        <td>
                            {{ $selling->selling_transaction_number }}
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="mb-3">
                    <b> Selling Products</b>
                </div>

                <table class="table table-bordered table-hover table-striped mb-3">
                    <tbody>
                    <tr>
                        <th class="w-25">
                            Quantity
                        </th>
                        <th class="w-50">
                            Product
                        </th>
                        <th>
                            Subtotal
                        </th>
                    </tr>

                    <form method="POST" id="update-offers" action=""
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="action_type">
                        @foreach($selling->selling_details as $items )
                            <tr>
                                <td>
                                    {{ $items->quantity}}
                                </td>
                                <td>
                                    {{ $items->product->name}}
                                </td>
                                <td>
                                    {{ $items->subtotal}}
                                </td>
                            </tr>
                        @endforeach
                    </form>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

