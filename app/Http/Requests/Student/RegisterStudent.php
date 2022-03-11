<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudent extends FormRequest
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
            'name'=>'required|unique:students,name|max:10',
            'password'=>'required|confirmed|max:20|min:4',
            'phone'=>'max|20',
            'stage_id'=>'required|exists:stages,id',


        ];
    }
}
