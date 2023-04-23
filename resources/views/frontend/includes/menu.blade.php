<div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-12 align-self-center">
                <div class="ec-main-menu">
                    <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                        <img src="{{asset('assets/frontend/images/icons/category-icon.svg')}}" class="svg_img header_svg" alt="icon" />
                    </a>
                    <ul>
                        <li><a href="{{ route('index')}}">Home</a></li>
                        @if (count($sections)>0)
                        
                            <li class="dropdown position-static"><a href="javascript:void(0)">Categories</a>
                                <ul class="mega-menu d-block">
                                    <li class="d-flex">
                                        @foreach ($sections as $section)
                                        <ul class="d-block">
                                            <li class="menu_title">
                                                <a href="javascript:void(0)">{{ $section['name']}}</a>
                                                @if (isset($section->categories) && !empty($section->categories))
                                                    <ul>
                                                        @foreach ($section->categories as $category)
                                                            <li><a href="shop-left-sidebar-col-3.html">{{ $category->name ?? ''}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <ul class="ec-main-banner w-100">
                                                    <li><img class="img-responsive" src="{{ !empty($section->image) ? asset('storage/'.$section->image) : asset('storage/uploads/no-image.jpg')}}"
                                                                alt=""></li>
                                                </ul>
                                            </li>                                            
                                            
                                        </ul>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                        @endif
                       
                        <li class="dropdown"><a href="javascript:void(0)">Products</a>
                            <ul class="sub-menu">
                                <li class="dropdown position-static"><a href="javascript:void(0)">Product page
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="product-left-sidebar.html">Product left sidebar</a></li>
                                        <li><a href="product-right-sidebar.html">Product right sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Product 360
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="product-360-left-sidebar.html">360 left sidebar</a></li>
                                        <li><a href="product-360-right-sidebar.html">360 right sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Product video
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="product-video-left-sidebar.html">Video left sidebar</a>
                                        </li>
                                        <li><a href="product-video-right-sidebar.html">Video right sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Product
                                        gallery
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="product-gallery-left-sidebar.html">Gallery left sidebar</a>
                                        </li>
                                        <li><a href="product-gallery-right-sidebar.html">Gallery right
                                                sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-full-width.html">Product full width</a></li>
                                <li><a href="product-360-full-width.html">360 full width</a></li>
                                <li><a href="product-video-full-width.html">Video full width</a></li>
                                <li><a href="product-gallery-full-width.html">Gallery full width</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0)">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="compare.html">Compare</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="track-order.html">Track Order</a></li>
                                <li><a href="terms-condition.html">Terms Condition</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><span class="main-label-note-new" data-toggle="tooltip"
                                title="NEW"></span><a href="javascript:void(0)">Others</a>
                            <ul class="sub-menu">
                                <li class="dropdown position-static"><a href="javascript:void(0)">Mail
                                        Confirmation
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="email-template-confirm-1.html">Mail Confirmation 1</a></li>
                                        <li><a href="email-template-confirm-2.html">Mail Confirmation 2</a></li>
                                        <li><a href="email-template-confirm-3.html">Mail Confirmation 3</a></li>
                                        <li><a href="email-template-confirm-4.html">Mail Confirmation 4</a></li>
                                        <li><a href="email-template-confirm-5.html">Mail Confirmation 5</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Mail Reset
                                        password
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="email-template-forgot-password-1.html">Reset password 1</a>
                                        </li>
                                        <li><a href="email-template-forgot-password-2.html">Reset password 2</a>
                                        </li>
                                        <li><a href="email-template-forgot-password-3.html">Reset password 3</a>
                                        </li>
                                        <li><a href="email-template-forgot-password-4.html">Reset password 4</a>
                                        </li>
                                        <li><a href="email-template-forgot-password-5.html">Reset password 5</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Mail
                                        Promotional
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="email-template-offers-1.html">Offer mail 1</a></li>
                                        <li><a href="email-template-offers-2.html">Offer mail 2</a></li>
                                        <li><a href="email-template-offers-3.html">Offer mail 3</a></li>
                                        <li><a href="email-template-offers-4.html">Offer mail 4</a></li>
                                        <li><a href="email-template-offers-5.html">Offer mail 5</a></li>
                                        <li><a href="email-template-offers-6.html">Offer mail 6</a></li>
                                        <li><a href="email-template-offers-7.html">Offer mail 7</a></li>
                                        <li><a href="email-template-offers-8.html">Offer mail 8</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static">
                                    <span class="label-note-hot"></span>
                                    <a href="javascript:void(0)">Vendor account pages
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                        <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                        <li><a href="vendor-uploads.html">Vendor Uploads</a></li>
                                        <li><a href="vendor-settings.html">Vendor Settings</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static">
                                    <span class="label-note-trending"></span>
                                    <a href="javascript:void(0)">User account pages
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="user-profile.html">User Profile</a></li>
                                        <li><a href="user-history.html">History</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="track-order.html">Track Order</a></li>
                                        <li><a href="user-invoice.html">Invoice</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Construction
                                        pages
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="404-error-page.html">404 error page</a></li>
                                        <li><a href="under-maintenance.html">maintanence page</a></li>
                                        <li><a href="coming-soon.html">Coming soon page</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown position-static">
                                    <span class="label-note-new"></span>
                                    <a href="javascript:void(0)">Vendor Catalog pages
                                        <i class="ecicon eci-angle-right"></i></a>
                                    <ul class="sub-menu sub-menu-child">
                                        <li><a href="catalog-single-vendor.html">Catalog Single Vendor</a></li>
                                        <li><a href="catalog-multi-vendor.html">Catalog Multi Vendor</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0)">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                <li><a href="blog-detail-left-sidebar.html">Blog detail left sidebar</a></li>
                                <li><a href="blog-detail-right-sidebar.html">Blog detail right sidebar</a></li>
                                <li><a href="blog-full-width.html">Blog full width</a></li>
                                <li><a href="blog-detail-full-width.html">Blog detail full width</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0)">Elements</a>
                            <ul class="sub-menu">
                                <li><a href="elemets-products.html">Products</a></li>
                                <li><a href="elemets-typography.html">Typography</a></li>
                                <li><a href="elemets-title.html">Titles</a></li>
                                <li><a href="elemets-categories.html">Categories</a></li>
                                <li><a href="elemets-buttons.html">Buttons</a></li>
                                <li><a href="elemets-tabs.html">Tabs</a></li>
                                <li><a href="elemets-accordions.html">Accordions</a></li>
                                <li><a href="elemets-blog.html">Blogs</a></li>
                            </ul>
                        </li>
                        <li><a href="offer.html">Hot Offers</a></li>
                        <li class="dropdown scroll-to"><a href="javascript:void(0)"><img
                            src="{{asset('assets/frontend/images/icons/scroll.svg')}}" class="svg_img header_svg scroll" alt="" /></a>
                            <ul class="sub-menu">
                                <li class="menu_title">Scroll To Section</li>
                                <li><a href="javascript:void(0)" data-scroll="collection" class="nav-scroll">Top Collection</a></li>
                                <li><a href="javascript:void(0)" data-scroll="categories" class="nav-scroll">Categories</a></li>
                                <li><a href="javascript:void(0)" data-scroll="offers" class="nav-scroll">Offers</a></li>
                                <li><a href="javascript:void(0)" data-scroll="vendors" class="nav-scroll">Top Vendors</a></li>
                                <li><a href="javascript:void(0)" data-scroll="services" class="nav-scroll">Services</a></li>
                                <li><a href="javascript:void(0)" data-scroll="arrivals" class="nav-scroll">New Arrivals</a></li>
                                <li><a href="javascript:void(0)" data-scroll="reviews" class="nav-scroll">Client Review</a></li>
                                <li><a href="javascript:void(0)" data-scroll="insta" class="nav-scroll">Instagram Feed</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>