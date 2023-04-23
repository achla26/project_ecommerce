<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title'=> 'required|min:3',
            'sub_title'=> 'required|min:3',
            'description'=> 'required|min:3',
            'btn_text'=> 'required|min:3',
            'btn_link'=> 'required|min:3',
            'image'=> $id ? "nullable|mimes:jpeg,jpg,png" : 'required|mimes:jpeg,jpg,png',
        ];
    }
}
