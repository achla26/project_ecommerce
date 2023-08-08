
@if(!empty(js_cart()))
    @foreach (js_cart() as $cart)
        @php
            $product = js_product($cart['product_id'], $cart['product_varient_id']);
        @endphp

        <tr>
            <td data-label="Product" class="ec-cart-pro-name"><a href="product-left-sidebar.html">
                    <img class="ec-cart-pro-img mr-4" src="{{ asset('storage/' . $product['images'][0]['name']) }}"
                        alt="{{ $product['name'] }}" />{{ $product['name'] }}
                </a>
                @if (!empty($product['varient_name']) && isset($product['varient_name']['size']))
                    <div class="ec-pro-variation">
                        <div class="ec-pro-variation-inner ec-pro-variation-size">
                            <div class="ec-pro-variation-content">
                                <ul>
                                    @foreach ($product['varient_name']['size'] as $key => $size)
                                        @if ($key == $product['display_varient']['size'])
                                            <li class="align-items-center d-flex ">Size : <a href="javascript:void()"
                                                    class="ec-opt-sz">{{ $size }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                @endif

                @if (!empty($product['varient_name']) && isset($product['varient_name']['color']))
                    <div class="ec-pro-variation-inner ec-pro-variation-color">
                        <div class="ec-pro-variation-content">
                            <ul>
                                @foreach ($product['varient_name']['color'] as $key => $color)
                                    @if ($key == $product['display_varient']['color'])
                                        <li class="align-items-center d-flex ">Color : <span
                                                style="background-color:{{ $color }}"></span></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </td>
            <td data-label="Price" class="ec-cart-pro-price"><span
                    class="new-price">{{ price($product['unit_price']) }}</span>
                {{-- <span class="old-price"><s>{{price($product['unit_mrp'])}}</s></span> --}}
            </td>
            <td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">
                <div class="cart-qty-plus-minus">
                    <input class="cart-plus-minus" type="text" name="cartqtybutton" value="{{ $cart['qty'] }}" />
                </div>
            </td>
            <td data-label="Total" class="ec-cart-pro-subtotal">{{ $cart['single_item_total'] }}</td>
            <td data-label="Remove" class="ec-cart-pro-remove">
                <a href="javascript:void(0)" onclick="removeCartItem('{{ $cart['id'] }}')"><i
                        class="ecicon eci-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
@endif
