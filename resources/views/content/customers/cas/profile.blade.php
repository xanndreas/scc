@extends('layouts/layoutMaster')

@section('title', 'Member Area')

@section('content')

    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
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
                            <a href="{{ route('customers.cas.transaction-history') }}" class="nav-link"
                               aria-controls="navs-pills-left-transaction"
                               aria-selected="false">
                                Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link active"
                               aria-controls="navs-pills-left-profile"
                               aria-selected="false">
                                Profile
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="navs-pills-left-profile" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-header">
                                            <b>{{ trans('global.my_profile') }}</b>
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route("profile.password.updateProfile") }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="required"
                                                           for="name">{{ trans('cruds.user.fields.name') }}</label>
                                                    <input
                                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                        type="text" name="name" id="name"
                                                        value="{{ old('name', auth()->user()->name) }}" required>
                                                    @if($errors->has('name'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label class="required"
                                                           for="title">{{ trans('cruds.user.fields.email') }}</label>
                                                    <input
                                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                        type="text" name="email" id="email"
                                                        value="{{ old('email', auth()->user()->email) }}" required>
                                                    @if($errors->has('email'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" type="submit">
                                                        {{ trans('global.save') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-header">
                                            <b>{{ trans('global.change_password') }}</b>
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route("profile.password.update") }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="required"
                                                           for="title">New {{ trans('cruds.user.fields.password') }}</label>
                                                    <input
                                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                        type="password" name="password" id="password" required>
                                                    @if($errors->has('password'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label class="required" for="title">Repeat
                                                        New {{ trans('cruds.user.fields.password') }}</label>
                                                    <input class="form-control" type="password"
                                                           name="password_confirmation" id="password_confirmation"
                                                           required>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" type="submit">
                                                        {{ trans('global.save') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-header">
                                            <b>Utility</b>
                                        </div>

                                        <div class="card-body">
                                            @if (Auth::check())
                                                <a class="btn btn-danger" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
