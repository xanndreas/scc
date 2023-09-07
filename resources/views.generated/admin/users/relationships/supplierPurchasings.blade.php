@can('purchasing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchasings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchasing.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchasing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-supplierPurchasings">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.batch_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.grand_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.rounding_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.additional_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.price_discounts') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.supplier') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.purchasing_detail') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasing.fields.purchasing_transaction_number') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchasings as $key => $purchasing)
                        <tr data-entry-id="{{ $purchasing->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $purchasing->id ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->batch_code ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->grand_total ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->notes ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->rounding_cost ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->additional_cost ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->price_discounts ?? '' }}
                            </td>
                            <td>
                                {{ $purchasing->supplier->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Purchasing::STATUS_SELECT[$purchasing->status] ?? '' }}
                            </td>
                            <td>
                                @foreach($purchasing->purchasing_details as $key => $item)
                                    <span class="badge badge-info">{{ $item->subtotal }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $purchasing->purchasing_transaction_number ?? '' }}
                            </td>
                            <td>
                                @can('purchasing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.purchasings.show', $purchasing->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('purchasing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.purchasings.edit', $purchasing->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('purchasing_delete')
                                    <form action="{{ route('admin.purchasings.destroy', $purchasing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchasing_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchasings.massDestroy') }}",
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
  let table = $('.datatable-supplierPurchasings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection