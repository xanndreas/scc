<?php

namespace App\Http\Requests;

use App\Models\SellingDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySellingDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('selling_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:selling_details,id',
        ];
    }
}
