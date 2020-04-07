<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required', 'min:6', 'string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!'
        ];
    }
}
