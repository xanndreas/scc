<?php

namespace App\Http\Requests;

use App\Models\Purchasing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchasingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchasing_edit');
    }

    public function rules()
    {
        return [
            'batch_code' => [
                'string',
                'required',
            ],
            'grand_total' => [
                'required',
            ],
            'notes' => [
                'string',
                'nullable',
            ],
            'supplier_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'purchasing_details.*' => [
                'integer',
            ],
            'purchasing_details' => [
                'required',
                'array',
            ],
            'purchasing_transaction_number' => [
                'string',
                'required',
            ],
        ];
    }
}
