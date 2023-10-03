<div class="d-inline-block text-nowrap">
    @if($row->status == 'waiting_payment')
        <form action="{{ route('admin.purchasings.mark-done', ['purchasing' => $row->id]) }}" method="POST"
              onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a onclick="$(this).parent().submit()" class="btn btn-primary text-white">
                Confirm
            </a>
        </form>
    @else
        Confirmed
    @endif
</div>
