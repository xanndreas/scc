@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.offerDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offer-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.offerDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $offerDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerDetail.fields.quantity') }}
                        </th>
                        <td>
                            {{ $offerDetail->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerDetail.fields.product') }}
                        </th>
                        <td>
                            {{ $offerDetail->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerDetail.fields.price_offer') }}
                        </th>
                        <td>
                            {{ $offerDetail->price_offer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offerDetail.fields.price_deal') }}
                        </th>
                        <td>
                            {{ $offerDetail->price_deal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offer-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#offer_detail_offers" role="tab" data-toggle="tab">
                {{ trans('cruds.offer.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="offer_detail_offers">
            @includeIf('admin.offerDetails.relationships.offerDetailOffers', ['offers' => $offerDetail->offerDetailOffers])
        </div>
    </div>
</div>

@endsection