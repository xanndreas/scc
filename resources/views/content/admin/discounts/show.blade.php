@extends('layouts/layoutMaster')

@section('title',  trans('global.show') . " " . trans('cruds.discount.title'))

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.discount.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.discounts.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.name') }}
                        </th>
                        <td>
                            {{ $discount->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.description') }}
                        </th>
                        <td>
                            {{ $discount->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.code') }}
                        </th>
                        <td>
                            {{ $discount->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.percentage') }}
                        </th>
                        <td>
                            {{ $discount->percentage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.max_discount_value') }}
                        </th>
                        <td>
                            {{ $discount->max_discount_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.quota') }}
                        </th>
                        <td>
                            {{ $discount->quota }}
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="mt-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.discounts.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
