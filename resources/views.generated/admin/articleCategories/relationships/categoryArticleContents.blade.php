@can('article_content_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.article-contents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.articleContent.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.articleContent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-categoryArticleContents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.articleContent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.articleContent.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.articleContent.fields.featured_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.articleContent.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.articleContent.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articleContents as $key => $articleContent)
                        <tr data-entry-id="{{ $articleContent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $articleContent->id ?? '' }}
                            </td>
                            <td>
                                {{ $articleContent->title ?? '' }}
                            </td>
                            <td>
                                @foreach($articleContent->featured_image as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $articleContent->slug ?? '' }}
                            </td>
                            <td>
                                @foreach($articleContent->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('article_content_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.article-contents.show', $articleContent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('article_content_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.article-contents.edit', $articleContent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('article_content_delete')
                                    <form action="{{ route('admin.article-contents.destroy', $articleContent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('article_content_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.article-contents.massDestroy') }}",
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
  let table = $('.datatable-categoryArticleContents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection