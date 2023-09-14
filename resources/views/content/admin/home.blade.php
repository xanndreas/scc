@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <!-- View sales -->
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">Card</h5>
                            <p class="mb-2">Card Description</p>
                            <a href="javascript:void(0);" class="btn btn-primary">Start </a>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view sales">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->
    </div>

@endsection
