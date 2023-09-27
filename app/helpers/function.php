<?php
use App\Models\Cart;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductVarient;
use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

function price($price)
{
    $currency = Currency::find(1);
    return $currency->symbol . ' ' . round($price * $currency->exchange_rate_def);
}

function js_product($id, $set_varient = 0)
{
    $product = collect(Product::with(['category', 'section', 'varients', 'images','tabs', 'discount'])->find($id))->toArray();

    if ($product['type'] == 'varient') {
        if ($set_varient > 0) {
            $varient = Arr::where($product['varients'],
                function ($varient, $value) use($set_varient) {
                    return ($varient['id'] == $set_varient);
                });
        } 
        else {
            $varient = Arr::where($product['varients'],
                function ($varient, $value) {
                    return ($varient['display'] == 1);
                });
        } 
    } 
    else {
        $varient = Arr::where($product['varients'],
        function ($varient, $value) {
            return ($varient['product_id'] == $product['id']);
        });
    } 

    $product['varient'] = head($varient);
    
    $product['unit_price'] = $product['varient']['price'];
    $product['unit_mrp'] = $product['varient']['mrp'];
    $product['selected_varients'] = $product['varient']['attribute_ids'];

    $product['combinations'] = varients($product['varients']);
    

    return $product;
}

function varients($varients)
{ 
    $combinations = [];
    $attribute_ids = collect($varients)->pluck('attribute_ids')->toArray();

    $attribute_ids= array_unique(call_user_func_array('array_merge', $attribute_ids));

    foreach($attribute_ids as $attribute_id){
        
        $attribute =  Attribute::find($attribute_id);
        
        if($attribute){
            $combinations[$attribute->attribute_set->name][$attribute->id]= $attribute->name;
        }
    }
    
    return $combinations ?? [];
}

function uuid()
{
    return Str::uuid()->toString();
}

function js_response($result = null, $message = '', $success = true, $status_code = 200): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'success' => $success,
        'result' => $result,
        'message' => $message,
    ], $status_code);
}

function js_cart()
{
    if (auth()->check()) {
        $cart_items = collect(Cart::query()->where('user_id', auth()->id())->latest()->get())->toArray();
    } else {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            foreach ($cart as $product_id => $items) {
                foreach ($items as $varient_id => $qty) {
                    $cart_items[] = [
                        'id' => json_encode([$product_id,$varient_id]),
                        'product_id' => $product_id,
                        'product_varient_id' => $varient_id,
                        'qty' => $qty,
                        'single_item_total' => $qty * js_product($product_id)['unit_price'],
                    ];
                }
            }
        }
    }
    return $cart_items ?? [];
}

function js_setting($key)
{
    $setting = Setting::query()->where('key', $key)->first();
    return $setting->value;
}

function js_cart_cost_calculate()
{
    $cost = [];
    $sub_total = 0;
    $cart_items = Cart::query()->where('user_id', auth()->id())->get();

    if (count($cart_items) > 0) {
        foreach ($cart_items as $key => $cart_item) {
            $product = js_product($cart_item->product_id, $cart_item->product_varient_id);
            $sub_total = $sub_total + $product['unit_price'] * $cart_item->qty;
        }
    }
    $cost['sub_total'] = $sub_total;
    $cost['coupon'] = session()->get('coupon');
    $cost['total'] = $sub_total;
    return $cost;
}

function js_countries()
{
    return Country::all() ?? [];
}
