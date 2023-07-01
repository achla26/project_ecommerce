<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Cart;
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
        if(auth()->check()){
            $carts = Cart::query()
            ->where('user_id',auth()->user()->id)
            ->orWhere('ip',$request->ip())
            ->get();
        }
        else{
            $carts = Cart::query()->where('ip',$request->ip())->get();
        }
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
        if (session()->has('cart')) {
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
        session()->put('cart',$cart);
        
        if(auth()->check()){
            if (session()->has('cart')) {
                Cart::updateOrCreate([
                    'product_id'=>$request->product_id,
                    'product_varient_id'=>$request->varient_id,
                    'user_id'=>auth()->id()
                ],
                ['qty'=>$request->qty,]);
            }
        }
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
        $data = $request->validate([
            'name'=>'required|min:3|unique:carts,name,'.$request->input('id'),
            'image'=>"mimes:jpeg,jpg,png"
        ]);


        if($request->hasfile('image')){
            $image =$request->file('image')->store( 'uploads/carts', 'public');
            $data['image'] = $image;
        }

        $cart->update($data);

        return redirect()->route('backend.cart.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Cart']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if (!empty($cart->image)) {
            if (\Storage::disk('public')->exists($cart->image)) {
                \Storage::disk('public')->delete($cart->image);
            }
        }
        $cart->delete();

        return redirect()->route('backend.cart.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Cart']));
    }

}
