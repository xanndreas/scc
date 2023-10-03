@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('assets/js/admin/dashboard-index.js')}}"></script>
@endsection

@section('content')
    <div class="row">
        <!-- View sales -->
        <div class="col-12 col-xl-8 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Earning Reports</h5>
                        <small class="text-muted">Yearly Earnings Overview</small>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
                                <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
                                <h6 class="tab-widget-title mb-0 mt-2">Orders</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
                                <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-chart-bar ti-sm"></i></div>
                                <h6 class="tab-widget-title mb-0 mt-2"> Sales</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profit-id" aria-controls="navs-profit-id" aria-selected="false">
                                <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
                                <h6 class="tab-widget-title mb-0 mt-2">Profit</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
                                <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                                <h6 class="tab-widget-title mb-0 mt-2">Income</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-0 ms-0 ms-sm-2">
                        <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
                            <div id="earningReportsTabsOrders"></div>
                        </div>
                        <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
                            <div id="earningReportsTabsSales"></div>
                        </div>
                        <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
                            <div id="earningReportsTabsProfit"></div>
                        </div>
                        <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
                            <div id="earningReportsTabsIncome"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->
    </div>

@endsection
