<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\User;
use Illuminate\Http\Request;
use Str;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.users.manage',compact('users'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] =  Hash::make(Str::random(10));
        User::create($data);
     
        return redirect()->route('backend.user.index')
                        ->with('success_msg',__('app.added'));
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
          
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.manage',compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $data['categories'] = json_encode($request->categories) ?? '';
        $user->update($data);
    
        return redirect()->route('backend.user.index')
                        ->with('success_msg',__('app.updated'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('backend.user.index')
                        ->with('success_msg',__('app.deleted'));
    }

    public function status(Request $request){
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }
    
}