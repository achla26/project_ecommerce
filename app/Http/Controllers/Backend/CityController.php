<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\City;
use Illuminate\Http\Request;
use Str;
use App\Models\State;
use App\Models\Country;
use Session;
use App\Http\Requests\CityRequest;
class CityController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('backend.cities.index',compact('cities'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $countries = Country::all();
        return view('backend.cities.manage',compact('states','countries'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $data = $request->all();
        City::create($data);
     
        return redirect()->route('backend.city.index')
                        ->with('success_msg',__('app.added'));
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
          
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(CityRequest $city)
    {
        $states = State::all();
        $countries = Country::all();
        return view('backend.cities.manage',compact('city','states','countries'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $data = $request->all();
        $city->update($data);
    
        return redirect()->route('backend.city.index')
                        ->with('success_msg',__('app.updated'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
    
        return redirect()->route('backend.city.index')
                        ->with('success_msg',__('app.deleted'));
    }

    public function status(Request $request){
        $city = City::find($request->id);
        $city->status = $request->status;
        $city->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }

    public function appendStates(Request $request){
        $getStates = State::where(['country_id'=>$request->country_id,'status'=>1])->get();
        return view('backend.cities.append_state',compact('getStates'));
    }
    
}