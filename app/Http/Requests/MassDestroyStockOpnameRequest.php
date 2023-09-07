<?php

namespace App\Http\Requests;

use App\Models\StockOpname;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStockOpnameRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_opname_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stock_opnames,id',
        ];
    }
}
