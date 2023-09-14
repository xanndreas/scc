<?php

namespace App\Http\Requests;

use App\Models\PurchasingDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchasingDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchasing_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchasing_details,id',
        ];
    }
}
