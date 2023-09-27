@extends('frontend.layout')
@php
    $product = js_product($product->id);
@endphp
@section('title', $product['name'])
@section('meta_title', $product['meta_title'])
@section('meta_keywords', $product['meta_keywords'])
@section('meta_description', $product['meta_description'])

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
    <style>
        input[type="radio"] {
            /* display:none; */
            width: 15px;
        }

        .varient-label {
            display: inline-block;
            margin-bottom: 15px;
            background: #eee;
            padding: 2px 5px;
            color: #6d6969de;
            cursor: pointer;
        }

        input[type="radio"]:checked+label {
            border: 1px solid red;
        }
    </style>
@endsection
{{-- @dd($product) --}}
@section('content')


    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{ $product['name'] }}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="ec-breadcrumb-item ">{{ $product['section']['name'] }}</li>
                                <li class="ec-breadcrumb-item active">{{ $product['name'] }}</li>
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
                                                        <img class="img-responsive"
                                                            src="{{ asset('storage/' . $image['name']) }}" alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="single-nav-thumb">
                                            @foreach ($product['images'] as $image)
                                                <div class="single-slide">
                                                    <img class="img-responsive"
                                                        src="{{ asset('storage/' . $image['name']) }}" alt="">
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                {{-- @dump($product) --}}
                                <div class="single-pro-desc">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title">{{ $product['name'] }}</h5>
                                        <div class="ec-single-rating-wrap">
                                            <x-frontend.rating rating="4" />
                                            <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to
                                                    review this product</a></span>
                                        </div>
                                        <div class="ec-single-desc">{{ $product['short_desc'] }}</div>
                                        {{-- to do --}}
                                        {{-- <div class="ec-single-sales">
                                                                                <div class="ec-single-sales-inner">
                                                                                    <div class="ec-single-sales-title">sales accelerators</div>
                                                                                    <div class="ec-single-sales-visitor">real time <span>24</span> visitor right now!</div>
                                                                                    <div class="ec-single-sales-progress">
                                                                                        @if ($product['qty'] < $product['qty_warning'])
                                                                                            <span class="ec-single-progress-desc">Hurry up!left {{$product['qty']}} in
                                        stock</span>
                                        @endif
                                    
                                        <span class="ec-single-progressbar"></span>
                                    </div>
                                    <div class="ec-single-sales-countdown">
                                        <div class="ec-single-countdown"><span id="ec-single-countdown"></span></div>
                                        <div class="ec-single-count-desc">Time is Running Out!</div>
                                    </div>
                                    </div>
                                    </div>
                                    --}}

                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">As low as</span>
                                                <span class="new-price" id="new_price">{{ price($product['unit_price']) }}</span>
                                                @if ($product['unit_mrp'] != $product['unit_price'])
                                                    <span class="old-price"><s id="old_price">{{ price($product['unit_mrp']) }}</s></span>
                                                @endif
                                            </div>
                                            <div class="ec-single-stoke">
                                                <span class="ec-single-ps-title" id="stock_status">
                                                    {{ $product['qty'] > 0 ? 'IN STOCK' : 'Out Of STOCK' }}</span>
                                                @if ($product['qty'] < $product['qty_warning'])
                                                    <span class="ec-single-ps-title">Only {{ $product['qty'] }} Left</span>
                                                @endif
                                                <span class="ec-single-sku" id="product_sku">SKU#: {{ $product['sku'] }}</span>
                                            </div>
                                        </div>


                                        @if (!empty($product['combinations']))
                                            <div class="ec-pro-variation">
                                                @foreach ($product['combinations'] as $varient => $options)
                                                    <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                        <span>{{ $varient }}</span>
                                                        <div class="ec-pro-variation-content">
                                                            @foreach ($options as $key => $option)
                                                                <label class="varient-label"
                                                                    for="{{ $varient . $key }}">{{ $option }}</label>
                                                                <input type="radio" class="product-varient"
                                                                    name="{{ $varient }}" value="{{ $key }}"
                                                                    id="{{ $varient . $key }}" onchange="getVarient('{{$product['id']}}')"
                                                                    {{ isset($product['selected_varients']) && in_array($key, $product['selected_varients']) ? 'checked' : '' }}>
                                                                </label>
                                                            @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="ec-single-qty">
                                            <form action="{{ route('cart.store') }}" method="post">
                                                @csrf
                                                <div class="qty-plus-minus">
                                                    <input class="qty-input" type="text" name="qty" id="qty{{$product['id']}}"
                                                        value="1" />
                                                </div>
                                                <div class="ec-single-cart ">
                                                    <input type="hidden" name="product_id" id="product_id"
                                                        value="{{ $product['id'] }}">
                                                    <input type="hidden" name="product_varient_id" id="product_varient_id{{$product['id']}}"
                                                        value="{{ $product['varient']['id'] }}">
                                                    <button class="btn btn-primary" id="add_to_cart" type="button" onclick="addToCart('{{$product['id']}}')">Add To Cart</button>
                                                </div>
                                            </form>
                                            <div class="ec-single-wishlist">
                                                <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-shopping-basket"></i></a>
                                            </div>
                                            <div class="ec-single-quickview">
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
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
                                    @if (!empty($product['tabs']))
                                        @foreach ($product['tabs'] as $tab)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $loop->iteration == 1  ? 'active' : '' }}" data-bs-toggle="tab"
                                                    data-bs-target="#ec-spt-nav-{{$tab['slug']}}" role="tablist">{{$tab['name']}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                            role="tablist">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content  ec-single-pro-tab-content">
                                @if (!empty($product['tabs']))
                                    @foreach ($product['tabs'] as $tab)
                                        <div id="ec-spt-nav-{{$tab['slug'] }}" class="tab-pane fade {{ $loop->iteration == 1  ? 'show active' : '' }} ">
                                            <div class="ec-single-pro-tab-desc">
                                                {!! $tab['description'] !!}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

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
                                                        <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
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
        function getVarient(pid) {
            let options = [];
            $('.product-varient:checked').each(function() {
                options.push($(this).val());
            });
 
            $.ajax({
                url: "{{ route('product.varient') }}",
                method: 'POST',
                data: {
                    options,
                    product_id : pid
                },
                success: function(response) {
                    if(response.success){ 
                        $(`#product_varient_id${pid}`).val(response.result.varient.id);
                        $(`#add_to_cart`).prop('disabled',false);
                    }else{
                        $(`#add_to_cart`).prop('disabled',true);
                    }
                },
                error: function(response) {}
            });
        }
    </script>
@endsection
