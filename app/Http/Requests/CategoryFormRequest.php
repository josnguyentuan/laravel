<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
        $formRules = [
            "name" => [
                "required" ,
                Rule::unique('users')->ignore($this->id),
            ],
            "fileupload"=>[
                'mines:jpg,bmp,png',
            ]
        ];
        if ($this->id==null){
            $formRules['fileupload'][] = "required";
        }
        return $formRules;
    }


}
