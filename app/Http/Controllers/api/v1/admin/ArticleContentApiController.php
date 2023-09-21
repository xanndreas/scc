<?php

namespace App\Http\Controllers\api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\MediaUploadingTrait;
use App\Http\Requests\StoreArticleContentRequest;
use App\Http\Requests\UpdateArticleContentRequest;
use App\Http\Resources\admin\ArticleContentResource;
use App\Models\ArticleContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('article_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleContentResource(ArticleContent::with(['categories'])->get());
    }

    public function store(StoreArticleContentRequest $request)
    {
        $articleContent = ArticleContent::create($request->all());
        $articleContent->categories()->sync($request->input('categories', []));
        foreach ($request->input('featured_image', []) as $file) {
            $articleContent->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('featured_image');
        }

        return (new ArticleContentResource($articleContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ArticleContent $articleContent)
    {
        abort_if(Gate::denies('article_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleContentResource($articleContent->load(['categories']));
    }

    public function update(UpdateArticleContentRequest $request, ArticleContent $articleContent)
    {
        $articleContent->update($request->all());
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

        return (new ArticleContentResource($articleContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ArticleContent $articleContent)
    {
        abort_if(Gate::denies('article_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
