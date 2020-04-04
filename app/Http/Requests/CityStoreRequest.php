<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province_id' => 'required|exists:ms_provinces,id_province',
            'name' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'province_id.required' => 'Please select province!',
            'name.required' => 'Name is required!'
        ];
    }
}
