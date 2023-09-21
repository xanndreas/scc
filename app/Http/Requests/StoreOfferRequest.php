<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Illuminate\Support\Facades\Gate;
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
            'offer_details' => [
                'required',
                'array',
            ],
        ];
    }
}
