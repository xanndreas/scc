<?php

namespace App\Http\Requests;

use App\Models\PurchasingDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchasingDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchasing_detail_edit');
    }

    public function rules()
    {
        return [
            'subtotal' => [
                'required',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
