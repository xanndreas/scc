<div class="d-inline-block text-nowrap">
    @can($deleteGate)
        <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST"
              onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a onclick="$(this).parent().submit()" class="btn btn-sm btn-icon">
                <i class="text-primary ti ti-trash"></i>
            </a>
        </form>
    @endcan

    @if(isset($otherCan))
        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="text-primary ti ti-dots-vertical"></i>
        </button>

        @if(isset($editGate))
            @can($editGate)
                <div class="dropdown-menu dropdown-menu-end m-0" style="">
                    <a href="{{ route('admin.'.$crudRoutePart.'.edit', $row->id) }}" class="dropdown-item">Edit</a>
                </div>
            @endcan
            @can($viewGate)
                <div class="dropdown-menu dropdown-menu-end m-0" style="">
                    <a href="{{ route('admin.'.$crudRoutePart.'.show', $row->id) }}" class="dropdown-item">Show</a>
                </div>
            @endcan
        @endif
    @endif


</div>
