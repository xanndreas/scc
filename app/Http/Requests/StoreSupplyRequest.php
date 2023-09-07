<?php

namespace App\Http\Requests;

use App\Models\Supply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSupplyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('supply_create');
    }

    public function rules()
    {
        return [
            'quantity_needs' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'initial_price' => [
                'required',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
