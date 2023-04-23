<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\AttributeSet;
use Illuminate\Http\Request;
use Str;
use Session;
class AttributeSetController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribute_sets = AttributeSet::all();
        return view('backend.attribute_sets.index',compact('attribute_sets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute_sets.manage');
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
            'name'=>'required|unique:attribute_sets|min:3',
        ]);
        $data['slug'] =Str::slug($request->name, '_');
        AttributeSet::create($data);

        return redirect()->route('backend.attribute-set.index')
            ->with('msg', __('app.crud.added',['attribute'=>'Attribute Set']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeSet  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeSet $attribute_set)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeSet  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeSet $attribute_set)
    {
        return view('backend.attribute_sets.manage',compact('attribute_set'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeSet  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeSet $attribute_set)
    {
        $data = $request->validate([
            'name'=>'required|min:3|unique:attribute_sets,name,'.$request->input('id'),
        ]);

        $data['slug'] =Str::slug($request->name, '_');

        $attribute_set->update($data);

        return redirect()->route('backend.attribute-set.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Attribute Set']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeSet  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeSet $attribute_set)
    {
        $attribute_set->delete();

        return redirect()->route('backend.attribute-set.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Attribute Set']));
    }

    public function status(Request $request){
        $attribute_set = AttributeSet::find($request->id);
        $attribute_set->status = $request->status;
        $attribute_set->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }

}
