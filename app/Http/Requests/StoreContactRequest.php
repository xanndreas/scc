<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_create');
    }

    public function rules()
    {
        return [
            'address' => [
                'string',
                'required',
            ],
            'address_2' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'pos_code' => [
                'string',
                'required',
            ],
            'npwp' => [
                'string',
                'nullable',
            ],
        ];
    }
}
