<?php

namespace App\Http\Requests;

use App\Models\SellingDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSellingDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('selling_detail_create');
    }

    public function rules()
    {
        return [
            'subtotal' => [
                'required',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
