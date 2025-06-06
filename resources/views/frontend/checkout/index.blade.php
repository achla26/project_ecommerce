@extends('frontend.layout')
@section('css')
    <style>
        input[type='radio'] {
            width: 15px !important;
            line-height: 0 !important;
            height: 12px !important;
        }

        input[type='checkbox'] {
            width: 15px !important;
            line-height: 0 !important;
            height: 12px !important;
        }
    </style>
@endsection
@section('content')
    <!-- Ec breadcrumb start -->
    <form action="{{route('checkout.order')}}" method="post">
        @csrf
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">Cart</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Cart</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec cart page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                        <!-- checkout content Start -->
                        <div class="ec-checkout-content">
                            <div class="ec-checkout-inner">
                                @if (!auth()->check())
                                    <div class="ec-checkout-wrap margin-bottom-30">
                                        <div class="ec-checkout-block ec-check-new">
                                            <h3 class="ec-checkout-title">New Customer</h3>
                                            <div class="ec-check-block-content">
                                                <div class="ec-check-subtitle">Checkout Options</div>
                                                <form action="#">
                                                    <span class="ec-new-option">
                                                        <span>
                                                            <input type="radio" id="account1" name="radio-group"
                                                                checked="">
                                                            <label for="account1">Register Account</label>
                                                        </span>
                                                        <span>
                                                            <input type="radio" id="account2" name="radio-group">
                                                            <label for="account2">Guest Account</label>
                                                        </span>
                                                    </span>
                                                </form>
                                                <div class="ec-new-desc">By creating an account you will be able to shop faster,
                                                    be up to date on an order's status, and keep track of the orders you have
                                                    previously made.
                                                </div>
                                                <div class="ec-new-btn"><a href="#" class="btn btn-primary">Continue</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="ec-checkout-block ec-check-login">
                                            <h3 class="ec-checkout-title">Returning Customer</h3>
                                            <div class="ec-check-login-form">
                                                <form action="#" method="post">
                                                    <span class="ec-check-login-wrap">
                                                        <label>Email Address</label>
                                                        <input type="text" name="name"
                                                            placeholder="Enter your email address" required="">
                                                    </span>
                                                    <span class="ec-check-login-wrap">
                                                        <label>Password</label>
                                                        <input type="password" name="password" placeholder="Enter your password"
                                                            required="">
                                                    </span>

                                                    <span class="ec-check-login-wrap ec-check-login-btn">
                                                        <button class="btn btn-primary" type="submit">Login</button>
                                                        <a class="ec-check-login-fp" href="#">Forgot Password?</a>
                                                    </span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                    <div class="ec-checkout-block ec-check-bill">
                                        <h3 class="ec-checkout-title">Billing Details</h3>
                                        <div class="ec-bl-block-content">
                                            <div class="ec-check-subtitle">Checkout Options</div>
                                            <span class="ec-bill-option">
                                                <span>
                                                    <input type="checkbox" id="diffrent_shipping_address"
                                                        name="diffrent_shipping_address" onchange="diffrentShippingAddress">
                                                    <label for="diffrent_shipping_address">I want to use same address for
                                                        shipping</label>
                                                </span>
                                            </span>
                                            <div class="ec-check-bill-form">
                                                <div class="row">
                                                    <span class="col-md-6">
                                                        <label>First Name*</label>
                                                        <input type="text" name="fname" placeholder="Enter your first name"
                                                            required="" value="{{ old('fname') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="lname" placeholder="Enter your last name"
                                                            required="" value="{{ old('lname') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Email*</label>
                                                        <input type="email" name="email" placeholder="Enter your Email"
                                                            required="" value="{{ old('email') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Password*</label>
                                                        <input type="password" name="password"
                                                            placeholder="Enter your Password">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Mobile Number*</label>
                                                        <input type="number" name="mobile_number"
                                                            placeholder="Enter your Mobile Number" required=""
                                                            value="{{ old('mobile_number') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Address 1</label>
                                                        <input type="text" name="address1" placeholder="Address Line 1"
                                                            value="{{ old('address1') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Address 2</label>
                                                        <input type="text" name="address2" placeholder="Address Line 2"
                                                            value="{{ old('address2') }}">
                                                    </span>

                                                    <span class="col-md-6">
                                                        <label>Country *</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="country_id" class="form-select" id="country_id"
                                                                onchange="getStates()">
                                                                <option value="">-Select-</option>
                                                                @foreach (js_countries() as $country)
                                                                    <option value="{{ $country->id }}"
                                                                        {{ isset($address->country_id) && $country->id == $address->country_id ? 'selected' : '' }}>
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="col-md-6" id="state_wrapper">
                                                        <label>Region State</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="state_id" id="state_id" class="form-select"
                                                                onchange="getCities(this)">
                                                                <option value="">-Select-</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="col-md-6" id="province_wrapper">
                                                        <label>Province</label>
                                                        <input type="text" name="province" id="province"
                                                            value="{{ $address->province ?? old('province') }}"
                                                            class="form-control" />
                                                    </span>
                                                    <span class="col-md-6" id="city_wrapper">
                                                        <label>City *</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="city_id" id="city_id" class="form-select">
                                                                <option>-Select-</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Post Code</label>
                                                        <input type="text" name="postalcode" placeholder="Post Code">
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="ec-check-bill-form d-none" id="shipping-address-wrapper">
                                                <h3>Shipping Details</h3>
                                                <div class="row">
                                                    <span class="col-md-6">
                                                        <label>First Name*</label>
                                                        <input type="text" name="shipping_fname"
                                                            placeholder="Enter your first name" required=""
                                                            value="{{ old('shipping_fname') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="shipping_lname"
                                                            placeholder="Enter your last name" required=""
                                                            value="{{ old('shipping_lname') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Email*</label>
                                                        <input type="email" name="shipping_email"
                                                            placeholder="Enter your Email" required=""
                                                            value="{{ old('shipping_email') }}">
                                                    </span>

                                                    <span class="col-md-6">
                                                        <label>Mobile Number*</label>
                                                        <input type="number" name="shipping_mobile_number"
                                                            placeholder="Enter your Mobile Number" required=""
                                                            value="{{ old('shipping_mobile_number') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Address 1</label>
                                                        <input type="text" name="shipping_address1"
                                                            placeholder="Address Line 1"
                                                            value="{{ old('shipping_address1') }}">
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Address 2</label>
                                                        <input type="text" name="shipping_address2"
                                                            placeholder="Address Line 2"
                                                            value="{{ old('shipping_address2') }}">
                                                    </span>

                                                    <span class="col-md-6">
                                                        <label>Country *</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="shipping_country_id" class="form-select"
                                                                id="shipping_country_id" onchange="getShippingStates()">
                                                                <option value="">-Select-</option>
                                                                @foreach (js_countries() as $country)
                                                                    <option value="{{ $country->id }}"
                                                                        {{ isset($address->country_id) && $country->id == $address->country_id ? 'selected' : '' }}>
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="col-md-6" id="state_wrapper">
                                                        <label>Region State</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="shipping_state_id" id="shipping_state_id"
                                                                class="form-select" onchange="getShippingCities(this)">
                                                                <option value="">-Select-</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="col-md-6" id="province_wrapper">
                                                        <label>Province</label>
                                                        <input type="text" name="shipping_province" id="province"
                                                            value="{{ $address->province ?? old('province') }}"
                                                            class="form-control" />
                                                    </span>
                                                    <span class="col-md-6" id="city_wrapper">
                                                        <label>City *</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="shipping_city_id" id="shipping_city_id"
                                                                class="form-select">
                                                                <option>-Select-</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="col-md-6">
                                                        <label>Post Code</label>
                                                        <input type="text" name="shipping_postalcode"
                                                            placeholder="Post Code">
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <span class="ec-check-order-btn">
                                    <a class="btn btn-primary" href="#">Place Order</a>
                                </span>
                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-checkout-rightside col-lg-4 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Summary<div class="ec-sidebar-res"><i
                                                class="ecicon eci-angle-down"></i></div>
                                    </h3>
                                </div>
                                <div class="ec-sb-block-content ec-sidebar-dropdown">
                                    <div class="ec-checkout-summary">
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span class="text-right">$80.00</span>
                                        </div>
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right">$80.00</span>
                                        </div>
                                        <div>
                                            <span class="text-left">Coupan Discount</span>
                                            <span class="text-right"><a class="ec-checkout-coupan">Apply Coupan</a></span>
                                        </div>
                                        <div class="ec-checkout-coupan-content">
                                            <form class="ec-checkout-coupan-form" name="ec-checkout-coupan-form"
                                                method="post" action="#">
                                                <input class="ec-coupan" type="text" required=""
                                                    placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                                <button class="ec-coupan-btn button btn-primary" type="submit"
                                                    name="subscribe" value="">Apply</button>
                                            </form>
                                        </div>
                                        <div class="ec-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right">$80.00</span>
                                        </div>
                                    </div>
                                    <div class="ec-checkout-pro">
                                        @foreach ($carts as $cart)
                                            @php
                                                $product = js_product($cart['product_id'], $cart['product_varient_id']);
                                            @endphp
                                            <div class="col-sm-12 mb-6">
                                                <div class="ec-product-inner">
                                                    <div class="ec-pro-image-outer">
                                                        <div class="ec-pro-image">
                                                            <a href="product-left-sidebar.html" class="image">
                                                                <img class="main-image"
                                                                    src="{{ asset('storage/' . $product['images'][0]['name']) }}"
                                                                    alt="{{ $product['name'] }}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="ec-pro-content">
                                                        <h5 class="ec-pro-title"><a
                                                                href="product-left-sidebar.html">{{ $product['name'] }}</a>
                                                        </h5>
                                                        <div class="ec-pro-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star"></i>
                                                        </div>
                                                        <span class="ec-price">
                                                            <span class="old-price">$95.00</span>
                                                            <span class="new-price">{{ price($product['unit_price']) }}</span>
                                                        </span>
                                                        <div class="ec-pro-option">
                                                            <div class="ec-pro-color">
                                                                <span class="ec-pro-opt-label">Color</span>
                                                                <ul class="ec-opt-swatch ec-change-img">
                                                                    <li class="active"><a href="#"
                                                                            class="ec-opt-clr-img"
                                                                            data-src="assets/images/product-image/1_1.jpg"
                                                                            data-src-hover="assets/images/product-image/1_1.jpg"
                                                                            data-tooltip="Gray"><span
                                                                                style="background-color:#6d4c36;"></span></a>
                                                                    </li>
                                                                    <li><a href="#" class="ec-opt-clr-img"
                                                                            data-src="assets/images/product-image/1_2.jpg"
                                                                            data-src-hover="assets/images/product-image/1_2.jpg"
                                                                            data-tooltip="Orange"><span
                                                                                style="background-color:#ffb0e1;"></span></a>
                                                                    </li>
                                                                    <li><a href="#" class="ec-opt-clr-img"
                                                                            data-src="assets/images/product-image/1_3.jpg"
                                                                            data-src-hover="assets/images/product-image/1_3.jpg"
                                                                            data-tooltip="Green"><span
                                                                                style="background-color:#8beeff;"></span></a>
                                                                    </li>
                                                                    <li><a href="#" class="ec-opt-clr-img"
                                                                            data-src="assets/images/product-image/1_4.jpg"
                                                                            data-src-hover="assets/images/product-image/1_4.jpg"
                                                                            data-tooltip="Sky Blue"><span
                                                                                style="background-color:#74f8d1;"></span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="ec-pro-size">
                                                                <span class="ec-pro-opt-label">Size</span>
                                                                <ul class="ec-opt-size">
                                                                    <li class="active"><a href="#" class="ec-opt-sz"
                                                                            data-old="$95.00" data-new="$79.00"
                                                                            data-tooltip="Small">S</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$90.00"
                                                                            data-new="$70.00" data-tooltip="Medium">M</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$80.00"
                                                                            data-new="$60.00" data-tooltip="Large">X</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$70.00"
                                                                            data-new="$50.00"
                                                                            data-tooltip="Extra Large">XL</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Summary Block -->
                        </div>
                    
                        <div class="ec-sidebar-wrap ec-checkout-pay-wrap">
                            <!-- Sidebar Payment Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Payment Method<div class="ec-sidebar-res"><i
                                                class="ecicon eci-angle-down"></i></div>
                                    </h3>
                                </div>
                                <div class="ec-sb-block-content ec-sidebar-dropdown">
                                    <div class="ec-checkout-pay">
                                        <div class="ec-pay-desc">Please select the preferred payment method to use on this
                                            order.</div> 
                                            <span class="ec-pay-option">
                                                <span>
                                                    <input type="radio" id="cod" name="payment_method" checked="">
                                                    <label for="cod">Cash On Delivery</label>
                                                </span><br>
                                                <span>
                                                    <input type="radio" id="razorpay" name="payment_method" >
                                                    <label for="razorpay">Razorpay</label>
                                                </span>
                                            </span>
                                            <span class="ec-pay-commemt">
                                                <span class="ec-pay-opt-head">Add Comments About Your Order</span>
                                                <textarea name="your-commemt" placeholder="Comments"></textarea>
                                            </span>
                                            <span class="ec-pay-agree"><input type="checkbox" value=""><a
                                                    href="#">I have
                                                    read and agree to the <span>Terms &amp; Conditions</span></a><span
                                                    class="checked"></span></span> 
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Payment Block -->
                        </div> 
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection

@section('script')
    <script>
        $("#diffrent_shipping_address").on('change', function() {
            if ($("#diffrent_shipping_address").prop('checked') == true) {
                $("#shipping-address-wrapper").removeClass("d-none")
            } else {
                $("#shipping-address-wrapper").addClass("d-none")
            }
        });
    </script>
@endsection
