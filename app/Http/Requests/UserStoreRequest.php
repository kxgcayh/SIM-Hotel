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
            'username' => 'required|max:8|string|unique:ms_users,username',
            'telp' => 'required|number|min:11|max:15',
            'email' => 'required|email|unique:ms_users,email',
            'password' => 'required|same:confirm-password',
            'levels' => 'required|exists:ms_levels,id'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'required|string',
            'username' => 'required|max:8|string|unique:ms_users,username',
            'email' => 'required|email|unique:ms_users,email',
            'password' => 'required|same:confirm-password',
            'levels' => 'required|exists:ms_levels,id'
        ];
    }
}
