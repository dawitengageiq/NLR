<?php

namespace App\Http\Requests;

class AddUserRequest extends Request
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
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role_id' => 'required',
            'mobile_number' => 'numeric',
            'phone_number' => 'numeric',
            'password' => 'required|confirmed|min:5',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email is already taken as a user or as a affiliate/advertiser contact.',
        ];
    }
}
