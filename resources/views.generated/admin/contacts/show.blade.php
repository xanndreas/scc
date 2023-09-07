@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contact.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contacts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.id') }}
                        </th>
                        <td>
                            {{ $contact->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.user') }}
                        </th>
                        <td>
                            {{ $contact->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.code') }}
                        </th>
                        <td>
                            {{ $contact->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.name') }}
                        </th>
                        <td>
                            {{ $contact->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.address') }}
                        </th>
                        <td>
                            {{ $contact->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.address_2') }}
                        </th>
                        <td>
                            {{ $contact->address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.phone') }}
                        </th>
                        <td>
                            {{ $contact->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Contact::TYPE_SELECT[$contact->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.pos_code') }}
                        </th>
                        <td>
                            {{ $contact->pos_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.enterprises') }}
                        </th>
                        <td>
                            {{ App\Models\Contact::ENTERPRISES_SELECT[$contact->enterprises] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.identity_image') }}
                        </th>
                        <td>
                            @if($contact->identity_image)
                                <a href="{{ $contact->identity_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $contact->identity_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.self_image') }}
                        </th>
                        <td>
                            @if($contact->self_image)
                                <a href="{{ $contact->self_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $contact->self_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.npwp') }}
                        </th>
                        <td>
                            {{ $contact->npwp }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contacts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection