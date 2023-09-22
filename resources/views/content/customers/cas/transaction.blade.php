@extends('layouts/layoutMaster')

@section('title', 'Member Area')

@section('content')

    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-cover position-relative">
            <div class="container">
                <div class="hero-text-box text-center">
                    <h1 class="text-primary hero-title display-6 fw-bold">Account</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="ecommerce-checkout">
        <div class="ecommerce-application container mt-5 " style="margin-bottom: 200px;">
            <div class="col-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('customers.cas.cart') }}" class="nav-link"
                               aria-controls="navs-pills-left-cart"
                               aria-selected="true">
                                My Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link active"
                               aria-controls="navs-pills-left-transaction"
                               aria-selected="false">
                                Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.cas.profile') }}" class="nav-link"
                               aria-controls="navs-pills-left-profile"
                               aria-selected="false">
                                Profile
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show table-responsive" id="navs-pills-left-transaction" role="tabpanel">
                            <table class="datatable table border-top table-hover datatable-CasTransaction">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.selling.fields.batch_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.selling.fields.grand_total') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.selling.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.selling.fields.selling_transaction_number') }}
                                    </th>
                                </tr>
                                <tr>
                                    <td class="d-none">
                                    </td>
                                    <td>
                                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search form-control" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('content.customers.cas._partials.show')
@endsection
