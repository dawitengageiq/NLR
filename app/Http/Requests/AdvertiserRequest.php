<?php

namespace App\Http\Requests;
use Validator;
use App\Http\Requests\Request;

class AdvertiserRequest extends Request
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
        Validator::extend('filter_validate_url', function($attribute, $value, $parameters) { 
            if(preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$value)){
              return true;
            }
            else{
                return false;
            }
        });

        return [
            'company'       => 'required|max:100',
            'website_url'   => 'required|filter_validate_url',
            'phone'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address'       => 'required',
            'city'          => 'required',
            'state'         => 'required|alpha|max:2',
            'zip'           => 'required|numeric|min:5',            
            'status'        => 'required'            
        ];
    }

    public function messages()
    {
        return [
            'website_url.filter_validate_url'  =>   'Website url should be valid.',
        ];
    }
}
