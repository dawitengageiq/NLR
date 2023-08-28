<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateContactInfoRequest extends Request
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
            'title' => 'required',
            'first_name' => 'required',            
            'last_name' => 'required',
            'gender' => 'required',                        
            'email' => 'required|email',
            'address' => 'required',
            'position' => 'required',
            'mobile_number' => 'numeric',
            'phone_number' => 'numeric',            
        ];
    }
}
