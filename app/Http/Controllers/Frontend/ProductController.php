<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 

use App\Models\Product;
use App\Models\ProductVarient;
use Illuminate\Http\Request;
class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $set_attribute = [];
        $set_varient ='';
        $product = Product::where('slug',$slug)->firstOrFail();

        if(!empty($set_attribute)) {
            $attribute =json_encode($set_attribute);

            $set_varient = ProductVarient::query()->where('product_id',$product->id)->where('attribute_id',$attribute)->first('id');
            echo $set_varient = $set_varient->id;
        }
        return view('frontend.product.index',compact('product' ,'set_varient'));
    }

    public function varient(Request $request){

        $options =  array_map('intval', $request->options);

        $varient  = ProductVarient::query()->where('product_id',$request->product_id)->whereJsonContains('attribute_ids' ,$options)->first(); 
        if($varient){
            $product = js_product($request->product_id , $varient->id);
            return js_response($product);
        }

        return js_response(null , '', false);
    }
}