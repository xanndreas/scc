<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offer_create');
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
                'date_format:' . config('panel.date_format'),
            ],
            'offering_number' => [
                'string',
                'required',
            ],
        ];
    }
}
