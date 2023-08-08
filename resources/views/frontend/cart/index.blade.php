@extends('frontend.layout')



@section('content')
    <!-- Ec breadcrumb start -->
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
                <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                    <!-- cart content Start -->
                    <div class="ec-cart-content">
                        <div class="ec-cart-inner">
                            <div class="row">
                                <form action="#">
                                    <div class="table-content cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th style="text-align: center;">Quantity</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart-wrapper"> 
                                                <x-frontend.cart /> 
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ec-cart-update-bottom">
                                                <a href="#">Continue Shopping</a>
                                                @if (!empty(js_cart()))
                                                    <button class="btn btn-primary">Check Out</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-cart-rightside col-lg-4 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Summary</h3>
                            </div>
                            
                            @if (js_setting('shipping_type') == 'area_wise')
                                <div class="ec-sb-block-content">
                                    <h4 class="ec-ship-title">Estimate Shipping</h4>
                                    <div class="ec-cart-form">
                                        <p>Enter your destination to get a shipping estimate</p>
                                        <form action="#" method="post">
                                            <span class="ec-cart-wrap">
                                                <label>Country *</label>
                                                <span class="ec-cart-select-inner">
                                                    <select name="ec_cart_country" id="ec-cart-select-country"
                                                        class="ec-cart-select">
                                                        <option selected="" disabled="">United States</option>
                                                        <option value="1">Country 1</option>
                                                        <option value="2">Country 2</option>
                                                        <option value="3">Country 3</option>
                                                        <option value="4">Country 4</option>
                                                        <option value="5">Country 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <span class="ec-cart-wrap">
                                                <label>State/Province</label>
                                                <span class="ec-cart-select-inner">
                                                    <select name="ec_cart_state" id="ec-cart-select-state"
                                                        class="ec-cart-select">
                                                        <option selected="" disabled="">Please Select a region, state
                                                        </option>
                                                        <option value="1">Region/State 1</option>
                                                        <option value="2">Region/State 2</option>
                                                        <option value="3">Region/State 3</option>
                                                        <option value="4">Region/State 4</option>
                                                        <option value="5">Region/State 5</option>
                                                    </select>
                                                </span>
                                            </span>
                                            <span class="ec-cart-wrap">
                                                <label>Zip/Postal Code</label>
                                                <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            @endif

                            <div class="ec-sb-block-content" id="cart-summery-wrapper"> 
                                <x-frontend.cart-summery/>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script></script>
@endsection
