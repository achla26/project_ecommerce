<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;
use Str;
use Session;
class BrandController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:brand_show|brand_create|brand_edit|brand_delete', ['only' => ['index','show']]);
         $this->middleware('permission:brand_add', ['only' => ['create','store']]);
         $this->middleware('permission:brand_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:brand_delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|unique:brands|min:3',
            'image'=>"required|mimes:jpeg,jpg,png"
        ]);
        if($request->hasfile('image')){
            $image =$request->file('image')->store( 'uploads/brands', 'public');
            $data['image'] = $image;
        }
        Brand::create($data);

        return redirect()->route('backend.brand.index')
            ->with('msg', __('app.crud.added',['attribute'=>'Brand']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.manage',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name'=>'required|min:3|unique:brands,name,'.$request->input('id'),
            'image'=>"mimes:jpeg,jpg,png"
        ]);


        if($request->hasfile('image')){
            $image =$request->file('image')->store( 'uploads/brands', 'public');
            $data['image'] = $image;
        }

        $brand->update($data);

        return redirect()->route('backend.brand.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Brand']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (!empty($brand->image)) {
            if (\Storage::disk('public')->exists($brand->image)) {
                \Storage::disk('public')->delete($brand->image);
            }
        }
        $brand->delete();

        return redirect()->route('backend.brand.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Brand']));
    }

    public function status(Request $request){
        $brand = Brand::find($request->id);
        $brand->status = $request->status;
        $brand->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.crud.status')"], 200);
    }

}
