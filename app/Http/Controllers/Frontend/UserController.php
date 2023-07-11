<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('frontend.user.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $data  = $this->validate($request,[
            'fname'=>'required|min:3',
            'lname'=>'required|min:3',
            'profile'=>'nullable|mimes:jpg,jpeg,png',
            'mobile_number'=>'required|numeric',
        ]);
        
        if($request->hasfile('profile')){
            $profile =$request->file('profile')->store( 'uploads/user', 'public');
            $data['profile'] = $profile;
        }

        $user = User::find(auth()->id());
        
        $user = $user->update($data);
        
        return redirect()->back()->with('message', __('app.crud.updated',['attribute'=>'Profile']));
    }

    public function orderHistory()
    {
        return view('frontend.user.order-history');
    }

}
