<?php

namespace App\Http\Requests\Teacher\course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourceRequest extends FormRequest
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
           'name'=>'required|max:20',
            'url'=>'required',
             'photo'=>'max:7',
             'stage_id'=>'required|exists:stages,id'
        ];
    }
}
