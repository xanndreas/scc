<!-- Offcanvas to add -->
<div class="offcanvas offcanvas-end {{ $errors->any() ? 'show' : '' }}" tabindex="-1" id="offcanvasCreateNew"
     aria-labelledby="offcanvasCreateNewLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCreateNewLabel"
            class="offcanvas-title"> {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="pt-0" id="createNewForm" method="POST" data-operation="store"
              action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                       id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>

            <button type="submit" class="btn btn-outline-primary waves-effect text-primary me-sm-3 me-1 ">
                {{ trans('global.save') }}
            </button>
        </form>
    </div>
</div>
