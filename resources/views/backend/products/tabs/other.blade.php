<div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Shipping Configuration</h3>
                    <p>Product wise shipping cost is disable. Shipping cost is
                        configured from here Shipping Configuration</p>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Free
                            Shipping</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="shipping_type" value="free" checked="">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">Flat
                            Rate</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="shipping_type" value="flat_rate">
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="flat_rate_shipping_div" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">Shipping
                                cost</label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01"
                                    placeholder="Shipping cost" name="flat_shipping_cost" class="form-control"
                                    >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Stock Visibility State</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Show Stock
                            Quantity</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="1"
                                    {{ isset($product->stock_visibility_state) && $product->stock_visibility_state == 1 ? 'checked' : '' }}checkedvalue="">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Show Stock With
                            Text Only</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="2"
                                    {{ isset($product->stock_visibility_state) && $product->stock_visibility_state == 2 ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Hide
                            Stock</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="radio" name="stock_visibility_state" value="3"
                                    {{ isset($product->stock_visibility_state) && $product->stock_visibility_state == 3 ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Cash On Delivery</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="cod"
                                    value="yes"
                                    {{ isset($product->code) && $product->cod == 'yes' ? 'checked' : '' }}id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Promo</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_promo"
                                    value="yes"
                                    {{ isset($product->is_promo) && $product->is_promo == 'yes' ? 'checked' : '' }}
                                    id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Trending</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_trending"
                                    value="yes"
                                    {{ isset($product->is_trending) && $product->is_trending == 'yes' ? 'checked' : '' }}
                                    id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Featured</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_featured"
                                    value="yes"
                                    {{ isset($product->is_featured) && $product->is_featured == 'yes' ? 'checked' : '' }}
                                    id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Refundable</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_refundable"
                                    value="yes"
                                    {{ isset($product->is_refundable) && $product->is_refundable == 'yes' ? 'checked' : '' }}
                                    id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Flash Deal</h3>
                    <div class="form-group mb-3 mb-3">
                        <label for="name">
                            Add To Flash
                        </label>
                        <select class="form-control " name="deal" id="flash_deal">
                            <option value="">Choose Flash Title</option>
                            <option value="1" value="yes"
                                {{ isset($product->deal) && $product->deal == '1' ? 'selected' : '' }}>
                                Winter Sell
                            </option>
                            <option value="2"
                                {{ isset($product->deal) && $product->deal == '2' ? 'selected' : '' }}>
                                Falsh sale
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Estimate Shipping Time</h3>
                    <div class="form-group mb-3 mb-3">
                        <label for="name">
                            Shipping Days
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="estimate_shipping_day"
                                value="{{ $product->estimate_shipping_day ?? old('estimate_shipping_day') }}"
                                min="1" step="1" placeholder="Shipping Days">
                            <div class="input-group-addon">
                                Days
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="box-title">TAX</h3>
                                                            <div class="row">
                                                                @foreach ($taxes as $tax)
                                                                <div class="mb-3 col-md-3">
                                                                <p>{{$tax->name}}</p>
                                                                </div>
                                                                <div class="form-group mb-3 col-md-3">
                                                                <input type="hidden"  name="tax[id][]" value="{{$tax->id}}">
                                                                <input type="text"  name="tax[value][]" >
                                                                </div>
                                                                <div class="form-group mb-3 col-md-3">
                                                                <select class="form-control " name="tax_type[]">
                                                                    <option value="">-Choose-</option>
                                                                    <option value="1" {{isset($product->tax_type) && $product->tax_type == 'fixed' ? 'selected' :''}}>Flat</option>
                                                                    <option value="2"  {{isset($product->tax_type) && $product->tax_type == 'percent' ? 'selected' :''}}>Percent</option>
                                                                </select>
                                                                </div>
                                                                @endforeach
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div> --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Discount</h3>
                    <div class="form-group mb-3 row">
                        <label class="col-md-6 col-from-label">Status</label>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_discount"
                                    name="is_discount" value="yes"
                                    {{ isset($product->is_discount) && $product->is_discount == 'yes' ? 'checked' : '' }}
                                    id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                    <div id="disp_disc_div" style="display:none;">
                        <div class="form-group mb-3 row">
                            <label for="discount_category" class="col-md-12 col-from-label">Disount
                                Type</label>
                            <div class="col-md-6">
                                <input type="radio"
                                    {{ isset($product->is_discount) && $product->discount_category == '1' ? 'checked' : '' }}
                                    id="permanent" name="discount_category" value="1" placeholder="Lead Time"
                                    checked>
                                <label for="discount_category" class="col-form-label ">Permanent</label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" id="time_bound" name="discount_category" value="2"
                                    {{ isset($product->is_discount) && $product->discount_category == '2' ? 'checked' : '' }}
                                    placeholder="Lead Time">
                                <label for="discount_category" class="col-form-label ">Time Bound</label>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="discount_value" class="col-md-3 col-from-label">Discount</label>
                            <div class="col-sm-3">
                                <input class="form-control" id="discount_value" name="discount_value">
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="disc_type" name="discount_type">
                                    <option value="">-Choose-</option>
                                    <option value='1'>Flat</option>
                                    <option value="2">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div id="disp_disc" style="display:none;">
                            <div class="form-group mb-3 row">
                                <label for="start_dttm" class="col-md-6 col-from-label">Start
                                    Date/Time</label>
                                <div class="col-sm-6">
                                    <input class="form-control dttm" id="start_dttm" name="discount_start_dttm"
                                        type="datetime-local"
                                        value="{{ $product->start_dttm ?? old('start_dttm') }}">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label for="end_dttm" class="col-md-6 col-from-label">End
                                    Date/Time</label>
                                <div class="col-sm-6">
                                    <input class="form-control dttm" type="datetime-local"id="end_dttm"
                                        name="discount_end_dttm" value="{{ $product->end_dttm ?? old('end_dttm') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="box-title">Tax</h3>
                    
                        <div class="form-group mb-3 row">
                            <div class="col-lg-12">
                                <label class="col-md-12 col-from-label"></label>
                            </div>
                            <div class="col-md-12">
                                <select name="tax_id" class="form-select">
                                    <option value="0">-Select-</option>
                                    @foreach ($taxes as $tax)
                                        <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                    @endforeach
                                </select> 
                            </div> 
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
