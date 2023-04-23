<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Tax;
use Illuminate\Http\Request;
use Str;
use Session;
class TaxController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::all();
        return view('backend.taxes.index',compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.taxes.manage');
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
            'name'=>'required|unique:taxes|min:3'
        ]);
        Tax::create($data);

        return redirect()->route('backend.tax.index')
            ->with('msg', __('app.crud.added',['attribute'=>'Tax']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        return view('backend.taxes.manage',compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        $data = $request->validate([
            'name'=>'required|min:3|unique:taxes,name,'.$request->input('id')
        ]);

        $tax->update($data);

        return redirect()->route('backend.tax.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Tax']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        $tax->delete();

        return redirect()->route('backend.tax.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Tax']));
    }

    public function status(Request $request){
        $tax = Tax::find($request->id);
        $tax->status = $request->status;
        $tax->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }

}
