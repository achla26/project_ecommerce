@extends('frontend.layout')
@php
    $product = detail($product->id);
@endphp
@section('title' , $product['name'])
@section('meta_title' , $product['meta_title'])
@section('meta_keywords' , $product['meta_keywords'])
@section('meta_description' , $product['meta_description'])

@section('css')
<link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
@endsection

@section('content')
    

 <!-- Ec breadcrumb start -->
 <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">{{ $product['name']}}</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                            <li class="ec-breadcrumb-item ">{{ $product['section']['name']}}</li>
                            <li class="ec-breadcrumb-item active">{{ $product['name']}}</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Sart Single product -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-pro-rightside ec-common-rightside col-lg-12 order-lg-last col-md-12 order-md-first">

                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img">
                                <div class="single-product-scroll">
                                    @if (isset($product['images']) && !empty($product['images']))
                                    <div class="single-product-cover">
                                        @foreach ($product['images'] as $image)
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="public function varients(){
                                                    return $this->hasMany('App\Models\ProductVarient');
                                                }"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div class="single-nav-thumb">
                                        @foreach ($product['images'] as $image)
                                        <div class="single-slide">
                                            <img class="img-responsive" src="{{ asset('storage/' . $image['name']) }}"
                                                alt="">
                                        </div>
                                        @endforeach
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="single-pro-desc">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title">{{ $product['name']}}</h5>
                                    <div class="ec-single-rating-wrap">
                                        <x-frontend.rating rating="4"/>
                                        <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to
                                                review this product</a></span>
                                    </div>
                                    <div class="ec-single-desc">{{ $product['short_desc']}}</div>
 
                                    @if ((isset($product['discount']['category']) && $product['discount']['category'] == 'time_bound') && (strtotime(date('Y-m-d H:i:s')) >= strtotime($product['discount']['start_dttm']) && strtotime(date('Y-m-d H:i:s')) <= strtotime($product['discount']['end_dttm'])))
                                        <div class="ec-single-sales">
                                            <div class="ec-single-sales-inner">
                                                <div class="ec-single-sales-title">sales accelerators</div>
                                                {{-- <div class="ec-single-sales-visitor">real time <span>24</span> visitor right now!</div> --}}
                                                <div class="ec-single-sales-progress">
                                                    @if ($product['qty'] < $product['qty_warning'])
                                                        <span class="ec-single-progress-desc">Hurry up!left {{$product['qty']}}  in
                                                            stock</span>
                                                    @endif
                                                    
                                                    <span class="ec-single-progressbar"></span>
                                                </div>
                                                <div class="ec-single-sales-countdown">
                                                    <div class="ec-single-countdown"><span
                                                            id="ec-single-countdown"></span></div>
                                                    <div class="ec-single-count-desc">Time is Running Out!</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="ec-single-price-stoke">
                                        <div class="ec-single-price">
                                            <span class="ec-single-ps-title">As low as</span>
                                            <span class="new-price">{{price($product['unit_price'])}}</span>
                                            @if (!empty($product['unit_mrp']))
                                                <span class="old-price"><s>{{price($product['unit_mrp'])}}</s></span>
                                            @endif
                                        </div>
                                        <div class="ec-single-stoke">
                                            @if ($product['qty'] > 0)
                                                <span class="ec-single-ps-title">IN STOCK</span>
                                            @else
                                                <span class="ec-single-ps-title">Out Of STOCK</span>
                                            @endif
                                            @if ($product['qty'] < $product['qty_warning'])
                                                <span class="ec-single-ps-title">Only {{$product['qty']}} Left</span>
                                            @endif
                                            <span class="ec-single-sku">SKU#: {{$product['sku']}}</span>
                                        </div>
                                    </div>
                                    @if (!empty($product['varient_name']) && isset($product['varient_name']['size']))
                                    <div class="ec-pro-variation">
                                        <div class="ec-pro-variation-inner ec-pro-variation-size">
                                            <span>SIZE</span>
                                            <div class="ec-pro-variation-content">
                                                <ul>
                                                    @foreach ($product['varient_name']['size'] as $key =>$size)
                                                        <li onclick="getSize('{{encode($key)}}')"  class="{{ in_array($key, $product['display_varient']) ? 'active': '' }}" ><a href="javascript:void()" class="ec-opt-sz"
                                                            data-tooltip="Small">{{$size}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        @if (!empty($product['varient_name']) && isset($product['varient_name']['color']))
                                            <div class="ec-pro-variation-inner ec-pro-variation-color">
                                                <span>Color</span>
                                                <div class="ec-pro-variation-content">
                                                    <ul>
                                                        @foreach ($product['varient_name']['color'] as $key =>$color)
                                                        <li onclick="getColor('{{encode($key)}}')" class="{{ in_array($key, $product['display_varient']) ? 'active': '' }}" ><span
                                                                style="background-color:{{$color}}"></span></li>
                                                       @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="ec-single-qty">
                                        <form action="{{ route('cart.store')}}" method="post"> 
                                            @csrf
                                            <div class="qty-plus-minus">
                                                <input class="qty-input" type="text" name="qty" id="qty" value="1" />
                                            </div>
                                            <div class="ec-single-cart ">
                                                <input type="hidden" name="product_id" id="product_id" value="{{$product['id']}}">
                                                <input type="hidden" name="color" id="color" value="{{  encode($product['display_varient']['color']) ?? ''}}">
                                                <input type="hidden" name="size" id="size" value="{{  encode($product['display_varient']['size']) ?? '0'}}">
                                                <input type="hidden" name="product_varient_id" id="product_varient_id" value="{{$product['varient_id']}}">
                                                <button class="btn btn-primary" type="submit">Add To Cart</button>                                                
                                            </div>
                                        </form>
                                        <div class="ec-single-wishlist">
                                            <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-shopping-basket"></i></a>
                                        </div>
                                        <div class="ec-single-quickview">
                                            <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="ec-single-social">
                                        <ul class="mb-0">
                                            <li class="list-inline-item facebook"><a href="#"><i
                                                        class="ecicon eci-facebook"></i></a></li>
                                            <li class="list-inline-item twitter"><a href="#"><i
                                                        class="ecicon eci-twitter"></i></a></li>
                                            <li class="list-inline-item instagram"><a href="#"><i
                                                        class="ecicon eci-instagram"></i></a></li>
                                            <li class="list-inline-item youtube-play"><a href="#"><i
                                                        class="ecicon eci-youtube-play"></i></a></li>
                                            <li class="list-inline-item behance"><a href="#"><i
                                                        class="ecicon eci-behance"></i></a></li>
                                            <li class="list-inline-item whatsapp"><a href="#"><i
                                                        class="ecicon eci-whatsapp"></i></a></li>
                                            <li class="list-inline-item plus"><a href="#"><i
                                                        class="ecicon eci-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single product content End -->
                <!-- Single product tab start -->
                <div class="ec-single-pro-tab">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                @empty(!$product['long_desc'])
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                    </li>
                                @endempty 
                                @empty(!$product['technical_specification'])
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                            role="tablist">Technical Specification</a>
                                    </li>
                                @endempty 
                                @empty(!$product['uses'])
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-uses"
                                            role="tablist">Uses</a>
                                    </li>
                                @endempty 
                                @empty(!$product['warranty'])
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-warranty"
                                            role="tablist">Warranty</a>
                                    </li>
                                @endempty 
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                        role="tablist">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            @empty(!$product['long_desc'])
                                <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                    <div class="ec-single-pro-tab-desc">
                                        {!! $product['long_desc'] !!}
                                    </div>
                                </div>
                            @endempty
                            @empty(!$product['technical_specification'])
                            <div id="ec-spt-nav-info" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    {!! $product['technical_specification'] !!}
                                </div>
                            </div>
                            @endempty
                            @empty(!$product['uses'])
                            <div id="ec-spt-nav-uses" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    {!! $product['uses'] !!}
                                </div>
                            </div>
                            @endempty
                            @empty(!$product['warranty'])
                            <div id="ec-spt-nav-warranty" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    {!! $product['warranty'] !!}
                                </div>
                            </div>
                            @endempty

                            <div id="ec-spt-nav-review" class="tab-pane fade">
                                <div class="row">
                                    <div class="ec-t-review-wrapper">
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/1.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Jeny Doe</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/2.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Linda Morgus</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="ec-ratting-content">
                                        <h3>Add a Review</h3>
                                        <div class="ec-ratting-form">
                                            <form action="#">
                                                <div class="ec-ratting-star">
                                                    <span>Your rating:</span>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-name" placeholder="Name" type="text" />
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-email" placeholder="Email*" type="email"
                                                        required />
                                                </div>
                                                <div class="ec-ratting-input form-submit">
                                                    <textarea name="your-commemt"
                                                        placeholder="Enter Your Comment"></textarea>
                                                    <button class="btn btn-primary" type="submit"
                                                        value="Submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
            </div>
         
        </div>
    </div>
</section>
<!-- End Single product -->
@endsection

@section('script')
    <script>
        function getColor(color){
            $("#color").val(color);
            chnageCurrentUrl();
        }
        function getSize(size){
            $("#size").val(size);
            chnageCurrentUrl();
        }
        function chnageCurrentUrl()
        {
            let color = $("#color").val();
            let size = $("#size").val();
            
            var new_url="{{ config('app.url') }}"+"/product/"+"{{$product['slug']}}"+"/"+color+"/"+size;
            window.location.href =new_url;
            // $.ajax({
            //     url: url,
            //     method: 'POST',
            //     data: new FormData(this),
            //     dataType: 'JSON',
            //     contentType: false,
            //     cache: false,
            //     processData: false,
            //     success:function(response)
            //     {
            //         $(form).trigger("reset");
            //         alert(response.success)
            //     },
            //     error: function(response) {
            //     }
            // });
            // window.history.replaceState("data","title",new_url);
            
        }
    </script>
@endsection