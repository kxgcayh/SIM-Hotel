<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelStoreRequest extends FormRequest
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
            'city_id' => 'required', 'exists:tr_cities,id_city',
            'name' => 'required', 'min:6', 'string',
            'address' => 'required', 'min:10', 'string',
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => 'Please select city!',
            'name.required' => 'Name is required!',
            'address.required' => 'Address is required!'
        ];
    }
}
