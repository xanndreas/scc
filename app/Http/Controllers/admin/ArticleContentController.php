<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\MediaUploadingTrait;
use App\Http\Requests\StoreArticleContentRequest;
use App\Http\Requests\UpdateArticleContentRequest;
use App\Models\ArticleCategory;
use App\Models\ArticleContent;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ArticleContentController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('article_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ArticleContent::with(['categories'])->select(sprintf('%s.*', (new ArticleContent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'article_content_show';
                $editGate      = 'article_content_edit';
                $deleteGate    = 'article_content_delete';
                $crudRoutePart = 'article-contents';
                $otherCan = true;

                return view('_partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'otherCan',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('featured_image', function ($row) {
                if (! $row->featured_image) {
                    return '';
                }
                $links = [];
                foreach ($row->featured_image as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('category', function ($row) {
                $labels = [];
                foreach ($row->categories as $category) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $category->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'featured_image', 'category']);

            return $table->make(true);
        }

        $article_categories = ArticleCategory::get();

        return view('content.admin.articleContents.index', compact('article_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('article_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ArticleCategory::pluck('name', 'id');

        return view('content.admin.articleContents.create', compact('categories'));
    }

    public function store(StoreArticleContentRequest $request)
    {
        $articleContent = ArticleContent::create(array_merge($request->except('slug'), ['slug' => Str::slug($request->title)]));
        $articleContent->categories()->sync($request->input('categories', []));
        foreach ($request->input('featured_image', []) as $file) {
            $articleContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $articleContent->id]);
        }

        return redirect()->route('admin.article-contents.index');
    }

    public function edit(ArticleContent $articleContent)
    {
        abort_if(Gate::denies('article_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ArticleCategory::pluck('name', 'id');

        $articleContent->load('categories');

        return view('content.admin.articleContents.edit', compact('articleContent', 'categories'));
    }

    public function update(UpdateArticleContentRequest $request, ArticleContent $articleContent)
    {
        $articleContent->update(array_merge($request->except('slug'), ['slug' => Str::slug($request->title)]));
        $articleContent->categories()->sync($request->input('categories', []));
        if (count($articleContent->featured_image) > 0) {
            foreach ($articleContent->featured_image as $media) {
                if (! in_array($media->file_name, $request->input('featured_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $articleContent->featured_image->pluck('file_name')->toArray();
        foreach ($request->input('featured_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $articleContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('featured_image');
            }
        }

        return redirect()->route('admin.article-contents.index');
    }

    public function show(ArticleContent $articleContent)
    {
        abort_if(Gate::denies('article_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleContent->load('categories');

        return view('content.admin.articleContents.show', compact('articleContent'));
    }

    public function destroy(ArticleContent $articleContent)
    {
        abort_if(Gate::denies('article_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleContent->delete();

        return back();
    }


    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('article_content_create') && Gate::denies('article_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ArticleContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
