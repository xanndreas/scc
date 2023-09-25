@extends('layouts/layoutMaster')

@section('title',  trans('global.show') . " " . trans('cruds.inventory.title'))

@section('page-script')
    <script src="{{asset('assets/js/admin/inventory-show.js')}}"></script>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.inventory.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.inventories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-hover table-striped mb-5">
                    <tbody>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Product::TYPE_SELECT[$product->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <td>
                            {{ $product->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.stock_minimum') }}
                        </th>
                        <td>
                            {{ $product->stock_minimum }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.price_buy') }}
                        </th>
                        <td>
                            {{ $product->price_buy }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.price_sell') }}
                        </th>
                        <td>
                            {{ $product->price_sell }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.packaging_unit') }}
                        </th>
                        <td>
                            {{ App\Models\Product::PACKAGING_UNIT_SELECT[$product->packaging_unit] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.slug') }}
                        </th>
                        <td>
                            {{ $product->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.featured_image') }}
                        </th>
                        <td>
                            @foreach($product->featured_image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.product_code') }}
                        </th>
                        <td>
                            {{ $product->product_code }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.product.fields.description') }}
                        </th>
                        <td>
                            {{ $product->description }}
                        </td>
                    </tr>

                    </tbody>
                </table>

                <div class="mb-3">
                    <b> History</b>
                </div>

                <table class="table table-bordered table-hover table-striped mb-3">
                    <tbody>
                    <tr>
                        <th class="w-25">
                            Quantity
                        </th>
                        <th class="w-25">
                            Types
                        </th>
                        <th class="w-25">
                            Model Key
                        </th>
                        <th class="w-25">
                            Model Name
                        </th>
                    </tr>

                    @foreach($inventory as $items )
                        <tr>
                            <td>
                                {{ $items->quantity}}
                            </td>
                            <td>
                                {{ \App\Models\Inventory::TYPES_SELECT[$items->types] ?? '' }}
                            </td>
                            <td>
                                {{ $items->model_key}}
                            </td>
                            <td>
                                {{ $items->model_name}}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <div class="mt-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.inventories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
