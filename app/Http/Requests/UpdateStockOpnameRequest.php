<?php

namespace App\Http\Requests;

use App\Models\StockOpname;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStockOpnameRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_opname_edit');
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
