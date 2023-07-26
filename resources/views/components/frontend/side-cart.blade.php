<!-- ekka Cart Start -->
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
            @if (!empty(js_cart()))


                <ul class="eccart-pro-items">
                    @foreach (js_cart() as $cart)
                        @php
                            $product = js_product($cart['product_id'], $cart['product_varient_id']);
                        @endphp
                        <li>
                            <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                    src="{{ asset('storage/' . $product['images'][0]['name']) }}"
                                    alt="{{ $product['name'] }}" /></a>

                            <div class="ec-pro-content">
                                <a href="product-left-sidebar.html" class="cart_pro_title">{{ $product['name'] }}</a>
                                <span class="cart-price"><span>{{ price($product['unit_price']) }}</span> x
                                    {{ $cart['qty'] }}</span>
                                <div class="qty-plus-minus">
                                    <input class="qty-input" type="text" name="ec_qtybtn"
                                        value="{{ $cart['qty'] }}" />
                                </div>
                                <a href="javascript:void(0)" class="remove"
                                    onclick="removeCartItem('{{ $cart['id'] }}')">×</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h4>Cart is Empty</h4>
            @endif
        </div>
        @if (!empty(js_cart()))
            <div class="ec-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            <tr>
                                <td class="text-left">Sub-Total :</td>
                                <td class="text-right">$300.00</td>
                            </tr>
                            <tr>
                                <td class="text-left">VAT (20%) :</td>
                                <td class="text-right">$60.00</td>
                            </tr>
                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right primary-color">$360.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a href="{{ route('cart.index') }}" class="btn btn-primary">View Cart</a>
                    <a href="checkout.html" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- ekka Cart End -->
