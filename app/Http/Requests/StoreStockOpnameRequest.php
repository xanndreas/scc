<?php

namespace App\Http\Requests;

use App\Models\StockOpname;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStockOpnameRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_opname_create');
    }

    public function rules()
    {
        return [
            'notes' => [
                'string',
                'nullable',
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
            'types' => [
                'required',
            ],
        ];
    }
}
