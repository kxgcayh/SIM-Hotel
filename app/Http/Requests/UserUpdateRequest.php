<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'username' => 'required|min:4|string',
            'telp' => 'required|integer',
            'email' => 'required|email',
            'password' => 'nullable|same:confirm-password',
            'roles' => 'required|exists:ms_levels,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please input name!',
            'username.required' => 'Please input username!',
            'email.required' => 'Please input email!',
            'roles.required' => 'Please select level!'
        ];
    }
}
