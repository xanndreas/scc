@extends('layouts/layoutMaster')

@section('title',  trans('global.show') . " " . trans('cruds.articleContent.title'))

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.articleContent.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="mb-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.article-contents.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.articleContent.fields.id') }}
                        </th>
                        <td>
                            {{ $articleContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleContent.fields.title') }}
                        </th>
                        <td>
                            {{ $articleContent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleContent.fields.featured_image') }}
                        </th>
                        <td>
                            @foreach($articleContent->featured_image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleContent.fields.page_text') }}
                        </th>
                        <td>
                            {!! $articleContent->page_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleContent.fields.slug') }}
                        </th>
                        <td>
                            {{ $articleContent->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleContent.fields.category') }}
                        </th>
                        <td>
                            @foreach($articleContent->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="mt-3">
                    <a class="btn btn-label-primary" href="{{ route('admin.article-contents.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
