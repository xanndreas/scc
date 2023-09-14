<?php

namespace App\Http\Requests;

use App\Models\OfferDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOfferDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('offer_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:offer_details,id',
        ];
    }
}
