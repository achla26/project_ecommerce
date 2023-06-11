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

function js_response($result = null, $message = '', $success = true, $status_code = 200): \Illuminate\Http\JsonResponse {
    return response()->json([
        'success' => $success,
        'result' => $result,
        'message' => $message
    ], $status_code);
}