<div class="tab-pane fade  show" id="v-pills-combination" role="tabpanel" aria-labelledby="v-pills-combination-tab">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="box-title">Product Attributes</h3>
            @php
                $product_attribute = isset($product_varients) ? json_decode($product_varients[0]->attribute_set_ids) : [] ;
                
            @endphp
            <div class="col-md-8">
                <label for="">Select Varients</label>
                <select class="form-control  select-multi product-attribute" multiple="multiple" name="attribute_set_ids[]"
                    style="width: 100%;" id="attribute_ids" onchange="getAttributes()">
                    @foreach ($attribute_sets as $attribute_set)
                        <option value="{{ $attribute_set->id }}"
                            {{ !empty($product_attribute) && in_array($attribute_set->id, $product_attribute) ? 'selected' : '' }}>
                            {{ $attribute_set->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3 row gutters-5" id="varients_wrapper"> 
                @php
                    if (isset($product_varients) && $product->type == 'yes') {
                        $product_attribute = [];
                        foreach (
                            collect($product_varients)
                                ->pluck('attribute_id')
                                ->toArray()
                            as $varient
                        ) {
                            $product_attribute[] = json_decode($varient);
                        }
                        if ($product_attribute > 0) {
                            $product_attribute = array_unique(call_user_func_array('array_merge', $product_attribute));
                        }
                    }
                @endphp

            </div>
            <div>
                <p>Choose the attributes of this product and then input values
                    of each attribute</p>
                <br>
            </div>
            <div id="select_file"></div>
            <div class="customer_choice_options" id="customer_choice_options">
            </div>
        </div>
        <div class="col-lg-12">
            <table class="table table-bordered aiz-table footable footable-10 breakpoint-xl" style="">
                <thead>
                    <tr class="footable-header">
                        <td class="text-center footable-first-visible" style="display: table-cell;">
                            Variant
                        </td>
                        <td class="text-center" style="display: table-cell;">
                            Variant Price
                        </td>
                        <td class="text-center" style="display: table-cell;">
                            Variant Mrp
                        </td>
                        <td class="text-center" data-breakpoints="lg" style="display: table-cell;">
                            SKU
                        </td>
                        <td class="text-center" data-breakpoints="lg" style="display: table-cell;">
                            Quantity
                        </td>
                        <td class="text-center footable-last-visible" data-breakpoints="lg"
                            style="display: table-cell;">
                            Action
                        </td>
                    </tr>
                </thead>
                <tbody id="choice">
                    @if (isset($product_varients) && $product->type == 'varient') 
                        <x-backend.combination :combos="$product_varients" :manage="1"/>  
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
