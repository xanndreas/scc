@can('contact_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contacts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contact.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.contact.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userContacts">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.address_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.pos_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.enterprises') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.identity_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.self_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.npwp') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $contact)
                        <tr data-entry-id="{{ $contact->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contact->id ?? '' }}
                            </td>
                            <td>
                                {{ $contact->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $contact->code ?? '' }}
                            </td>
                            <td>
                                {{ $contact->name ?? '' }}
                            </td>
                            <td>
                                {{ $contact->address ?? '' }}
                            </td>
                            <td>
                                {{ $contact->address_2 ?? '' }}
                            </td>
                            <td>
                                {{ $contact->phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Contact::TYPE_SELECT[$contact->type] ?? '' }}
                            </td>
                            <td>
                                {{ $contact->pos_code ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Contact::ENTERPRISES_SELECT[$contact->enterprises] ?? '' }}
                            </td>
                            <td>
                                @if($contact->identity_image)
                                    <a href="{{ $contact->identity_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $contact->identity_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($contact->self_image)
                                    <a href="{{ $contact->self_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $contact->self_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $contact->npwp ?? '' }}
                            </td>
                            <td>
                                @can('contact_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contacts.show', $contact->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contact_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contacts.edit', $contact->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contact_delete')
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('contact_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contacts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-userContacts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection