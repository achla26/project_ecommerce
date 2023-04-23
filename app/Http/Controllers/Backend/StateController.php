<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Str;
use Session;
class StateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        return view('backend.states.index',compact('states'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('backend.states.manage',compact('countries'));
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
            'name'=>'required|unique:states|min:3',
            'country_id'=>"required"
        ]);
        
        State::create($data);
     
        return redirect()->route('backend.state.index')
                        ->with('success_msg',__('app.added'));
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
          
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('backend.states.manage',compact('state','countries'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $data = $request->validate([ 
            'name'=>'required|min:3|unique:states,name,'.$request->input('id'), 
            'country_id'=>"required"
        ]);
        
        $state->update($data);
    
        return redirect()->route('backend.state.index')
                        ->with('success_msg',__('app.updated'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
    
        return redirect()->route('backend.state.index')
                        ->with('success_msg',__('app.deleted'));
    }

    public function status(Request $request){
        $state = State::find($request->id);
        $state->status = $request->status;
        $state->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }
    
}