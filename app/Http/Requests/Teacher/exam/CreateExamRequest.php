<?php

namespace App\Http\Requests\Teacher\exam;

use Illuminate\Foundation\Http\FormRequest;

class CreateExamRequest extends FormRequest
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
            'code'=>'required|max:20|unique:exames,code',
            'course_id'=>'required|exists:courses,id',
            'url'=>'required',
        ];
    }
}
