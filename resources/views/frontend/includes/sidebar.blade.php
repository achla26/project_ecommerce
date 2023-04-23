<!-- Category Sidebar start -->
<div class="ec-side-cat-overlay"></div>
<div class="col-lg-3 category-sidebar" data-animation="fadeIn">
        <div class="cat-sidebar">
            @if (count($sections)>0)
                <div class="cat-sidebar-box">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category<button class="ec-close">×</button></h3>
                            </div>
                            @foreach ($sections as $section)
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item"><img src="{{ !empty($section->icon) ? asset('storage/'.$section->icon) : asset('storage/uploads/no-image.jpg')}}" class="svg_img" alt="drink" />{{ $section['name']}}</div>

                                        @if (isset($section->categories) && !empty($section->categories))
                                            <ul style="display: block;">
                                                @foreach ($section->categories as $category)
                                                    <li>
                                                        <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.html">{{ $category['name']}} <span title="Available Stock">- 25</span></a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        <!-- Sidebar Category Block -->
                    </div>
                </div>
            @endif
            <div class="ec-sidebar-slider-cat">
                <div class="ec-sb-slider-title">Best Sellers</div>
                <div class="ec-sb-pro-sl">
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                    src="{{asset('assets/frontend/images/product-image/1.jpg')}}" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">baby fabric shoes</a></h5>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                </div>
                                <span class="ec-price">
                                    <span class="old-price">$5.00</span>
                                    <span class="new-price">$4.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>