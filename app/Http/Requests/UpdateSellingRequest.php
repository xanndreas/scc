<?php

namespace App\Http\Requests;

use App\Models\Selling;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSellingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('selling_edit');
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
            'customer_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'selling_details.*' => [
                'integer',
            ],
            'selling_details' => [
                'required',
                'array',
            ],
            'selling_transaction_number' => [
                'string',
                'required',
            ],
        ];
    }
}
