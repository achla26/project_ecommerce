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

    public function orderHistory()
    {
        return view('frontend.user.order-history');
    }

}
