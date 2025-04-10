<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Section;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\DataTableCollectionResource;

class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category_show|category_create|category_edit|category_delete', ['only' => ['index','show']]);
         $this->middleware('permission:category_add', ['only' => ['create','store']]);
         $this->middleware('permission:category_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('backend.categories.index');
    }

    public function getTableData(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column');
        $orderByDir = $request->input('dir');
        $searchValue = $request->input('search');

        $data = Category::query()->with(['section' , 'parent_category' , 'sub_categories'])
            ->where(function ($query) use ($searchValue) {
                $query->where("categories.name", "LIKE", "%$searchValue%");
            });


        $data = $data->orderBy($orderBy, $orderByDir)->paginate($length, 'categories.*');

        return new DataTableCollectionResource($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = [];

        $sections = Section::query()
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->get();

        $categories = Category::query()
                ->with('sub_categories')
                ->where(['parent_id' => 0])
                ->get();

        return view('backend.categories.manage', compact('sections', 'categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('image')) {
            $image = $request->file('image')
                ->store('uploads/categories', 'public');
            $data['image'] = $image;
        }
        if ($request->hasfile('icon')) {
            $icon = $request->file('icon')
                ->store('uploads/categories', 'public');
            $data['icon'] = $icon;
        }
        Category::create($data);

        return redirect()
                ->route('backend.category.index')
                ->with('msg', __('app.crud.added',['attribute'=>'Brand']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $sections = Section::query()
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->get();

        $categories = Category::query()
                ->with('sub_categories')
                ->where(['parent_id' => 0])
                ->get();

        $getCategories = Category::query()
                ->with('sub_categories')
                ->where([
                    'section_id' => $category->section_id,
                    'parent_id' => 0, 'status' => 1
                ])
                ->get();
        return view('backend.categories.manage', compact('categories', 'sections', 'category', 'getCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();

        if ($request->hasfile('image')) {
            $image = $request->file('image')
                    ->store('uploads/categories', 'public');
            $data['image'] = $image;
        }
        if ($request->hasfile('icon')) {
            $icon = $request->file('icon')
                    ->store('uploads/categories', 'public');
            $data['icon'] = $icon;
        }

        $category->update($data);

        return redirect()->route('backend.category.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Ctegory']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Delete Category image from category_images folder if exists
        if (!empty($category->image)) {
            if (\Storage::disk('public')->exists($category->image)) {
                \Storage::disk('public')->delete($category->image);
            }
        }
        if (!empty($category->icon)) {
            if (\Storage::disk('public')->exists($category->icon)) {
                \Storage::disk('public')->delete($category->icon);
            }
        }
        $category->delete();

        return js_response(null , __('app.crud.deleted',['attribute'=>'Category']));
    }

    public function status(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
        return \Response::json(['status' => true, 'msg' => "__('app.crud.updated')"], 200);
    }

    public function appendCategories(Request $request)
    {
        $getCategories = Category::query()
                ->with('sub_categories')
                ->where([
                    'section_id' => $request->section_id,
                    'parent_id' => 0, 'status' => 1
                ])
                ->get();
        return view('backend.categories.append_category_level', compact('getCategories'));
    }
}
