@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stockOpname.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-opnames.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stockOpname.fields.id') }}
                        </th>
                        <td>
                            {{ $stockOpname->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockOpname.fields.notes') }}
                        </th>
                        <td>
                            {{ $stockOpname->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockOpname.fields.product') }}
                        </th>
                        <td>
                            {{ $stockOpname->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockOpname.fields.quantity') }}
                        </th>
                        <td>
                            {{ $stockOpname->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockOpname.fields.types') }}
                        </th>
                        <td>
                            {{ App\Models\StockOpname::TYPES_SELECT[$stockOpname->types] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-opnames.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection