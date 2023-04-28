<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only('email', 'password');
        $remember_me = $request->has('remember_me');

        if(Auth::attempt($user,$remember_me)){
            return redirect()->route('backend.dashboard');
        }else{
            return redirect()->back()->withErrors(__('app.errors.invalid'));
        }
    }

    public function updatePassword(){
        $result = User::find(1);
        $result->password = Hash::make('1234');
        $result->save();
        dd("update");
    }
    public function dashboard(){
        return view('backend.dashboard');
    }

    public function index(){
        return view('backend.login');
    }

    
    public function logout(){
    	Auth::logout();
    	return redirect()
                ->route('backend.login')
                ->with('msg',__('app.msg.logout'));
    }
}
