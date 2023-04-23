<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name'=> $id ? 'required|min:3|unique:cities,name,'.$id : 'required|unique:cities|min:3',
            'country_id'=>'required',
            'state_id'=>'required',
            'cost'=>'required',
        ];
    }
}
