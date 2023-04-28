<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\Country;
use Illuminate\Http\Request;
use Str;
use Session;
class CountryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:country_show|country_create|country_edit|country_delete', ['only' => ['index','show']]);
         $this->middleware('permission:country_add', ['only' => ['create','store']]);
         $this->middleware('permission:country_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:country_delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('backend.countries.index',compact('countries'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.countries.manage');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([ 
            'name'=>'required|unique:countries|min:3',
            'code'=>'required',
        ]);
        Country::create($data);
     
        return redirect()->route('backend.country.index')
                        ->with('success_msg',__('app.added'));
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
          
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('backend.countries.manage',compact('country'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $data = $request->validate([ 
            'name'=>'required|min:3|unique:countries,name,'.$request->input('id'),
            'code'=>'required',
        ]);

        $country->update($data);
    
        return redirect()->route('backend.country.index')
                        ->with('success_msg',__('app.updated'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
    
        return redirect()->route('backend.country.index')
                        ->with('success_msg',__('app.deleted'));
    }

    public function status(Request $request){
        $country = Country::find($request->id);
        $country->status = $request->status;
        $country->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }
    
}