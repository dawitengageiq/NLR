<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;
// use Log;

class BugReportRequest extends Request
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
        $rules = [
            'summary'       => 'required|max:500',
            'description'   => 'required'
        ];

        // $inputs = Input::all();
        $inputs = $this->all();
        // Log::info($inputs);
        $list_of_files = Input::get('list_of_files');
        $files = $inputs['bug_evidence_files'];
        // if(($key = array_search('', $files)) !== false) {
        //     unset($files[$key]);
        // }
        // Log::info($files);

        if($list_of_files != '') {
            $list_of_files = json_decode($list_of_files);
            $c = 0;
            foreach($files as $file) {
                $rules['bug_evidence_files.' . $c++] = 'max:2000';
            }
        }
        // $nbr = count($this->input('bug_evidence_files')) - 1;
        // Log::info($nbr);
        // foreach(range(0, $nbr) as $index) {
        //     $rules['bug_evidence_files.' . $index] = 'max:2000';
        // }

        return $rules;
    }
}
