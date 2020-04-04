<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'hotel_id' => 'required|exists:tr_hotels,id_hotel',
            'room_type_id' => 'required|exists:tr_room_types,id_room_type',
            'name' => 'required|string|min:6',
            'price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'hotel_id.required' => 'Please select hotel!',
            'room_type_id.required' => 'Please select type!',
            'name.required' => 'Name is required!',
            'price.required' => 'Price must be added!'
        ];
    }
}
