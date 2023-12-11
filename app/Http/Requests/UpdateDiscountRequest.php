<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discount_edit');
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
                'required',
            ],
            'quota' => [
                'required',
            ],
        ];
    }
}
