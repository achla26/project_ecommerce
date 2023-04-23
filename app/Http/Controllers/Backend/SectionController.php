<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Section;
use Illuminate\Http\Request;
use Str;
use Session;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('backend.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sections.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('icon')) {
            $icon = $request->file('icon')->store('uploads/sections', 'public');
            $data['icon'] = $icon;
        }
        if ($request->hasfile('image')) {
            $image = $request->file('image')->store('uploads/sections', 'public');
            $data['image'] = $image;
        }

        Section::create($data);

        return redirect()->route('backend.sections.index')
            ->with('msg', __('app.crud.added',['attribute'=>'Section']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('backend.sections.manage', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        $data = $request->all();

        if ($request->hasfile('icon')) {
            $icon = $request->file('icon')->store('uploads/sections', 'public');
            $data['icon'] = $icon;
        }
        if ($request->hasfile('image')) {
            $image = $request->file('image')->store('uploads/sections', 'public');
            $data['image'] = $image;
        }

        $section->update($data);

        return redirect()->route('backend.sections.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Section']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        // Delete Category image from category_images folder if exists
        if (!empty($section->image)) {
            if (\Storage::disk('public')->exists($section->image)) {
                \Storage::disk('public')->delete($section->image);
            }
        }
        if (!empty($section->icon)) {
            if (\Storage::disk('public')->exists($section->icon)) {
                \Storage::disk('public')->delete($section->icon);
            }
        }

        $section->delete();

        return redirect()->route('backend.sections.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Section']));
    }

    public function status(Request $request)
    {
        $section = Section::find($request->id);
        $section->status = $request->status;
        $section->save();
        return \Response::json(['status' => true, 'msg' => "__('app.crud.updated',['attribute'=>'Section'])"], 200);
    }
}
