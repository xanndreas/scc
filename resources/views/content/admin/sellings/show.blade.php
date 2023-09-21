@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.selling.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sellings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.id') }}
                    </th>
                    <td>
                        {{ $selling->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.batch_code') }}
                    </th>
                    <td>
                        {{ $selling->batch_code }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.grand_total') }}
                    </th>
                    <td>
                        {{ $selling->grand_total }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.notes') }}
                    </th>
                    <td>
                        {{ $selling->notes }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.rounding_cost') }}
                    </th>
                    <td>
                        {{ $selling->rounding_cost }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.additional_cost') }}
                    </th>
                    <td>
                        {{ $selling->additional_cost }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.price_discounts') }}
                    </th>
                    <td>
                        {{ $selling->price_discounts }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.customer') }}
                    </th>
                    <td>
                        {{ $selling->customer->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.status') }}
                    </th>
                    <td>
                        {{ App\Models\Selling::STATUS_SELECT[$selling->status] ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.selling_detail') }}
                    </th>
                    <td>
                        @foreach($selling->selling_details as $key => $selling_detail)
                            <span class="label label-info">{{ $selling_detail->subtotal }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.selling.fields.selling_transaction_number') }}
                    </th>
                    <td>
                        {{ $selling->selling_transaction_number }}
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sellings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
