@if (!empty(js_cart()))
    @php
        $cost = js_cart_cost_calculate();
    @endphp
    <div class="ec-cart-summary-bottom">
        <div class="ec-cart-summary">
            <div>
                <span class="text-left">Sub-Total</span>
                <span class="text-right">{{ $cost['sub_total'] }}</span>
            </div>
            <div>
                <span class="text-left">Delivery Charges</span>
                <span class="text-right">$80.00</span>
            </div>
            @if (session()->has('coupon'))
                <div>
                    <span class="text-left">Coupan Discount</span>
                    <span class="text-right">{{ price($cost['coupon']['coupon_amount']) }}
                        <a class="text-danger" href="javascript:void(0)" onclick="removeCartCouponApply()">X</a>
                    </span>
                </div>
            @else
                <div>
                    <span class="text-left">Coupan Discount</span>
                    <span class="text-right"><a class="ec-cart-coupan">Apply Coupan</a></span>
                </div>
            @endif
            <div class="ec-cart-coupan-content">
                <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post" action="#">
                    <input class="ec-coupan" type="text" required="" placeholder="Enter Your Coupan Code"
                        name="coupon_code" id="coupon_code">
                    <input type="hidden" id="sub_total" value="{{ $cost['sub_total'] }}">
                    <button class="ec-coupan-btn button btn-primary" type="button" name="subscribe" value=""
                        onclick="addCoupon(this)">Apply</button>
                </form>
            </div>
            <div class="ec-cart-summary-total">
                <span class="text-left">Total Amount</span>
                <span class="text-right">{{ $cost['sub_total'] }}</span>
            </div>
        </div>

    </div>
@endif
