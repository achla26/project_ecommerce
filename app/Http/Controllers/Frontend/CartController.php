<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class CartController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carts = js_cart();
        return view('frontend.cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.carts.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (session()->has('cart')) {
        //     if(session()->has("cart.$request->product_id.$request->varient_id")){
        //         $qty = session()->get("cart.$request->product_id.$request->varient_id");
        //         $qty = $qty+$request->qty;
        //         session()->put("cart.$request->product_id.$request->varient_id" , $qty);
        //     }else{
        //         session()->put("cart.$request->product_id.$request->varient_id" , $request->qty);
        //     }
        // }
        // else{
        //     session()->put("cart.$request->product_id.$request->varient_id" , $request->qty);
        // }

        // dd(session()->get('cart'));

        if(auth()->check()){
            Cart::updateOrCreate([
                'product_id'=>$request->product_id,
                'product_varient_id'=>$request->varient_id,
                'user_id'=>auth()->id()
            ],
            ['qty'=>$request->qty]);
        }
        else{
            if (session()->has('cart')) {
                if(!empty(session()->get('cart')))
                {
                    $cart = session()->get('cart');
                    foreach ($cart as $item) {
                        if(isset($cart[$request->product_id][$request->varient_id])){
                            $cart[$request->product_id][$request->varient_id] = $cart[$request->product_id][$request->varient_id]+$request->qty;
                        }else{
                            $cart[$request->product_id][$request->varient_id] = (int)$request->qty;
                        }                
                    }           
                } 
                else{
                    $cart[$request->product_id][$request->varient_id] = (int)$request->qty;       
                }
            }
            else{
                $cart[$request->product_id][$request->varient_id] = (int)$request->qty;       
            }
            
            session()->put('cart',$cart);
            $cart  = session()->get('cart');
            $data['total_items'] = count($cart);
            $data['side_cart'] = view('components.frontend.side-cart')->render(); 

        }

         return js_response($data,__('app.cart.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('backend.carts.manage',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        if(auth()->check()){
            $cart = Cart::find($id);
            $cart->delete();
        }
        else{
            if(session()->has('cart')){
                $id = explode('-' ,$id);
                session()->forget("cart.$id[0]");
            }
        }
        $data['total_items'] = count(session()->get('cart'));
        $data['side_cart'] = view('components.frontend.side-cart')->render(); 
        
        return js_response($data,__('app.cart.deleted'));
    }
}
