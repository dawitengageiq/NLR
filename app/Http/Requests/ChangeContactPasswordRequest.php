<?php

namespace App\Http\Requests;
use Input;
use App\User;
use App\Http\Requests\Request;
use Auth;
use Validator;
use Session;

      
class ChangeContactPasswordRequest extends Request
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
        Validator::extend('old_password_match', function($attribute, $value, $parameters) {

            $userEmail = Auth::user()->email;
            $oldPassword = $value;

            //$status=Auth::once(['email' => $userEmail, 'password' => $oldPassword]);

            if(Auth::once(['email' => $userEmail, 'password' => $oldPassword]))
            {
                //Do nothing                
            }else
            {                

                  $counter = Session::get('changePasswordAttempt');                  

                  if ($counter>=2)
                  {
                    Session::put('changePasswordAttempt', 0);                      
                    //echo "Checker Counter". $counter;
                    //echo '{"redirect":["userlogout"]}';
                    //User will be logout....

                  }else
                  {
                    Session::put('changePasswordAttempt', $counter+1);    
                  }                
            }

            
            return Auth::once(['email' => $userEmail, 'password' => $oldPassword]);            
        });

        return [
            'old_password' => 'required|old_password_match',
            'password' => 'required|confirmed|min:5'
        ];
    }

    public function messages()
    {
        return [
            'old_password.old_password_match' => 'Old password that you have provided did not match to the current password. <div id="attempt" style=visibility:hidden>'.Session::get('changePasswordAttempt').'</div>'
        ];
    }
    
}
