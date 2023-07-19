<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class AjaxController extends Controller
{
    public function getStates(Request $request){
        $states = State::query()->where('country_id',$request->country_id)->get();
        return  view('components.common.states' , compact('states'));
    }

    public function getCities(Request $request){
        $cities = City::query()->where(['country_id' => $request->country_id , 'state_id' => $request->state_id])->get();
        return  view('components.common.cities' , compact('cities'));
    }
}
