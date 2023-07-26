<div class="header-top">
    <div class="container">
        <div class="row align-items-center">
            <!-- Header Top social Start -->
            <div class="col text-left header-top-left d-none d-lg-block">
                <div class="header-top-social">
                    <span class="social-text text-upper">Follow us on:</span>
                    <ul class="mb-0">
                        @if ($content['facebook'])
                            <li class="list-inline-item"><a class="hdr-facebook" href="{{ $content['facebook'] }}"><i class="fa-brands fa-facebook"></i></a></li>  
                        @endif
                        @if ($content['instagram'])
                            <li class="list-inline-item"><a class="hdr-instagram" href="{{ $content['instagram'] }}"><i class="fa-brands fa-instagram"></i></a></li>    
                        @endif
                        @if ($content['linkedin'])
                            <li class="list-inline-item"><a class="hdr-linkedin" href="{{ $content['linkedin'] }}"><i class="fa-brands fa-linkedin"></i></a></li>    
                        @endif
                        @if ($content['twitter'])
                            <li class="list-inline-item"><a class="hdr-twitter" href="{{ $content['twitter'] }}"><i class="fa-brands fa-twitter"></i></a></li>    
                        @endif
                        @if ($content['whatsapp'])
                            <li class="list-inline-item"><a class="hdr-whatsapp" href="{{ $content['whatsapp'] }}"><i class="fa-brands fa-whatsapp"></i></a></li>    
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Header Top social End -->
            <!-- Header Top Message Start -->
            @if ($content['tag_line'])
            <div class="col text-center header-top-center">
                <div class="header-top-message text-upper">
                    {{ $content['tag_line'] }}
                </div>
            </div>
            @endif
            <!-- Header Top Message End -->
            <!-- Header Top Language Currency -->
            <div class="col header-top-right d-none d-lg-block">
                <div class="header-top-lan-curr d-flex justify-content-end">
                    <!-- Currency Start -->
                    <div class="header-top-curr dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                            <li><a class="dropdown-item" href="#">EUR €</a></li>
                        </ul>
                    </div>
                    <!-- Currency End -->
                    <!-- Language Start -->
                    {{-- <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Italiano</a></li>
                        </ul>
                    </div> --}}
                    <!-- Language End -->

                </div>
            </div>
            <!-- Header Top Language Currency -->
            <!-- Header Top responsive Action -->
            <div class="col d-lg-none ">
                <div class="ec-header-bottons">
                    <!-- Header User Start -->
                    <div class="ec-header-user dropdown">
                        <button class="dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-regular fa-user"></i></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="register.html">Register</a></li>
                            <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                            <li><a class="dropdown-item" href="login.html">Login</a></li>
                        </ul>
                    </div>
                    <!-- Header User End -->
                    <!-- Header Cart Start -->
                    <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                        <div class="header-icon"><i class="fa-regular fa-heart"></i></div>
                        <span class="ec-header-count">4</span>
                    </a>
                    <!-- Header Cart End -->
                    <!-- Header Cart Start -->
                    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                        <div class="header-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                        <span class="ec-header-count cart-count-lable">{{count(js_cart())}}</span>
                    </a>
                    <!-- Header Cart End -->
                    <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                        <img src="{{asset('assets/frontend/images/icons/category-icon.svg')}}" class="svg_img header_svg" alt="icon" />
                    </a>
                    <!-- Header menu Start -->
                    <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                        <img src="{{asset('assets/frontend/images/icons/menu.svg')}}" class="svg_img header_svg" alt="icon" />
                    </a>
                    <!-- Header menu End -->
                </div>
            </div>
            <!-- Header Top responsive Action -->
        </div>
    </div>
</div>