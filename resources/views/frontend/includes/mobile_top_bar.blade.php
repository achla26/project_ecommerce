<div class="ec-header-bottom d-none d-lg-block">
    <div class="container position-relative">
        <div class="row">
            <div class="ec-flex">
                <!-- Ec Header Logo Start -->
                <div class="align-self-center">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img src="{{asset('storage/'.$content['system_logo'])}}" alt="Site Logo" /><img
                                class="dark-logo" src="{{asset('storage/'.$content['system_logo'])}}" alt="Site Logo"
                                style="display: none;" /></a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->

                <!-- Ec Header Search Start -->
                <div class="align-self-center">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="#">
                            <input class="form-control ec-search-bar" placeholder="Search products..." type="text">
                            <button class="submit" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->

                <!-- Ec Header Button Start -->
                <div class="align-self-center">
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
                        <!-- Header wishlist Start -->
                        <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon"><i class="fa-regular fa-heart"></i></div>
                            <span class="ec-header-count">4</span>
                        </a>
                        <!-- Header wishlist End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                            <span class="ec-header-count cart-count-lable">3</span>
                        </a>
                        <!-- Header Cart End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>