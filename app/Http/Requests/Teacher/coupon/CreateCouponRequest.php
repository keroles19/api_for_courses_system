<?php

namespace App\Http\Requests\Teacher\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CreateCouponRequest extends FormRequest
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
            'code'=>'required|max:20|unique:coupons,code',
            'start_date'=>'required',
            'end_date'=>'required',
            'timer'=>'required|max:10',
            'cource_id'=>'required|exists:courses,id',
        ];
    }
}
