<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'stock_minimum' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price_buy' => [
                'required',
            ],
            'price_sell' => [
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'featured_image' => [
                'array',
            ],
            'product_code' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
