<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Attribute;
use App\Http\Requests\AttributeRequest;
use App\Models\Section;
use App\Models\AttributeSet;
class AttributeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('backend.attributes.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($attribute)
    {
        $attribute_set = AttributeSet::find($attribute);
        $attributes = Attribute::query()
                ->where('attribute_set_id',$attribute)
                ->get(['name','id']);
        return view('backend.attributes.manage',compact('attribute_set','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        foreach ($request->name as $key => $name) {
            Attribute::updateOrCreate([
                'name'   => $name,
                'attribute_set_id' => $request->attribute_set_id
            ]);
        }

        return redirect()->route('backend.attribute.create',$request->attribute_set_id)
            ->with('msg', __('app.crud.added',['attribute'=>'Attribute']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function appendAttributeValue()
    {
        $rand = rand(1000,9999);
        return view('components.backend.attribute-value',compact('rand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $sections = Section::all();
        $attribute_sets = AttributeSet::all();
        return view('backend.attributes.manage',compact('attribute','sections','attribute_sets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AttributeRequest  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {

        foreach ($request->name as $key => $name) {
            $data['name'] =$name;
            $data['price'] =$request->price[$key];
            $data['price_type'] =$request->price_type[$key];
            $data['attribute_set_id'] = $request->attribute_set_id;
        }

        $attribute->update($data);

        return redirect()->route('backend.attribute.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Attribute']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute_set
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attr_id = $attribute->attribute_set_id;
        $attribute->delete();

        return redirect()->route('backend.attribute.create',$attr_id)
            ->with('msg', __('app.crud.deleted',['attribute'=>'Attribute']));
    }

}
