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
            'type' => 'required|string|in:simple,varient',
            'name'=> $id ? 'required|string|min:3'.$id : 'required|string|min:3',
            'slug' => "nullable|string|slugify|unique:products,slug,$id",
            'section_id' => 'required',
            'category_id' => 'nullable',
            'brand_id'=>'nullable',    
            'unit'=>'nullable',  
            'max_purchase_qty'=>'required',
            'min_purchase_qty'=>'required',  
            'barcode'=>'nullable',
            'short_desc'=>'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
             
            'tabs.*name' => 'nullable|string',
            'tabs.*description' => 'nullable|string', 
            // 'tabs.*.product.status' => 'required|string|in:published,unpublished',

            'images.*name' => 'nullable|string',
            'images.*main' => 'nullable|string', 
            'video_link'=>'nullable',
            'pdf'=>'nullable',

            'external_link'=>'nullable',
            'external_link_btn'=>'nullable',
            'qty_warning'=>'nullable|numeric',

            

            // 'reward_point'=>'nullable',
            // 'reward_expiry'=>'nullable',
            

            // 'is_refundable'=>'nullable',
            // 'is_promo'=>'nullable',
            // 'is_featured'=>'nullable',
            // 'is_discount'=>'nullable',
            // 'is_trending'=>'nullable',
            
            
            
            

           
            // 'stock_visibility_state'=>'nullable',
            // 'cod'=>'nullable',
            // 'estimate_shipping_day'=>'nullable',
            
            
      
            // 'unit_price'=>'required',
            // 'unit_mrp'=>'required',
            // 'deal'=>'nullable',
            // 'label'=>'nullable',
            // 'current_stock'=>'nullable',
            // 'todays_deal'=>'nullable',

            
            // 'shipping_type'=>'nullable',
            // 'flat_shipping_cost'=>'nullable',

            'tax_id' => 'nullable',

        ];
    }
}
