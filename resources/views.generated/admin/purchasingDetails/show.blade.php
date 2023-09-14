@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchasingDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchasing-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasingDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $purchasingDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasingDetail.fields.subtotal') }}
                        </th>
                        <td>
                            {{ $purchasingDetail->subtotal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasingDetail.fields.product') }}
                        </th>
                        <td>
                            {{ $purchasingDetail->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasingDetail.fields.quantity') }}
                        </th>
                        <td>
                            {{ $purchasingDetail->quantity }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchasing-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection