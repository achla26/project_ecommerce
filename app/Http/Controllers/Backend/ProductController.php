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
use App\Models\ProductTab;
use App\Models\ProductVarient;
use App\Models\ProductVarientImage;
use App\Http\Requests\ProductRequest;
use Auth;


use App\Interfaces\ProductInterface;
use App\Services\ProductService;


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
    public function store(ProductRequest $request )
    {
        $data = $request->all();
 
        $product = Product::create([
            'type' => $data['type'],
            'name'=> $data['name'], 
            'section_id' =>$data['section_id'],
            'category_id' => $data['category_id'],
            'brand_id'=>$data['brand_id'],
            'unit'=>$data['unit'], 
            'max_purchase_qty'=>$data['max_purchase_qty'],
            'min_purchase_qty'=>$data['min_purchase_qty'],
            'barcode'=>$data['barcode'],
            'short_desc'=>$data['short_desc'],
            'video_link'=>$data['video_link'],
            'meta_title'=>$data['meta_title'],
            'meta_description'=>$data['meta_description'],
            'external_link'=>$data['external_link'],
            'external_link_btn'=>$data['external_link_btn'],
            'qty_warning'=>$data['qty_warning'],
            'tax_id'=>$data['tax_id'],
        ]);

        if(isset($request->pdf) && !empty($request->pdf) && $request->hasfile('pdf')){
            $data['pdf'] = $request->file('pdf')->store('uploads/products', 'public');
        } 

        
        foreach ($request->tabs['name'] as  $key => $tabData) {   
            $product->tabs()->create([
                'name' => $request->tabs['name'][$key],
                'description' => $request->tabs['description'][$key], 
            ]);  
        }
       
        if($request->images){
            foreach($request->images['name'] as $key => $image){
                    $product->images()->create([
                        'name'=>$image->store( 'uploads/products', 'public'),
                        'main' => $request->images['main'][$key] ?? 0, 
                    ]);  
                
            }
        }

        if($data['type'] == 'simple'){
            $product_varient = $product->varients()->create([
                'price'=>$request->unit_price,
                'mrp'=>$request->unit_mrp,
                'qty'=>$request->qty ?? 1,
                'sku'=>$request->sku,  
            ]); 
        }

        if($data['type'] == 'varient'){
            if(isset($request->varient) && !empty($request->varient)){
                foreach($request->varient['attribute_id']  as $key => $attribute_id){ 
 
                    $product_varient = $product->varients()->create([
                        'price'=>$request->varient['price'][$key],
                        'mrp'=>$request->varient['mrp'][$key],
                        'qty'=>$request->varient['qty'][$key],
                        'sku'=>$request->varient['sku'][$key],
                        'attribute_ids'=> $attribute_id , 
                        'attribute_set_ids'=>json_encode(array_map('intval', $request->attribute_set_ids)), 
                    ]); 
                }   
            }       
        }
 
        if($request->is_discount == 'yes'){
            $product_discount = $product->discount()->create([
                'category'=>$request->discount_category,
                'value'=>$request->discount_value,
                'type'=>$request->discount_type, 
                'start_dttm'=>$request->discount_start_dttm,
                'end_dttm'=>$request->discount_end_dttm
            ]);                
        }
       

       return redirect()->route('backend.product.index')
                        ->with('success',__('app.added'));
                        
    }

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

    public function update(Request $request, Product $product){
        $data = $request->all();
 
        $product->update([
            'type' => $data['type'],
            'name'=> $data['name'], 
            'section_id' =>$data['section_id'],
            'category_id' => $data['category_id'],
            'brand_id'=>$data['brand_id'],
            'unit'=>$data['unit'], 
            'max_purchase_qty'=>$data['max_purchase_qty'],
            'min_purchase_qty'=>$data['min_purchase_qty'],
            'barcode'=>$data['barcode'],
            'short_desc'=>$data['short_desc'],
            'video_link'=>$data['video_link'],
            'meta_title'=>$data['meta_title'],
            'meta_description'=>$data['meta_description'],
            'external_link'=>$data['external_link'],
            'external_link_btn'=>$data['external_link_btn'],
            'qty_warning'=>$data['qty_warning'],
            'tax_id'=>$data['tax_id'],
        ]);

        if(isset($request->pdf) && !empty($request->pdf) && $request->hasfile('pdf')){
            $data['pdf'] = $request->file('pdf')->store('uploads/products', 'public');
        } 

        $product->varients()->delete();
        $product->tabs()->delete();
        $product->discount()->delete();

        
        foreach ($request->tabs['name'] ?? [] as  $key => $tabData) {   
            $product->tabs()->create([
                'name' => $request->tabs['name'][$key],
                'description' => $request->tabs['description'][$key], 
            ]);  
        }
       
        if($request->images){
            foreach($request->images['name'] as $key => $image){
                    $product->images()->create([
                        'name'=>$image->store( 'uploads/products', 'public'),
                        'main' => $request->images['main'][$key] ?? 0, 
                    ]);  
            }
        }

        if($data['type'] == 'simple'){
            $product_varient = $product->varients()->create([
                'price'=>$request->unit_price,
                'mrp'=>$request->unit_mrp,
                'qty'=>$request->qty ?? 1,
                'sku'=>$request->sku,  
            ]); 
        }

        if($data['type'] == 'varient'){
            if(isset($request->varient) && !empty($request->varient)){
                foreach($request->varient['attribute_id']  as $key => $attribute_id){ 
 
                    $product_varient = $product->varients()->create([
                        'price'=>$request->varient['price'][$key],
                        'mrp'=>$request->varient['mrp'][$key],
                        'qty'=>$request->varient['qty'][$key],
                        'sku'=>$request->varient['sku'][$key],
                        'attribute_ids'=> $attribute_id , 
                        'attribute_set_ids'=>json_encode(array_map('intval', $request->attribute_set_ids)), 
                    ]); 
                }   
            }       
        }
 
        if($request->is_discount == 'yes'){
            $product_discount = $product->discount()->create([
                'category'=>$request->discount_category,
                'value'=>$request->discount_value,
                'type'=>$request->discount_type, 
                'start_dttm'=>$request->discount_start_dttm,
                'end_dttm'=>$request->discount_end_dttm
            ]);               
        }

        return redirect()->route('backend.product.index')->with('success',__('app.updated'));
 
    }

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
    
    public function getVarients(Request $request){ 
        $data = $request->all(); 
        $html = "";
        if(isset($data['attributes']) && !empty($data['attributes'])){
            $attributes = AttributeSet::query()->whereIn('id' ,  $data['attributes'])->get(); 
            if($attributes){
                foreach ($attributes as $attribute)
                {
                    $varients = \App\Models\Attribute::query()
                        ->where('attribute_set_id', $attribute->id)
                        ->get();
                        if($varients){
                            $html .=view('components.backend.varients',compact('attribute' , 'varients'));
                        }
                }
            }
        }
        return $html;
    }


    public function getCombinations(Request $request){ 
        $varients =Attribute::query()->whereIn('id',$request->varients)->get();
        $price = $request->price;
        $mrp = $request->mrp;
        $sku = $request->sku;
        $qty = $request->qty;

        foreach ($varients as $key => $varient) {
            $options[$varient->attribute_set_id][] = $varient->id; 
        }

        $combos = $this->array_cartesian_product($options);  
        return view('components.backend.combination',compact('combos' ,'mrp','qty','price','sku'));
    }

    function array_cartesian_product($arrays=[] ) {
        $result = array();
        $arrays = array_values($arrays);
        $sizeIn = sizeof($arrays);
        $size = $sizeIn > 0 ? 1 : 0;
        foreach ($arrays as $array){
            if(is_array($array)){
                $size = $size * sizeof($array);
            }
            
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

    public function appendAccordionDiv(Request $request){
        $counter = rand(0000,9999);
        return view('components.backend.accordion-item',compact('counter'));
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

    public function removeAccordion(ProductTab $accordion){
        $product_id = $accordion->product_id;
    
        $accordion->delete();
    
        return redirect()->route('backend.product.edit',$product_id)
                        ->with('success_msg',__('app.deleted'));
    }
}


// Usage:
// $controller = new ProductController();
// $service = new ProductService();
// $controller->makePayment($service);