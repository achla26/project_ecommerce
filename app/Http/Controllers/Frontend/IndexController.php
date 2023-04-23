<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 

use App\Models\Slider;
use App\Models\Section;
use Illuminate\Http\Request;
class IndexController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::query()
            ->where('status','active')
            ->latest()
            ->get();
        
        $sections = Section::query()
            ->where('status','active')
            ->latest()
            ->get();
        return view('frontend.index',compact('sliders','sections'));
    }
}