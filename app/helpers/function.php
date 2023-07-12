<?php
use App\Models\Category;
use App\Models\Currency;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Setting;
use App\Models\ProductVarient;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


function price($price){
    $currency = Currency::find(1);
    return $currency->symbol .' '.round($price * $currency->exchange_rate_def);
}

function js_product($id , $set_varient=0){
    $product = collect(Product::with(['category', 'section', 'varients', 'images' , 'discount'])->find($id))->toArray();  
    
    if(count(varients($id)) > 0){
    foreach($product['varients'] as $varient) {
        if($set_varient > 0 && $set_varient == $varient['id']){
            $product['unit_price'] = $varient['price'];
            $product['unit_mrp'] = $varient['mrp'];
            $product['qty'] = $varient['qty'];
            $product['sku'] = $varient['sku'];
            $product['varient_id'] = $varient['id'];
            $product['selected_varients'] = json_decode($varient['attribute_id']);

            break;
        }
        else{
            if($varient['display'] == 1){
                $product['unit_price'] = $varient['price'];
                $product['unit_mrp'] = $varient['mrp'];
                $product['qty'] = $varient['qty'];
                $product['sku'] = $varient['sku'];
                $product['varient_id'] = $varient['id'];
                $product['selected_varients'] = json_decode($varient['attribute_id']);

                break;
            }
        }            
    }
        $product['combinations'] =varients($id);
    }
    else{
        $product['varient_id'] =0;
    }
    return $product;
}

function varients($product_id){
    $attributes = $varient_data =[];
    $varients = ProductVarient::query()->where('product_id',$product_id)->get();
    if(!empty($varients)){
        foreach(collect($varients)->pluck('attribute_id')->toArray() as $varient){
            $attributes[] = json_decode($varient);
        }
        $attributes= array_unique(call_user_func_array('array_merge', $attributes));
        
        foreach($attributes as $attribute){
            $attribute =  Attribute::find($attribute);
            if($attribute){
                $varient_data[$attribute->attribute_set->name][$attribute->id]= $attribute->name;
            }
            
        }
     return $varient_data;
    }
}

function uuid(){
    return Str::uuid()->toString();
}


function js_response($result = null, $message = '', $success = true, $status_code = 200): \Illuminate\Http\JsonResponse {
    return response()->json([
        'success' => $success,
        'result' => $result,
        'message' => $message
    ], $status_code);
}

function js_cart(){
    if(auth()->check()){
        $cart_items = collect(Cart::query()->where('user_id',auth()->id())->latest()->get())->toArray();
    }   
    else{
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $product_id => $items) {           
                foreach($items as $varient_id => $qty){
                    $cart_items[] = [
                        'id' => $product_id.'-'.$varient_id,
                        'product_id'  => $product_id,
                        'product_varient_id'  => $varient_id,
                        'qty'  => $qty,
                        'single_item_total' => $qty * js_product($product_id)['unit_price']
                    ];
                }
            }
        }
    }
    return $cart_items ?? [];
}

function js_setting($key){
    $setting =  Setting::query()->where('key',$key)->first();
    return $setting->value;
}


function js_cart_cost_calculate(){
    $cost = [];
    $sub_total =0;
    $cart_items = Cart::query()->where('user_id',auth()->id())->get();

    if(count($cart_items) > 0){
        foreach ($cart_items as $key => $cart_item) {
            $product = js_product($cart_item->product_id , $cart_item->product_varient_id);
            $sub_total = $sub_total+$product['unit_price'] * $cart_item->qty;
        }
    }
    $cost['sub_total'] =$sub_total;
    $cost['total'] =$sub_total;
    return $cost;
}