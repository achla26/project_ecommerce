<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;
use Str;
use Session;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:banner_show|banner_create|banner_edit|banner_delete', ['only' => ['index','show']]);
         $this->middleware('permission:banner_add', ['only' => ['create','store']]);
         $this->middleware('permission:banner_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:banner_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banners.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('icon')) {
            $icon = $request->file('icon')->store('uploads/banners', 'public');
            $data['icon'] = $icon;
        }
        if ($request->hasfile('image')) {
            $image = $request->file('image')->store('uploads/banners', 'public');
            $data['image'] = $image;
        }

        Banner::create($data);

        return redirect()->route('backend.banner.index')
            ->with('msg', __('app.crud.added',['attribute'=>'Banner']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banners.manage', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $data = $request->all();

        if ($request->hasfile('image')) {
            $image = $request->file('image')->store('uploads/banners', 'public');
            $data['image'] = $image;
        }

        $banner->update($data);

        return redirect()->route('backend.banner.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Banner']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        // Delete Category image from category_images folder if exists
        if (!empty($banner->image)) {
            if (\Storage::disk('public')->exists($banner->image)) {
                \Storage::disk('public')->delete($banner->image);
            }
        }
        $banner->delete();

        return redirect()->route('backend.banner.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Banner']));
    }

    public function status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->status = $request->status;
        $banner->save();
        return \Response::json(['status' => true, 'msg' => "__('app.crud.updated',['attribute'=>'Banner'])"], 200);
    }
}
