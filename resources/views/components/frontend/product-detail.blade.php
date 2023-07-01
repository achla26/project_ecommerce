<div class="single-pro-content">
    <h5 class="ec-single-title">{{ $product['name'] }}</h5>
    <div class="ec-single-rating-wrap">
        <x-frontend.rating rating="4" />
        <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to
                review this product</a></span>
    </div>
    <div class="ec-single-desc">{{ $product['short_desc'] }}</div>
    {{-- to do --}}
    {{-- <div class="ec-single-sales">
                                            <div class="ec-single-sales-inner">
                                                <div class="ec-single-sales-title">sales accelerators</div>
                                                <div class="ec-single-sales-visitor">real time <span>24</span> visitor right now!</div>
                                                <div class="ec-single-sales-progress">
                                                    @if ($product['qty'] < $product['qty_warning'])
                                                        <span class="ec-single-progress-desc">Hurry up!left {{$product['qty']}} in
    stock</span>
    @endif

    <span class="ec-single-progressbar"></span>
</div>
<div class="ec-single-sales-countdown">
    <div class="ec-single-countdown"><span id="ec-single-countdown"></span></div>
    <div class="ec-single-count-desc">Time is Running Out!</div>
</div>
</div>
</div>
--}}

    <div class="ec-single-price-stoke">
        <div class="ec-single-price">
            <span class="ec-single-ps-title">As low as</span>
            <span class="new-price">{{ price($product['unit_price']) }}</span>
            @if ($product['unit_mrp'] != $product['unit_price'])
                <span class="old-price"><s>{{ price($product['unit_mrp']) }}</s></span>
            @endif
        </div>
        <div class="ec-single-stoke">
                <span class="ec-single-ps-title"> {{ $product['qty'] > 0 ? 'IN STOCK' : 'Out Of STOCK' }}</span>
            @if ($product['qty'] < $product['qty_warning'])
                <span class="ec-single-ps-title">Only {{ $product['qty'] }} Left</span>
            @endif
            <span class="ec-single-sku">SKU#: {{ $product['sku'] }}</span>
        </div>
    </div>
    
    @if (!empty($product['combinations']))
        <div class="ec-pro-variation">
            @foreach ($product['combinations'] as $varient => $options)
                <div class="ec-pro-variation-inner ec-pro-variation-size">
                    <span>{{ $varient }}</span>
                    <div class="ec-pro-variation-content">
                        @foreach ($options as $key => $option)
                            <label class="varient-label" for="{{ $varient . $key }}">{{ $option }}</label>
                            <input type="radio" class="product-varient" name="{{ $varient }}" value="{{ $key }}" id="{{ $varient . $key }}" onchange="getVarient()" {{ isset($product['selected_varients']) && in_array($key, $product['selected_varients']) ? 'checked' : '' }}>
                            </label>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
