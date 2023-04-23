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
    public function show($slug , $color="" , $size="")
    {
        $set_attribute = [];
        $set_varient ='';
        $product = Product::where('slug',$slug)->firstOrFail();

        if(!empty($color)) {
            $set_attribute[] = decode($color);
        }
        if(!empty($size)) {
            $set_attribute[] = decode($size);
        }
        if(!empty($set_attribute)) {
            $attribute =json_encode($set_attribute);

            $set_varient = ProductVarient::query()->where('product_id',$product->id)->where('attribute_id',$attribute)->first('id');
            $set_varient = $set_varient->id;
        }
        return view('frontend.product.index',compact('product' , 'color' , 'size' ,'set_varient'));
    }
}