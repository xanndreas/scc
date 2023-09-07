<?php

namespace App\Http\Requests;

use App\Models\ArticleContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyArticleContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('article_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:article_contents,id',
        ];
    }
}
