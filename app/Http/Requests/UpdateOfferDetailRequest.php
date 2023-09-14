<?php

namespace App\Http\Requests;

use App\Models\OfferDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOfferDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offer_detail_edit');
    }

    public function rules()
    {
        return [
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price_offer' => [
                'required',
            ],
            'price_deal' => [
                'required',
            ],
            'supply_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
