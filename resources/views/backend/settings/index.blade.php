@extends('backend.layout')
@section('title','Setting')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Setting</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{route('backend.setting.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                
                                <div class="px-15px px-lg-25px">
                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show" id="v-pills-general-info-tab" data-bs-toggle="pill" href="#v-pills-general-info" role="tab" aria-controls="v-pills-general-info"
                                                   aria-selected="true">
                                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                    <span class="d-none d-md-block">General</span>
                                                </a>
                                             </div>
                                       
                                            <div class="nav flex-column nav-pills mt-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link" id="v-pills-info-tab" data-bs-toggle="pill" href="#v-pills-info" role="tab" aria-controls="v-pills-info"
                                                   aria-selected="true">
                                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                    <span class="d-none d-md-block">Shipping Settings</span>
                                                </a>
                                             </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane  active show" id="v-pills-general-info" role="tabpanel" aria-labelledby="v-pills-general-info-tab">
                                                   <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="mb-0">General Setting</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row mb-2">
                                                                    <div class="col-9">
                                                                        <label for="example-email" class="form-label">Title</label>
                                                                        <input type="text" class="form-control" name="system_title" value="{{ $settings['system_title'] }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-9">
                                                                        <label for="example-email" class="form-label">Logo</label>
                                                                        <input type="file"   class="form-control" id="logo" name="system_logo" onchange="previewFile('#logo','#previewLogo');">
                                                                    </div>
                                                                    <div class="col-3">
                                                                        @if ($settings['system_logo'])
                                                                        <img id="previewLogo" src="{{asset('storage/'.$settings['system_logo'])}}" alt="Uploaded Image Preview Holder" width="50px" height="50px">
                                                                        @else
                                                                        <img id="previewLogo" src="{{asset('assets/placeholder.jpg')}}" alt="Uploaded Image Preview Holder" width="50px" height="50px">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="row mb-2">
                                                                    <div class="col-9">
                                                                        <label for="example-email" class="form-label">Icon</label>
                                                                        <input type="file"   class="form-control" id="icon" name="system_icon" onchange="previewFile('#icon','#previewIcon');">
                                                                    </div>
                                                                    <div class="col-3">
                                                                        @if ($settings['system_icon'])
                                                                        <img id="previewIcon" src="{{asset('storage/'.$settings['system_icon'])}}" alt="Uploaded Image Preview Holder" width="50px" height="50px">
                                                                        @else
                                                                        <img id="previewIcon" src="{{asset('assets/placeholder.jpg')}}" alt="Uploaded Image Preview Holder" width="50px" height="50px">
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-9">
                                                                        <label for="example-email" class="form-label">Meta Title</label>
                                                                        <input type="text"  class="form-control" name="meta_title" value="{{ $settings['meta_title'] }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-9">
                                                                        <label for="example-email" class="form-label">Meta Description</label>
                                                                        <input type="text"  class="form-control" name="meta_description" value="{{ $settings['meta_description'] }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-9">
                                                                        <label for="example-email" class="form-label">Meta Keyword</label>
                                                                        <input type="text"  class="form-control" name="meta_keyword" value="{{ $settings['meta_keyword'] }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">
                                                   <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="mb-0 h6">Select Shipping Method</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                 <div class="radio mar-btm">
                                                                        <input id="product-shipping" class="magic-radio" type="radio" name="shipping_type" value="product_wise_shipping" {{ ($settings['shipping_type'] == 'product_wise_shipping') ? 'checked': ''}}>
                                                                        <label for="product-shipping">
                                                                            <span>Product Wise Shipping Cost</span>
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio mar-btm">
                                                                        <input id="flat-shipping" class="magic-radio" type="radio" name="shipping_type" value="flat_rate" {{ ($settings['shipping_type'] == 'flat_rate') ? 'checked': ''}}>
                                                                        <label for="flat-shipping">Flat Rate Shipping Cost</label>
                                                                    </div>
                                                                    <div class="radio mar-btm">
                                                                        <input id="area-shipping" class="magic-radio" type="radio" name="shipping_type" value="area_wise_shipping" {{ ($settings['shipping_type'] == 'area_wise_shipping') ? 'checked': ''}}>
                                                                        <label for="area-shipping">Area Wise Flat Shipping Cost</label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="mb-0 h6">Flat Rate Cost</h5>
                                                                </div>
                                                                
                                                                  <div class="card-body">
                                                                      <div class="form-group">
                                                                          <div class="col-lg-12">
                                                                              <input class="form-control" type="text" name="flat_rate_shipping_cost" value="{{ $settings['flat_rate_shipping_cost'] }}">
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="mb-0 h6">Note</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            1. Flat rate shipping cost is applicable if Flat rate shipping is enabled.
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="mb-0 h6">Note</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        1. Product Wise Shipping Cost calculation: Shipping cost is calculate by addition of each product shipping cost.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        2. Flat Rate Shipping Cost calculation: How many products a customer purchase, doesn't matter. Shipping cost is fixed.
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        3. Area Wise Flat Shipping Cost calculation: Fixed rate for each area. If customers purchase multiple products from one seller shipping cost is calculated by the customer shipping area. To configure area wise shipping cost go to <a href="https://demo.activeitzone.com/ecommerce/admin/cities">Shipping Cities</a>.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                 </div>
                                </div>        
                                 <button type="submit" value="publish" class="btn btn-success">Save &amp;
                                    Publish</button>
                            </form>
                             

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div> <!-- container -->

@endsection
@section('script')

@endsection