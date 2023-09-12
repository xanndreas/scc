<?php

namespace App\Http\Requests;

use App\Models\ArticleContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateArticleContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_content_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'featured_image' => [
                'array',
                'required',
            ],
            'featured_image.*' => [
                'required',
            ],
            'page_text' => [
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
        ];
    }
}