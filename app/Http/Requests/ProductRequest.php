<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=> $id ? 'required|min:3'.$id : 'required|min:3',
            'images.*'=>"required",
            'section_id' => 'required',
            'category_id' => 'nullable',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'brand'=>'nullable',
            'model'=>'nullable',
            'short_desc'=>'required',
            'long_desc'=>'nullable',
            'technical_specification'=>'nullable',
            'uses'=>'nullable',
            'warranty'=>'nullable',
            'lead_time'=>'nullable',
            'is_refundable'=>'nullable',
            'is_promo'=>'nullable',
            'is_featured'=>'nullable',
            'is_discount'=>'nullable',
            'is_trending'=>'nullable',

            'terms'=>'nullable',
            'reward_point'=>'nullable',
            'reward_expiry'=>'nullable',
            'barcode'=>'nullable',
            'max_purchase_qty'=>'required',
            'pdf'=>'nullable',

            'qty_warning'=>'nullable',
            'stock_visibility_state'=>'nullable',
            'cod'=>'nullable',
            'estimate_shipping_day'=>'nullable',
            'external_link'=>'nullable',
            'external_link_btn'=>'nullable',
            'unit'=>'nullable',
            'video_link'=>'nullable',

            'thumbnail'=>'nullable',
            'added_by'=>'nullable',
            'role'=>'nullable',
            'unit_price'=>'required',
            'unit_mrp'=>'required',
            
            'deal'=>'nullable',
            'label'=>'nullable',
            'current_stock'=>'nullable',
            'todays_deal'=>'nullable',

            'meta_title'=>'nullable',
            'meta_description'=>'nullable',
            'meta_keywords'=>'nullable',
            'shipping_type'=>'nullable',
            'flat_shipping_cost'=>'nullable',

        ];
    }
}
