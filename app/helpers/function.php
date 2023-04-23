<?php

use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
function price($price){
    $currency = Currency::find(1);
    return $currency->symbol .' '.round($price * $currency->exchange_rate_def);
}

function detail($id , $set_varient=""){
    $product = collect(Product::with(['category', 'section', 'varients', 'images' , 'discount'])->find($id))->toArray();  

    
    $product['varient_id'] =0;
    if($product['varients']) {
        foreach($product['varients'] as $varient) {
            if(!empty($set_varient) && $set_varient == $varient['id']){
                $product['unit_price'] = $varient['price'];
                $product['unit_mrp'] = $varient['mrp'];
                $product['qty'] = $varient['qty'];
                $product['sku'] = $varient['sku'];
                $product['varient_id'] = $varient['id'];
            }
            else{
                if($varient['display'] == 1){
                    $product['unit_price'] = $varient['price'];
                    $product['unit_mrp'] = $varient['mrp'];
                    $product['qty'] = $varient['qty'];
                    $product['sku'] = $varient['sku'];
                    $product['varient_id'] = $varient['id'];
                }
            }            
        }
        
        foreach(collect($product['varients'])->where('id',$product['varient_id'])->pluck('attribute_id','display')->toArray() as $varient){
            $attributes[] = json_decode($varient);
        }

        $attributes= array_unique(call_user_func_array('array_merge', $attributes));
       
        foreach($attributes as $attribute){
            $attribute =  Attribute::find($attribute);
            $product['display_varient'][$attribute->attribute_set->name]= $attribute->id;
        }
    }
    if($product['is_discount'] == "yes") {
        $product['discount_price'] = $product['unit_mrp'] - $product['unit_price'];
        $product['discount_percentage'] = round(($product['discount_price']/$product['unit_mrp']) * 100);

        if($product['discount']['type'] == "flat") {
            $product['discount_show'] = price($product['discount_price']).' off';
        }
        else {
            $product['discount_show'] = $product['discount_percentage'].'% off';
        }
        
        if($product['discount']['category'] == 'time_bound') {
            $cur_time = strtotime(date('Y-m-d H:i:s'));

            if(!($cur_time >= strtotime($product['discount']['start_dttm']) && $cur_time <= strtotime($product['discount']['end_dttm'])))
            {
                $product['unit_price'] = $product['unit_mrp'];
                $product['unit_mrp'] = "";
            }  
        }
    }
    else{
        $product['unit_price'] = $product['unit_mrp'] ;
        $product['unit_mrp'] = "";
    }
    
    
    return $product;
}

function uuid(){
    return Str::uuid()->toString();
}

function addToCart($slug ="" ){

}

function encode($data){
    return Crypt::encryptString($data);
}

function decode($data){
    return Crypt::decryptString($data);
}