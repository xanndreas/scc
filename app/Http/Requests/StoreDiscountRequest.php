<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discount_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
            ],
            'code' => [
                'string',
                'required',
            ],
            'percentage' => [
                'integer',
                'required',
            ],
            'quota' => [
                'required',
            ],
        ];
    }
}
