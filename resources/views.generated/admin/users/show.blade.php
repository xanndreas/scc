@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#customer_sellings" role="tab" data-toggle="tab">
                {{ trans('cruds.selling.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#supplier_purchasings" role="tab" data-toggle="tab">
                {{ trans('cruds.purchasing.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_contacts" role="tab" data-toggle="tab">
                {{ trans('cruds.contact.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="customer_sellings">
            @includeIf('admin.users.relationships.customerSellings', ['sellings' => $user->customerSellings])
        </div>
        <div class="tab-pane" role="tabpanel" id="supplier_purchasings">
            @includeIf('admin.users.relationships.supplierPurchasings', ['purchasings' => $user->supplierPurchasings])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_contacts">
            @includeIf('admin.users.relationships.userContacts', ['contacts' => $user->userContacts])
        </div>
    </div>
</div>

@endsection