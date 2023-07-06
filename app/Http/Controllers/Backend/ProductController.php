<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\Product;
use Illuminate\Http\Request;
use Str;
use Session;
use App\Models\AttributeSet;
use App\Models\Attribute;
use App\Models\Section;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductTax;
use App\Models\Tax;
use App\Models\ProductDiscount;
use App\Models\Setting;
use App\Models\ProductImage;
use App\Models\ProductVarient;
use App\Models\ProductVarientImage;
use App\Http\Requests\ProductRequest;
use Auth;
class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product_show|product_create|product_edit|product_delete', ['only' => ['index','show']]);
         $this->middleware('permission:product_add', ['only' => ['create','store']]);
         $this->middleware('permission:product_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product_delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = [];
        $sections = Section::all();
        $brands = Brand::all();
        $attributes = Attribute::all();
        $attribute_sets = AttributeSet::all();
        $categories = Category::all()->sortByDesc("id");
        $taxes = Tax::all();
        return view('backend.products.manage',compact('attributes','attribute_sets','sections','categories','brands','taxes','product'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if(isset($request->images) && !empty($request->images) && $request->hasfile('images')){
            $images= $request->images;
        }
        if(isset($request->varient_attribute_id) && !empty($request->varient_attribute_id)){
            $varient_attribute_id= $request->varient_attribute_id;
        }
        if(isset($request->varient_price) && !empty($request->varient_price)){
            $varient_price= $request->varient_price;
        }
        if(isset($request->varient_mrp) && !empty($request->varient_mrp)){
            $varient_mrp= $request->varient_mrp;
        }
        if(isset($request->varient_sku) && !empty($request->varient_sku)){
            $varient_sku= $request->varient_sku;
        }
        if(isset($request->varient_qty) && !empty($request->varient_qty)){
            $varient_qty= $request->varient_qty;
        }
        if(isset($request->tax_value) && !empty($request->tax_value)){
            $tax_value= $request->tax_value;
        }
        if(isset($request->tax_type) && !empty($request->tax_type)){
            $tax_type= $request->tax_type;
        }
        if(isset($request->tax_id) && !empty($request->tax_id)){
            $tax_id= $request->tax_id;
        }
        if(isset($request->varient_image) && !empty($request->varient_image) && $request->hasfile('varient_image')){
            $varient_image= $request->varient_image;
        }
        if($request->is_discount == 'yes'){
            $discount_category = $request->discount_category;
            $discount_value = $request->discount_value;
            $discount_type = $request->discount_type;
            $discount_start_dttm = $request->discount_start_dttm;
            $discount_end_dttm = $request->discount_end_dttm;
        }
        
        $data = $request->except('images','attribute_set_id','tax_value','tax_id','tax_type','discount','varient_attribute_id','varient_price','varient_mrp','varient_sku','varient_qty','varient_image','attribute_id','discount_category','discount_value','discount_type','discount_start_dttm','discount_end_dttm');

        $data['slug'] =Str::slug($request->name, '_');
        $data['added_by'] =Auth::user()->id;
        $data['role'] =Auth::user()->getRoleNames()->first();

        if(isset($request->thumbnail) && !empty($request->thumbnail) && $request->hasfile('thumbnail')){
            $thumbnail =$request->file('thumbnail')->store('uploads/products', 'public');
            $data['thumbnail'] = $thumbnail;
        } 
        if(isset($request->pdf) && !empty($request->pdf) && $request->hasfile('pdf')){
            $pdf =$request->file('pdf')->store('uploads/products', 'public');
            $data['pdf'] = $pdf;
        } 
        $product = Product::create($data);
        
        if(isset($images) && !empty($images)){
            foreach($images as $key => $image){
                ProductImage::create([
                    'name'=>$image->store( 'uploads/products', 'public'),
                    'product_id'=>$product->id,
                    'main'=>$request->main[$key],
                ]);
            }            
        }    
        if(isset($varient_attribute_id) && !empty($varient_attribute_id)){
            foreach($varient_attribute_id  as $key => $attribute_id){
                $attribute_id = explode('-',$attribute_id);
                $product_varient = ProductVarient::create([
                    'price'=>$varient_price[$key],
                    'mrp'=>$varient_mrp[$key],
                    'qty'=>$varient_qty[$key],
                    'sku'=>$varient_sku[$key],
                    'attribute_id'=> json_encode($attribute_id),
                    'product_id'=>$product->id
                ]); 
                if(!empty($varient_image)){
                    ProductVarientImage::create([
                        'name'=>$varient_image->store( 'uploads/products', 'public'),
                        'product_id'=>$product->id,
                        'product_varient_id'=>$product_varient->id
                    ]);
                }
            }   
        }       
        if(isset($tax_value) && !empty($tax_value)){
            foreach($tax_value  as $key => $tax){
                if(!empty($tax_value[$key])){
                    $product_tax = ProductTax::create([
                        'tax_id'=>$tax_id[$key],
                        'value'=>$tax_value[$key],
                        'type'=>$tax_type[$key],
                        'product_id'=>$product->id
                    ]);
                }    
            }   
        }
        if($request->is_discount == 'yes'){
            $product_discount = ProductDiscount::create([
                'category'=>$discount_category,
                'value'=>$discount_value,
                'type'=>$discount_type,
                'product_id'=>$product->id,
                'start_dttm'=>$discount_start_dttm,
                'end_dttm'=>$discount_end_dttm
            ]);                
        }
     
       return redirect()->route('backend.product.index')
                        ->with('success',__('app.added'));
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
          
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $sections = Section::all();
        $brands = Brand::all();
        $attributes = Attribute::all();
        $attribute_sets = AttributeSet::all();
        $categories = Category::all()->sortByDesc("id");
        $taxes = Tax::all();
        $product_images = ProductImage::where('product_id',$product->id)->get();
        $product_varients = ProductVarient::where('product_id',$product->id)->get();
        $getCategories = Category::with('sub_categories')->where(['section_id'=>$product->section_id,'parent_id'=>0,'status'=>1])->get();
        return view('backend.products.manage',compact('product','attributes','attribute_sets','sections','categories','brands','taxes','getCategories','product_images','product_varients'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(isset($request->images) && !empty($request->images) && $request->hasfile('images')){
            $images= $request->images;
        }
        if(isset($request->varient_attribute_id) && !empty($request->varient_attribute_id)){
            $varient_attribute_id= $request->varient_attribute_id;
        }
        if(isset($request->varient_price) && !empty($request->varient_price)){
            $varient_price= $request->varient_price;
        }
        if(isset($request->varient_mrp) && !empty($request->varient_mrp)){
            $varient_mrp= $request->varient_mrp;
        }
        if(isset($request->varient_sku) && !empty($request->varient_sku)){
            $varient_sku= $request->varient_sku;
        }
        if(isset($request->varient_qty) && !empty($request->varient_qty)){
            $varient_qty= $request->varient_qty;
        }
        if(isset($request->tax_value) && !empty($request->tax_value)){
            $tax_value= $request->tax_value;
        }
        if(isset($request->tax_type) && !empty($request->tax_type)){
            $tax_type= $request->tax_type;
        }
        if(isset($request->tax_id) && !empty($request->tax_id)){
            $tax_id= $request->tax_id;
        }
        if(isset($request->varient_image) && !empty($request->varient_image) && $request->hasfile('varient_image')){
            $varient_image= $request->varient_image;
        }
        if($request->is_discount == 'yes'){
            $discount_category = $request->discount_category;
            $discount_value = $request->discount_value;
            $discount_type = $request->discount_type;
            $discount_start_dttm = $request->discount_start_dttm;
            $discount_end_dttm = $request->discount_end_dttm;
        }
        
        $data = $request->except('images','attribute_set_id','tax_value','tax_id','tax_type','discount','varient_attribute_id','varient_price','varient_mrp','varient_sku','varient_qty','varient_image','attribute_id','discount_category','discount_value','discount_type','discount_start_dttm','discount_end_dttm','main');

        $data['slug'] =Str::slug($request->name, '_');
        
        if(isset($request->thumbnail) && !empty($request->thumbnail) && $request->hasfile('thumbnail')){
            $thumbnail =$request->file('thumbnail')->store('uploads/products', 'public');
            $data['thumbnail'] = $thumbnail;
        } 
    
        if(isset($request->pdf) && !empty($request->pdf) && $request->hasfile('pdf')){
            $pdf =$request->file('pdf')->store('uploads/products', 'public');
            $data['pdf'] = $pdf;
        } 
        $product->update($data);
    
        if(isset($images) && !empty($images)){
            foreach($images as $key => $image){
                ProductImage::create([
                    'name'=>$image->store( 'uploads/products', 'public'),
                    'product_id'=>$product->id,
                    'main'=>$request->main[$key],
                ]);
            }            
        }    
        if(isset($varient_attribute_id) && !empty($varient_attribute_id)){
            foreach($varient_attribute_id  as $key => $attribute_id){
                $attribute_id = explode('-',$attribute_id);
                array_pop($attribute_id);
                $product_varient = ProductVarient::create([
                    'price'=>$varient_price[$key],
                    'mrp'=>$varient_mrp[$key],
                    'qty'=>$varient_qty[$key],
                    'sku'=>$varient_sku[$key],
                    'attribute_id'=> json_encode($attribute_id),
                    'product_id'=>$product->id
                ]); 
                if(!empty($varient_image)){
                    ProductImage::create([
                        'name'=>$varient_image->store( 'uploads/products', 'public'),
                        'product_id'=>$product->id,
                        'product_varient_id'=>$product_varient->id
                    ]);
                }
            }   
        }      

        
        return redirect()->route('backend.product.index')
                        ->with('success',__('app.updated'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete Category image from category_images folder if exists
        if (!empty($product->thumbnail) && \Storage::disk('public')->exists($product->thumbnail)){
            \Storage::disk('public')->delete($path);
        }
        $product->delete();
    
        return redirect()->route('backend.product.index')
                        ->with('success',__('app.deleted'));
    }

    public function status(Request $request){
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }
    

    public function combination(Request $request){
        
        $attributes = $request->attribute_id;
        $combos = $this->array_cartesian_product($attributes);

        $price = $request->unit_price;
        $mrp = $request->unit_mrp;
        return view('components.backend.combination',compact('combos','price','mrp'));
    }

    public function array_cartesian_product($arrays)
    {
        $result = array();
        $arrays = array_values($arrays);
        $sizeIn = sizeof($arrays);
        $size = $sizeIn > 0 ? 1 : 0;
        foreach ($arrays as $array){
            $size = $size * sizeof($array);
            for ($i = 0; $i < $size; $i ++)
            {
                $result[$i] = array();
                for ($j = 0; $j < $sizeIn; $j ++)
                    array_push($result[$i], current($arrays[$j]));
                for ($j = ($sizeIn -1); $j >= 0; $j --)
                {
                    if (next($arrays[$j]))
                        break;
                    elseif (isset ($arrays[$j]))
                        reset($arrays[$j]);
                }
            }
        }
        return $result;
    }

    public function appendCategories(Request $request){
        $getCategories = Category::with('sub_categories')->where(['section_id'=>$request->section_id,'parent_id'=>0,'status'=>1])->get();
        return view('backend.products.append_product_category',compact('getCategories'));
    }

    public function appendImageDiv(Request $request){
        $counter = rand(0000,9999);
        return view('components.backend.product_images',compact('counter'));
    }

    public function removeImage(ProductImage $image){
        $product_id = $image->product_id;
        // Delete Category image from category_images folder if exists
        if(!empty($image->image)){
            if (\Storage::disk('public')->exists($category->image)){
                \Storage::disk('public')->delete($category->image);
            }
        }
        $image->delete();
    
        return redirect()->route('backend.product.edit',$product_id)
                        ->with('success_msg',__('app.deleted'));
    }

    public function removeVarient(ProductVarient $varient){
        $product_id = $varient->product_id;
    
        $varient->delete();
    
        return redirect()->route('backend.product.edit',$product_id)
                        ->with('success_msg',__('app.deleted'));
    }
}