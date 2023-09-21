<?php

namespace App\Http\Requests;

use App\Models\Selling;
use Illuminate\Support\Facades\Gate;
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
            'status' => [
                'required',
            ],
        ];
    }
}
