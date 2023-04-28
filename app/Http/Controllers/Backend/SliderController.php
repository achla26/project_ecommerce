<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;
use Str;
use Session;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:slider_show|slider_create|slider_edit|slider_delete', ['only' => ['index','show']]);
         $this->middleware('permission:slider_add', ['only' => ['create','store']]);
         $this->middleware('permission:slider_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:slider_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('icon')) {
            $icon = $request->file('icon')->store('uploads/sliders', 'public');
            $data['icon'] = $icon;
        }
        if ($request->hasfile('image')) {
            $image = $request->file('image')->store('uploads/sliders', 'public');
            $data['image'] = $image;
        }

        Slider::create($data);

        return redirect()->route('backend.slider.index')
            ->with('msg', __('app.crud.added',['attribute'=>'Slider']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.manage', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->all();

        if ($request->hasfile('image')) {
            $image = $request->file('image')->store('uploads/sliders', 'public');
            $data['image'] = $image;
        }

        $slider->update($data);

        return redirect()->route('backend.slider.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Slider']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        // Delete Category image from category_images folder if exists
        if (!empty($slider->image)) {
            if (\Storage::disk('public')->exists($slider->image)) {
                \Storage::disk('public')->delete($slider->image);
            }
        }
        $slider->delete();

        return redirect()->route('backend.slider.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Slider']));
    }

    public function status(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->status = $request->status;
        $slider->save();
        return \Response::json(['status' => true, 'msg' => "__('app.crud.updated',['attribute'=>'Slider'])"], 200);
    }
}
