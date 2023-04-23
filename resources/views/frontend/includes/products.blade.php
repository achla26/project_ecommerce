<section class="section ec-product-tab section-space-p" id="collection">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Our Top Collection</h2>
                    <h2 class="ec-title">Our Top Collection</h2>
                    <p class="sub-title">Browse The Collection of Top Products</p>
                </div>
            </div>

            <!-- Tab Start -->
            <div class="col-md-12 text-center">
                <ul class="ec-pro-tab-nav nav justify-content-center">
                    {{-- <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-pro-for-all">For
                            All</a></li> --}}
                    @foreach ($sections as $section)
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-{{$section['slug']}}">{{$section['name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        
        <div class="row">
            <div class="col">
                <div class="tab-content">
                    @foreach ($sections as $section)
                        <div class="tab-pane fade show active" id="tab-pro-for-{{$section['slug']}}">
                            <div class="row">
                                @foreach ($section->products as $product)
                                @php
                                    $product = detail($product->id);
                                @endphp
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="fadeIn">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                               
                                                <a href="{{route('product',$product['slug'])}}" class="image">
                                                    @if (isset($product['images']) && !empty($product['images']))
                                                        <img class="main-image"
                                                            src="{{ asset('storage/' . $product['images'][0]['name']) }}" alt="Product" />
                                                    @endif
                                                </a>
                                                <span class="percentage">{{ $product['discount_show']}}</span>
                                                <a href="#" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><i class="fa-solid fa-eye"></i></a>
                                                <div class="ec-pro-actions">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><i class="fa-solid fa-code-compare"></i></a>
                                                    <button title="Add To Cart" class="add-to-cart"><i class="fa-solid fa-cart-plus"></i> Add To Cart</button>
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><i class="fa-solid fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="{{route('product',$product['slug'])}}">{{$product['name']}}</a></h5>
                                            <x-frontend.rating rating="4"/>
                                            <span class="ec-price">
                                                @if (!empty($product['unit_mrp']))
                                                <span class="old-price">{{price($product['unit_mrp'])}}</span>
                                                @endif
                                                <span class="new-price">{{price($product['unit_price'])}}</span>
                                            </span>
                                            <div class="ec-pro-option">
                                                @if (!empty($product['varient_name']) && isset($product['varient_name']['color']))
                                                    <div class="ec-pro-color">
                                                        <span class="ec-pro-opt-label">Color</span>
                                                        <ul class="ec-opt-swatch">
                                                            @foreach ($product['varient_name']['color'] as $key =>$color)
                                                                <li class="active"><a href="#" class=""
                                                                data-tooltip="{{$color}}"><span
                                                                    style="background-color:{{$color}};"></span></a></li>
                                                                <li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if (!empty($product['varient_name']) && isset($product['varient_name']['size']))
                                                    <div class="ec-pro-size">
                                                        <span class="ec-pro-opt-label">Size</span>
                                                        <ul class="ec-opt-size">
                                                            @foreach ($product['varient_name']['size'] as $key =>$size)
                                                                <li class="active"><a href="#" class="ec-opt-sz"
                                                                    data-tooltip="Small">{{$size}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>