<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\User;
use Illuminate\Http\Request;
use Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

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
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.manage',compact('roles'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] =  Hash::make(Str::random(10));
        $user=User::create($data);
        $user->assignRole($request->input('roles'));
     
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('backend.users.manage',compact('user','roles','userRole'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        $user->update($data);

        $user->syncRoles($request->input('roles'));
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