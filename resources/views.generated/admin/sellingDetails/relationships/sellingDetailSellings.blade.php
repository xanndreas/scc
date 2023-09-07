@can('selling_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sellings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.selling.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.selling.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-sellingDetailSellings">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.batch_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.grand_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.rounding_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.additional_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.price_discounts') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.selling_detail') }}
                        </th>
                        <th>
                            {{ trans('cruds.selling.fields.selling_transaction_number') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sellings as $key => $selling)
                        <tr data-entry-id="{{ $selling->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $selling->id ?? '' }}
                            </td>
                            <td>
                                {{ $selling->batch_code ?? '' }}
                            </td>
                            <td>
                                {{ $selling->grand_total ?? '' }}
                            </td>
                            <td>
                                {{ $selling->notes ?? '' }}
                            </td>
                            <td>
                                {{ $selling->rounding_cost ?? '' }}
                            </td>
                            <td>
                                {{ $selling->additional_cost ?? '' }}
                            </td>
                            <td>
                                {{ $selling->price_discounts ?? '' }}
                            </td>
                            <td>
                                {{ $selling->customer->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Selling::STATUS_SELECT[$selling->status] ?? '' }}
                            </td>
                            <td>
                                @foreach($selling->selling_details as $key => $item)
                                    <span class="badge badge-info">{{ $item->subtotal }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $selling->selling_transaction_number ?? '' }}
                            </td>
                            <td>
                                @can('selling_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sellings.show', $selling->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('selling_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sellings.edit', $selling->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('selling_delete')
                                    <form action="{{ route('admin.sellings.destroy', $selling->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('selling_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sellings.massDestroy') }}",
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
  let table = $('.datatable-sellingDetailSellings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection