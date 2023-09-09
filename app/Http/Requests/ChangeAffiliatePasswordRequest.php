<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeAffiliatePasswordRequest extends FormRequest
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
        Validator::extend('existing_password_match', function ($attribute, $value, $parameters) {

            $userEmail = Auth::user()->email;

            return Auth::once(['email' => $userEmail, 'password' => $value]);
        });

        return [
            'existing_password' => 'required|old_password_match',
            'password' => 'required|confirmed|min:5',
        ];
    }
}
