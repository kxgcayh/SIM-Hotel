<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'facility_id' => 'required|exists:ms_room_facilities,id_facility',
            'name' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'facility_id.required' => 'Please select facility!',
            'name.required' => 'Name is required!'
        ];
    }
}
