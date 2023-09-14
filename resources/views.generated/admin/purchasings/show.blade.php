@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchasing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchasings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.id') }}
                        </th>
                        <td>
                            {{ $purchasing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.batch_code') }}
                        </th>
                        <td>
                            {{ $purchasing->batch_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.grand_total') }}
                        </th>
                        <td>
                            {{ $purchasing->grand_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.notes') }}
                        </th>
                        <td>
                            {{ $purchasing->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.rounding_cost') }}
                        </th>
                        <td>
                            {{ $purchasing->rounding_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.additional_cost') }}
                        </th>
                        <td>
                            {{ $purchasing->additional_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.price_discounts') }}
                        </th>
                        <td>
                            {{ $purchasing->price_discounts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.supplier') }}
                        </th>
                        <td>
                            {{ $purchasing->supplier->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Purchasing::STATUS_SELECT[$purchasing->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.purchasing_detail') }}
                        </th>
                        <td>
                            @foreach($purchasing->purchasing_details as $key => $purchasing_detail)
                                <span class="label label-info">{{ $purchasing_detail->subtotal }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasing.fields.purchasing_transaction_number') }}
                        </th>
                        <td>
                            {{ $purchasing->purchasing_transaction_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchasings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection