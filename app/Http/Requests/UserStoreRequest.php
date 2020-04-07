<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => 'required|min:4|string|unique:ms_users,username',
            'telp' => 'required|integer',
            'email' => 'required|email|unique:ms_users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required|exists:ms_levels,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please input name!',
            'username.required' => 'Please input username!',
            'telp.required' => 'Please insert phone number!',
            'email.required' => 'Please input email!',
            'password.required' => 'Please check password!',
            'roles.required' => 'Please select level!'
        ];
    }
}
