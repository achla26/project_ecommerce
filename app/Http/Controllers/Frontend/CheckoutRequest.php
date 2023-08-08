<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'type' => 'required',
            'address1' => 'required', 
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'province' => 'nullable',
            'postcode' => 'required',
            'address2'=>'nullable',
        ];
    }
}
