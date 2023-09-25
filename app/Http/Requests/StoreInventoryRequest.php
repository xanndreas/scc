<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StoreInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inventory_create');
    }

    public function rules()
    {
        return [
            'notes' => [
                'string',
                'required',
            ],
            'types' => [
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
