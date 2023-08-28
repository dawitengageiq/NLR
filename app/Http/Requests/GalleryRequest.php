<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;
use Input;
use Storage;
// use Log;

class GalleryRequest extends Request
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
        Validator::extend('image_exists', function($attribute, $value, $parameters) { 
            if(Input::get($parameters[1]) == 1) {
                $ext = Input::file($parameters[0])->getClientOriginalExtension();
                
            }else {
                $url = Input::get($parameters[0]);
                $ext = pathinfo($url, PATHINFO_EXTENSION);
            }
            $image = $value.'.'.$ext;
            $exists =  Storage::disk('public')->has('images/gallery/'.$image);
            // Log::info($image .' - '.$exists);
            if($exists == 1) return false;
            else return true;
        });

        Validator::extend('check_if_valid_image_url', function($attribute, $value, $parameters) { 
            if(Input::get($parameters[0]) == 1) {
               return true;
            }else {
                $curl = curl_init($value);    
                curl_setopt($curl, CURLOPT_NOBODY, true);
                curl_exec($curl);
                $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                if($code == 200){
                   $status = true;
                }else{
                  $status = false;
                }
                curl_close($curl);

                return $status;
            }
        });

        return [
            'name'         => 'required|image_exists:image,img_type',
            'image'        => 'required|check_if_valid_image_url:img_type',
            'img_type'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.image_exists'     =>  'Image already exists.',
            'image.check_if_valid_image_url' => 'Url is invalid.',
        ];
    }
}
