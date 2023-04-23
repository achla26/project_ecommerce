<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->input('id');
        return [
            'coupon_option'=>'required',
            'coupon_code'=>"required_if:coupon_option,==,manual",
            'categories' => 'nullable',
            'users' => 'nullable',
            'coupon_type' => 'required',
            'amount_type' => 'required|numeric',
            'amount' => 'required|numeric',
            'expiry_date' => 'required',
        ];
    }
}
