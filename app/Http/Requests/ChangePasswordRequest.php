<?php

namespace App\Http\Requests;

use App\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ChangePasswordRequest extends FormRequest
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
        Validator::extend('old_password_match', function ($attribute, $value, $parameters) {

            $userEmail = Auth::user()->email;
            $oldPassword = $value;

            return Auth::once(['email' => $userEmail, 'password' => $oldPassword]);
        });

        return [
            'old_password' => 'required|old_password_match',
            'password' => 'required|confirmed|min:5',
        ];
    }

    public function messages()
    {
        return [
            'old_password.old_password_match' => 'Old password that you have provided did not match to the current password.',
        ];
    }
}
