<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $types = Address::ADDRESS_TYPES;
        $get_types = Address::query()->where('user_id',auth()->id())->get('type') ?? '';
        if(!empty($get_types)){
            $get_types = collect($get_types)->pluck('type')->toArray(); 
        }
        return view('frontend.user.address.manage' , compact('countries' , 'get_types' ,'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $data = $request->all();

        if(auth()->check()){
            $data['user_id'] = auth()->id();
            Address::create($data);
        }

        return redirect()->routr('user.address.index')->with('message',__('app.crud.added',['attribute'=>'Address']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $countries = Country::all();
        $states = State::query()->where('country_id' , $address->country_id)->get();
        $cities = City::query()->where('country_id' , $address->country_id)->where('state_id' , $address->state_id)->get();
        $countries = Country::all();
        return view('frontend.user.address.manage',compact('address','countries','states','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, Address $address)
    {
        $data = $request->all();
        if(auth()->check()){
            $address->update($data);
            return redirect()->back()->with('message',__('app.crud.updated',['attribute'=>'Address']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    { 
        $address->delete(); 
        return redirect()->back()->with('message',__('app.crud.deleted',['attribute'=>'Address'])); 
    }
}
