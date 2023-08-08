<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $carts = js_cart();
        return view('frontend.checkout.index', compact('carts'));
    }

    public function show(CheckoutRequest $request)
    {

    } 
}
