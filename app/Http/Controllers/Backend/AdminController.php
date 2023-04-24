<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();

        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'Email is required',
            'email.email' => 'Valid Email is required',
            'password.required' => 'Password is required',
        ];

        $this->validate($request,$rules,$customMessages);

        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']]) || Auth::guard('user')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect()->route('backend.dashboard');
        }else{
            Session::flash('error_message','Invalid Email or Password');
            return redirect()->back()->withErrors(__('app.errors.denied'));
        }
    }

    public function updatePassword(){
        $result = Admin::find(1);
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
    	Auth::guard('admin')->logout();
    	return redirect()
                ->route('backend.login')
                ->with('msg',__('app.msg.logout'));
    }
}
