@extends('layouts/layoutMaster')

@section('title',  trans('global.show') . " " . trans('cruds.offer.title'))

@section('page-script')
    <script src="{{asset('assets/js/admin/offer-show.js')}}"></script>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.offer.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.offers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-hover table-striped mb-5">
                    <tbody>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.id') }}
                        </th>
                        <td>
                            {{ $offer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.supplier') }}
                        </th>
                        <td>
                            {{ $offer->supplier->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Offer::STATUS_SELECT[$offer->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.grand_total') }}
                        </th>
                        <td>
                            {{ $offer->grand_total }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.offer_detail') }}
                        </th>
                        <td>
                            @foreach($offer->offer_details as $key => $offer_detail)
                                <span class="label label-info">{{ $offer_detail->quantity }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.offering_expired_date') }}
                        </th>
                        <td>
                            {{ $offer->offering_expired_date }}
                        </td>
                    </tr>
                    <tr>
                        <th class="w-25">
                            {{ trans('cruds.offer.fields.offering_number') }}
                        </th>
                        <td>
                            {{ $offer->offering_number }}
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="mb-3">
                    <b> Offer Products</b>
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
                            Price Offer
                        </th>
                        <th>
                            Price Deal
                        </th>
                    </tr>

                    <form method="POST" id="update-offers" action="{{ route("admin.offers.update", [$offer->id]) }}"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="action_type">

                        @foreach($offer->offer_details as $items )
                            <tr>
                                <td>
                                    {{ $items->quantity}}
                                </td>
                                <td>
                                    {{ $items->supply->product->name}}
                                </td>
                                <td>
                                    <input {{ $offer->status == 'done' ? 'disabled': '' }} class="form-control"
                                           type="number" name="price_offer#{{ $items->id }}"
                                           value="{{ $items->price_offer}}">
                                </td>
                                <td>
                                    {{ $items->price_deal}}
                                </td>
                            </tr>
                        @endforeach
                    </form>

                    </tbody>
                </table>

                <div class="mb-3 float-end">
                    @if($offer->status == 'on_progress')
                        <a class="btn btn-sm btn-danger me-2 negotiation-btn" href="javascript:void(0);">
                            Negotiation
                        </a>
                    @endif

                    @if($offer->status != 'done')
                        <a class="btn btn-sm btn-success accept-deal-btn" href="javascript:void(0);">
                            Accept Deal
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
