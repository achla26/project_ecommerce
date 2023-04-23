@extends('backend.layout')
@section('title', 'Product')
@section('css')
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form id="form" method="post"
                action="{{ isset($product->id) ? route('backend.product.update', $product->id) : route('backend.product.store') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
                @if (isset($product->id))
                    @method('put')
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link active show" id="v-pills-info-tab" data-bs-toggle="pill"
                                                href="#v-pills-info" role="tab" aria-controls="v-pills-info"
                                                aria-selected="true">
                                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                <span class="d-none d-md-block">General</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                aria-selected="false">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Images</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                                href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                                aria-selected="false">
                                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Unit/Price</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-combination-tab" data-bs-toggle="pill"
                                                href="#v-pills-combination" role="tab"
                                                aria-controls="v-pills-combination" aria-selected="false">
                                                <i class="mdi mdi-combination-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Varients</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-desc-tab" data-bs-toggle="pill"
                                                href="#v-pills-desc" role="tab" aria-controls="v-pills-desc"
                                                aria-selected="false">
                                                <i class="mdi mdi-desc-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Description</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-seo-tab" data-bs-toggle="pill"
                                                href="#v-pills-seo" role="tab" aria-controls="v-pills-seo"
                                                aria-selected="false">
                                                <i class="mdi mdi-seo-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">SEO</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-other-tab" data-bs-toggle="pill"
                                                href="#v-pills-other" role="tab" aria-controls="v-pills-other"
                                                aria-selected="false">
                                                <i class="mdi mdi-other-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Other</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end col-->
                                    <div class="col-sm-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-pills-info" role="tabpanel"
                                                aria-labelledby="v-pills-info-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="box-title">Product Information</h3>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Product Name <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Product Name"
                                                                    value="{{ $product->name ?? old('name') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">SKU<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" id="sku"
                                                                    name="sku" placeholder="SKU"
                                                                    value="{{ $product->sku ?? old('sku') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Section <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-8">
                                                                <select name="section_id" id="section_id"
                                                                    class="form-control select2" style="width: 100%;">
                                                                    <option value="">Select</option>
                                                                    @foreach ($sections as $section)
                                                                        <option value="{{ $section->id }}"
                                                                            {{ isset($product->section_id) ? ($product->section_id == $section->id ? 'selected' : '') : '' }}>
                                                                            {{ $section->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Category<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-sm-8">
                                                                <div id="appendCategoriesLevel">
                                                                    @include('backend.products.append_product_category',
                                                                        $product)
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row" id="brand">
                                                            <label class="col-md-3 col-from-label">Brand</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" id="brand"
                                                                    name="brand">
                                                                    <option value="">-Select-</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Unit</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="unit"
                                                                    placeholder="Unit (e.g. KG, Pc etc)"
                                                                    value="{{ $product->unit ?? old('unit') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Minimum Purchase Qty
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control"
                                                                    name="max_purchase_qty"
                                                                    value="{{ $product->max_purchase_qty ?? old('max_purchase_qty') }}"
                                                                    min="1" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Barcode</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="barcode"
                                                                    placeholder="Barcode"
                                                                    value="{{ $product->value ?? old('value') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show" id="v-pills-desc" role="tabpanel"
                                                aria-labelledby="v-pills-desc-tab">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h3 class="box-title">Product Variation</h3>
                                                            <div class="form-group mb-3 row">
                                                                <label for="short_desc"
                                                                    class="col-sm-2 col-form-label ">Short
                                                                    Description</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Short Description">{{ $product->short_desc ?? old('short_desc') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <label for="long_desc"
                                                                    class="col-sm-2 col-form-label ">Long
                                                                    Description</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Long Description">{{ $product->long_desc ?? old('long_desc') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <label for="technical_specification"
                                                                    class="col-sm-2 col-form-label ">Technical
                                                                    Specification</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" id="technical_specification" name="technical_specification"
                                                                        placeholder="Long Description">{{ $product->technical_specification ?? old('technical_specification') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <label for="uses"
                                                                    class="col-sm-2 col-form-label ">Uses</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" id="uses" name="uses" placeholder="Uses">{{ $product->uses ?? old('uses') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <label for="warranty"
                                                                    class="col-sm-2 col-form-label ">Warranty</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" id="warranty" name="warranty" placeholder="Warranty">{{ $product->warranty ?? old('warranty') }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <label class="col-md-2 col-from-label">Tags <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-md-8">
                                                                    <input id="tags_1" type="text"
                                                                        class="tags form-control"
                                                                        value="{{ $product->keywords ?? old('keywords') }}"
                                                                        name="keywords" /></p>
                                                                    <small class="text-muted">This is used for search.
                                                                        Input those words by which cutomer can find this
                                                                        product.</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-form-label"
                                                                for="signinSrEmail">Gallery</label>
                                                        </div>
                                                        <div class="row" id="append_product_img_row">
                                                         @if (isset($product_images) && !empty($product_images) && (count($product_images)>0))
                                                            @foreach ($product_images as $image)
                                                               <x-backend.product_images image="{{$image->name}}"  id="product-preview-img{{$image->id}}" />
                                                            @endforeach     
                                                         @else
                                                            <x-backend.product_images id="product-preview-img"/>
                                                         @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-success btn-xs"
                                                                    id="add_product_img_div">Add</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-form-label"
                                                                for="signinSrEmail">Thumbnail Image
                                                                <small>(300x300)</small></label>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control"
                                                                    name="thumbnail" id="thumbnail"
                                                                    onchange="previewFile('#thumbnail','#previewImg2');">
                                                                <div class="file-preview box sm">
                                                                </div>
                                                                <small class="text-muted">This image is visible in all
                                                                    product box. Use 300x300 sizes image. Keep some blank
                                                                    space around main object of your image as we had to crop
                                                                    some edge in different devices to make it
                                                                    responsive.</small>
                                                                <br>
                                                                @if (isset($product->thumbnail) && !empty($product->thumbnail))
                                                                    <img id="previewImg2"
                                                                        src="{{ asset('storage/' . $product->thumbnail) }}"
                                                                        alt="Uploaded Image Preview Holder" width="150px"
                                                                        height="150px">
                                                                @else
                                                                    <img id="previewImg2"
                                                                        src="{{ asset('assets/placeholder.jpg') }}"
                                                                        alt="Uploaded Image Preview Holder" width="150px"
                                                                        height="150px">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Video Link</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="video_link"
                                                                    value="{{ $product->video_link ?? old('video_link') }}"
                                                                    placeholder="Video Link">
                                                                <small class="text-muted">Use proper link without extra
                                                                    parameter. Don't use short share link/embeded iframe
                                                                    code.</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="signinSrEmail">PDF
                                                            Specification</label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="pdf" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                                aria-labelledby="v-pills-settings-tab">
                                                <div class="row">
                                                    <h3 class="box-title">Product price + stock</h3>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-md-3 col-from-label">Unit price <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="number" min="0"
                                                                value="{{ $product->unit_price ?? old('unit_price') }}"
                                                                step="0.01" placeholder="Unit price" name="unit_price"
                                                                class="form-control" id="unit_price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-md-3 col-from-label">Unit Mrp <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-md-6">
                                                            <input type="number" id="unit_mrp" min="0"
                                                                value="{{ $product->unit_mrp ?? old('unit_mrp') }}"
                                                                step="0.01" placeholder="Unit Mrp" name="unit_mrp"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-md-3 col-from-label">
                                                            Set Point
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="number" min="0"
                                                                value="{{ $product->reward_point ?? old('reward_point') }}"
                                                                step="1" placeholder="1" name="reward_point"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div id="show-hide-div" style="display: none;">
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Quantity <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <input type="number" min="0"
                                                                    value="{{ $product->current_stock ?? old('current_stock') }}"
                                                                    step="1" placeholder="Quantity"
                                                                    name="current_stock" class="form-control"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-md-3 col-from-label">
                                                            External link
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" placeholder="External link"
                                                                value="{{ $product->external_link ?? old('external_link') }}"
                                                                name="external_link" class="form-control">
                                                            <small class="text-muted">Leave it blank if you do not use
                                                                external site link</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="col-md-3 col-from-label">
                                                            External link button text
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" placeholder="External link button text"
                                                                value="{{ $product->external_link_btn ?? old('external_link_btn') }}"
                                                                name="external_link_btn" class="form-control">
                                                            <small class="text-muted">Leave it blank if you do not use
                                                                external site link</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade  show" id="v-pills-combination" role="tabpanel"
                                                aria-labelledby="v-pills-combination-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="box-title">Product Attributes</h3>
                                                        @foreach ($attribute_sets as $attribute_set)
                                                            <div class="form-group mb-3 row gutters-5">
                                                                <div class="col-md-3">
                                                                    <p>{{ $attribute_set->name }}</p>
                                                                    <input type="hidden" class="form-control"
                                                                        name="attribute_set_id[]"
                                                                        value="{{ $attribute_set->id }}">
                                                                </div>
                                                                @php
                                                                    if(isset($product_varients)){
                                                                        $product_attribute=[] ;
                                                                        foreach(collect($product_varients)->pluck('attribute_id')->toArray() as $varient){
                                                                            $product_attribute[] = json_decode($varient);
                                                                        }
                                                                        $product_attribute= array_unique(call_user_func_array('array_merge', $product_attribute));
                                                                    }
                                                                @endphp
                                                                <div class="col-md-8">
                                                                    <select class="form-control  select-multi"
                                                                        multiple="multiple"
                                                                        name="attribute_id[{{ $attribute_set->id }}][]"
                                                                        style="width: 100%;"
                                                                        onchange="make_combinations()">
                                                                        <option value="">-Select-</option>
                                                                        @foreach (collect($attributes)->where('attribute_set_id', $attribute_set->id)->toArray() as $attribute)
                                                                            <option value="{{ $attribute['id'] }}" {{isset($product_attribute) && in_array($attribute['id'],$product_attribute) ? 'selected':''}}>
                                                                                {{ $attribute['name'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div>
                                                            <p>Choose the attributes of this product and then input values
                                                                of each attribute</p>
                                                            <br>
                                                        </div>
                                                        <div id="select_file"></div>
                                                        <div class="customer_choice_options" id="customer_choice_options">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <table
                                                            class="table table-bordered aiz-table footable footable-10 breakpoint-xl"
                                                            style="">
                                                            <thead>
                                                                <tr class="footable-header">
                                                                    <td class="text-center footable-first-visible"
                                                                        style="display: table-cell;">
                                                                        Variant
                                                                    </td>
                                                                    <td class="text-center" style="display: table-cell;">
                                                                        Variant Price
                                                                    </td>
                                                                    <td class="text-center" style="display: table-cell;">
                                                                        Variant Mrp
                                                                    </td>
                                                                    <td class="text-center" data-breakpoints="lg"
                                                                        style="display: table-cell;">
                                                                        SKU
                                                                    </td>
                                                                    <td class="text-center" data-breakpoints="lg"
                                                                        style="display: table-cell;">
                                                                        Quantity
                                                                    </td>
                                                                    <td class="text-center footable-last-visible"
                                                                        data-breakpoints="lg"
                                                                        style="display: table-cell;">
                                                                        Action
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="choice">
                                                                @if(isset($product_varients))
                                                                    <x-backend.combination
                                                                        :productVarients=$product_varients
                                                                        manage="1"
                                                                    />
                                                                    {{-- @foreach (collect($product_varients) as $product_varient)
                                                                        <tr id="variation_row_{{$product_varient->id}}">
                                                                            <td>
                                                                                @foreach (json_decode($product_varient->attribute_id) as $item)
                                                                                    @php
                                                                                        $attribute = \App\Models\Attribute::find($item);
                                                                                        echo $attribute->name;
                                                                                    @endphp
                                                                                @endforeach
                                                                            </td>
                                                                            <td>
                                                                                <input type="hidden"  name="varient_attribute_id[]"  min="0" step="0.01" class="form-control"  value="{{implode("-",json_decode($product_varient->attribute_id))}}">
                                                                                <input type="number"  name="varient_price[]"  min="0" step="0.01" class="form-control"  value="{{$product_varient->price}}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="number"  name="varient_mrp[]"  min="0" step="0.01" class="form-control"  value="{{$product_varient->mrp}}">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="varient_sku[]" value="{{$product_varient->sku}}" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="number"  name="varient_qty[]" value="{{$product_varient->qty}}" min="0" step="1" class="form-control" >
                                                                            </td>
                                                                            <td class="footable-last-visible">
                                                                                <a href="{{route('backend.product.remove-varient',$product_varient->id)}}" class="btn btn-danger btn-xs"  onclick ="confirm('Are You Sure?');" >Remove</a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-seo" role="tabpanel"
                                                aria-labelledby="v-pills-seo-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="box-title">SEO Meta Tags</h3>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Meta Title</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="meta_title"
                                                                    value="{{ $product->meta_title ?? old('meta_title') }}"
                                                                    placeholder="Meta Title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-md-3 col-from-label">Description</label>
                                                            <div class="col-md-8">
                                                                <textarea name="meta_description" rows="8" class="form-control">{{ $product->meta_description ?? old('meta_description') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-other" role="tabpanel"
                                                aria-labelledby="v-pills-other-tab">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Shipping Configuration</h3>
                                                                <p>Product wise shipping cost is disable. Shipping cost is
                                                                    configured from here Shipping Configuration</p>

                                                                <div class="form-group row">
                                                                    <label class="col-md-6 col-from-label">Free
                                                                        Shipping</label>
                                                                    <div class="col-md-6">
                                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                                            <input type="radio" name="shipping_type"
                                                                                value="free" checked="">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-6 col-from-label">Flat
                                                                        Rate</label>
                                                                    <div class="col-md-6">
                                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                                            <input type="radio" name="shipping_type"
                                                                                value="flat_rate">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="flat_rate_shipping_div" style="display: none">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-6 col-from-label">Shipping
                                                                            cost</label>
                                                                        <div class="col-md-6">
                                                                            <input type="number" lang="en"
                                                                                min="0" value="0"
                                                                                step="0.01" placeholder="Shipping cost"
                                                                                name="flat_shipping_cost"
                                                                                class="form-control" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Stock Visibility State</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Show Stock
                                                                        Quantity</label>
                                                                    <div class="col-md-6">
                                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                                            <input type="radio"
                                                                                name="stock_visibility_state"
                                                                                value="1"
                                                                                {{ isset($product->stock_visibility_state) && $product->stock_visibility_state == 1 ? 'checked' : '' }}checkedvalue="">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Show Stock With
                                                                        Text Only</label>
                                                                    <div class="col-md-6">
                                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                                            <input type="radio"
                                                                                name="stock_visibility_state"
                                                                                value="2"
                                                                                {{ isset($product->stock_visibility_state) && $product->stock_visibility_state == 2 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Hide
                                                                        Stock</label>
                                                                    <div class="col-md-6">
                                                                        <label class="aiz-switch aiz-switch-success mb-0">
                                                                            <input type="radio"
                                                                                name="stock_visibility_state"
                                                                                value="3"
                                                                                {{ isset($product->stock_visibility_state) && $product->stock_visibility_state == 3 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Cash On Delivery</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Status</label>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                name="cod" value="yes"
                                                                                {{ isset($product->code) && $product->cod == 'yes' ? 'checked' : '' }}id="flexSwitchCheckDefault">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Promo</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Status</label>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                name="is_promo" value="yes"
                                                                                {{ isset($product->is_promo) && $product->is_promo == 'yes' ? 'checked' : '' }}
                                                                                id="flexSwitchCheckDefault">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Trending</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Status</label>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                name="is_trending" value="yes"
                                                                                {{ isset($product->is_trending) && $product->is_trending == 'yes' ? 'checked' : '' }}
                                                                                id="flexSwitchCheckDefault">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Featured</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Status</label>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                name="is_featured" value="yes"
                                                                                {{ isset($product->is_featured) && $product->is_featured == 'yes' ? 'checked' : '' }}
                                                                                id="flexSwitchCheckDefault">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Refundable</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Status</label>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                name="is_refundable" value="yes"
                                                                                {{ isset($product->is_refundable) && $product->is_refundable == 'yes' ? 'checked' : '' }}
                                                                                id="flexSwitchCheckDefault">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Flash Deal</h3>
                                                                <div class="form-group mb-3 mb-3">
                                                                    <label for="name">
                                                                        Add To Flash
                                                                    </label>
                                                                    <select class="form-control " name="deal"
                                                                        id="flash_deal">
                                                                        <option value="">Choose Flash Title</option>
                                                                        <option value="1" value="yes"
                                                                            {{ isset($product->deal) && $product->deal == '1' ? 'selected' : '' }}>
                                                                            Winter Sell
                                                                        </option>
                                                                        <option value="2"
                                                                            {{ isset($product->deal) && $product->deal == '2' ? 'selected' : '' }}>
                                                                            Falsh sale
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Estimate Shipping Time</h3>
                                                                <div class="form-group mb-3 mb-3">
                                                                    <label for="name">
                                                                        Shipping Days
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control"
                                                                            name="estimate_shipping_day"
                                                                            value="{{ $product->estimate_shipping_day ?? old('estimate_shipping_day') }}"
                                                                            min="1" step="1"
                                                                            placeholder="Shipping Days">
                                                                        <div class="input-group-addon">
                                                                            Days
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="box-title">TAX</h3>
                                                            <div class="row">
                                                                @foreach ($taxes as $tax)
                                                                <div class="mb-3 col-md-3">
                                                                <p>{{$tax->name}}</p>
                                                                </div>
                                                                <div class="form-group mb-3 col-md-3">
                                                                <input type="hidden"  name="tax[id][]" value="{{$tax->id}}">
                                                                <input type="text"  name="tax[value][]" >
                                                                </div>
                                                                <div class="form-group mb-3 col-md-3">
                                                                <select class="form-control " name="tax_type[]">
                                                                    <option value="">-Choose-</option>
                                                                    <option value="1" {{isset($product->tax_type) && $product->tax_type == 'fixed' ? 'selected' :''}}>Flat</option>
                                                                    <option value="2"  {{isset($product->tax_type) && $product->tax_type == 'percent' ? 'selected' :''}}>Percent</option>
                                                                </select>
                                                                </div>
                                                                @endforeach
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div> --}}
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Discount</h3>
                                                                <div class="form-group mb-3 row">
                                                                    <label class="col-md-6 col-from-label">Status</label>
                                                                    <div class="col-md-6">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" role="switch"
                                                                                id="is_discount" name="is_discount"
                                                                                value="yes"
                                                                                {{ isset($product->is_discount) && $product->is_discount == 'yes' ? 'checked' : '' }}
                                                                                id="flexSwitchCheckDefault">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="disp_disc_div" style="display:none;">
                                                                    <div class="form-group mb-3 row">
                                                                        <label for="discount_category"
                                                                            class="col-md-12 col-from-label">Disount
                                                                            Type</label>
                                                                        <div class="col-md-6">
                                                                            <input type="radio"
                                                                                {{ isset($product->is_discount) && $product->discount_category == '1' ? 'checked' : '' }}
                                                                                id="permanent" name="discount_category"
                                                                                value="1" placeholder="Lead Time" checked>
                                                                            <label for="discount_category"
                                                                                class="col-form-label ">Permanent</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="radio" id="time_bound"
                                                                                name="discount_category" value="2"
                                                                                {{ isset($product->is_discount) && $product->discount_category == '2' ? 'checked' : '' }}
                                                                                placeholder="Lead Time">
                                                                            <label for="discount_category"
                                                                                class="col-form-label ">Time Bound</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3 row">
                                                                        <label for="discount_value"
                                                                            class="col-md-3 col-from-label">Discount</label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-control"
                                                                                id="discount_value"
                                                                                name="discount_value">
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <select class="form-control" id="disc_type"
                                                                                name="discount_type">
                                                                                <option value="">-Choose-</option>
                                                                                <option value='1'>Flat</option>
                                                                                <option value="2">Percent</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div id="disp_disc" style="display:none;">
                                                                        <div class="form-group mb-3 row">
                                                                            <label for="start_dttm"
                                                                                class="col-md-6 col-from-label">Start
                                                                                Date/Time</label>
                                                                            <div class="col-sm-6">
                                                                                <input class="form-control dttm"
                                                                                    id="start_dttm"
                                                                                    name="discount_start_dttm"
                                                                                    type="datetime-local"
                                                                                    value="{{ $product->start_dttm ?? old('start_dttm') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label for="end_dttm"
                                                                                class="col-md-6 col-from-label">End
                                                                                Date/Time</label>
                                                                            <div class="col-sm-6">
                                                                                <input class="form-control dttm"
                                                                                    type="datetime-local"id="end_dttm"
                                                                                    name="discount_end_dttm"
                                                                                    value="{{ $product->end_dttm ?? old('end_dttm') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="box-title">Tax</h3>
                                                                @foreach ($taxes as $tax)
                                                                    
                                                               
                                                                <div class="form-group mb-3 row">
                                                                    <div class="col-lg-12">
                                                                        <label class="col-md-6 col-from-label">{{$tax->name}}</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <input type="number" class="form-control"
                                                                                name="tax_value[]"
                                                                                value="">
                                                                            <input type="hidden" class="form-control"
                                                                                name="tax_id[]"
                                                                                value="{{$tax->id}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control " name="tax_type[]">
                                                                            <option value="">-Choose-</option>
                                                                            <option value="1">Flat</option>
                                                                            <option value="2">Percent</option>
                                                                         </select>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end tab-content-->
                                    </div>
                                    <!-- end col-->
                                </div>
                                <!-- end row-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="submit" value="publish" class="btn btn-success">Save &amp;
                                    Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
    </div><!-- end col-->
    </div>
    </form> <!-- end row-->
    </div> <!-- container -->
    </div>
@endsection
@section('script')

    <script>
        function make_combinations() {
            var fd = new FormData($('#form')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                url: "{{ route('backend.product.combination') }}",
                data: fd,
                type: 'POST',
                // dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#choice").html(response);
                }
            });

        }


        $("input[name='discount_category']").on('change', function() {
            if ($("#time_bound").prop("checked")) {
                $("#disp_disc").show();
            } else {
                $("#disp_disc").hide();
            }
        });

        $("#is_discount").on('change', function() {
            console.log("p")
            if ($("#is_discount").prop("checked")) {
                $("#disp_disc_div").show();
            } else {
                $("#disp_disc_div").hide();
            }
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('long_desc');
        CKEDITOR.replace('terms');
        CKEDITOR.replace('technical_specification');
        CKEDITOR.replace('warranty');



        $(document).ready(function() {
            $("#add_product_img_div").on('click', function() {
                var counter = Math.floor(Math.random() * 100);
                var html = `
            <div class="col-md-6 mb-3" id="append_product_img_row${counter}">
               <div class="row">
                  <div class="col-md-5" >
                     <input type="file"  multiple  class="form-control" id="files${counter}" name="images[]" onchange="previewFile('#files${counter}','#previewImg${counter}');">
                  </div>
                  <div class="col-md-5" >
                     <img id="previewImg${counter}" src="{{ asset('assets/placeholder.jpg') }}" alt="Uploaded Image Preview Holder" width="100px" height="100px">
                  </div>
                  <div class="col-md-2">
                     <button type="button" class="btn btn-danger btn-xs"  onclick ="remove('#append_product_img_row${counter}')" >X</button>
                  </div>
                    `;
                $("#append_product_img_row").append(html);
            });
        });


        function attr_previewFile(input, id) {
            var file = $("#attr_picture" + id).get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#attr_previewImg" + id).attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
        $('#section_id').change(function() {
            var section_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: "{{ route('backend.product.append-categories') }}",
                data: {
                    section_id: section_id
                },
                success: function(resp) {
                    $("#appendCategoriesLevel").html(resp);
                },
                error: function() {
                    alert("Error");
                }
            });
        });

        $("[name=shipping_type]").on("change", function (){
        $(".flat_rate_shipping_div").hide();

        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });
    </script>
@endsection
