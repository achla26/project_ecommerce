<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=> $id ? 'required|min:3|unique:categories,name,'.$id : 'required|unique:categories|min:3',
            'slug'=>'nullable',
            'image'=> $id ? "nullable|mimes:jpeg,jpg,png" : 'required|mimes:jpeg,jpg,png',
            'icon'=> $id ? "nullable|mimes:jpeg,jpg,png" : 'required|mimes:jpeg,jpg,png',
            'section_id' => 'required',
            'parent_id' => 'required',
            'discount' => 'nullable',
            'parent_id' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ];
    }
}
