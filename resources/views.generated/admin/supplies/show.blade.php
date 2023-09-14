@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.supply.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supplies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.id') }}
                        </th>
                        <td>
                            {{ $supply->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.quantity_needs') }}
                        </th>
                        <td>
                            {{ $supply->quantity_needs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.initial_price') }}
                        </th>
                        <td>
                            {{ $supply->initial_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.product') }}
                        </th>
                        <td>
                            {{ $supply->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.start_date') }}
                        </th>
                        <td>
                            {{ $supply->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.end_date') }}
                        </th>
                        <td>
                            {{ $supply->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supply.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Supply::STATUS_SELECT[$supply->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.supplies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection