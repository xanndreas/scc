<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOfferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offer_edit');
    }

    public function rules()
    {
        return [
            'supplier_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'grand_total' => [
                'required',
            ],
            'offer_details.*' => [
                'integer',
            ],
            'offer_details' => [
                'required',
                'array',
            ],
            'offering_expired_date' => [
                'required',
                'date_format:' . 'Y-m-d H:i:s',
            ],
            'offering_number' => [
                'string',
                'required',
            ],
        ];
    }
}
