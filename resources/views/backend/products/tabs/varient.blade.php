<div class="tab-pane fade  show" id="v-pills-combination" role="tabpanel" aria-labelledby="v-pills-combination-tab">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="box-title">Product Attributes</h3>
            @foreach ($attribute_sets as $attribute_set)
                <div class="form-group mb-3 row gutters-5">
                    <div class="col-md-3">
                        <p>{{ $attribute_set->name }}</p>
                        <input type="hidden" class="form-control" name="attribute_set_id[]"
                            value="{{ $attribute_set->id }}">
                    </div>
                    @php
                        if (isset($product_varients)) {
                            $product_attribute = [];
                            foreach (
                                collect($product_varients)
                                    ->pluck('attribute_id')
                                    ->toArray()
                                as $varient
                            ) {
                                $product_attribute[] = json_decode($varient);
                            }
                            $product_attribute = array_unique(call_user_func_array('array_merge', $product_attribute));
                        }
                    @endphp
                    <div class="col-md-8">
                        <select class="form-control  select-multi" multiple="multiple"
                            name="attribute_id[{{ $attribute_set->id }}][]" style="width: 100%;"
                            onchange="make_combinations()">
                            <option value="">-Select-</option>
                            @foreach (collect($attributes)->where('attribute_set_id', $attribute_set->id)->toArray() as $attribute)
                                <option value="{{ $attribute['id'] }}"
                                    {{ isset($product_attribute) && in_array($attribute['id'], $product_attribute) ? 'selected' : '' }}>
                                    {{ $attribute['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
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
                    @if (isset($product_varients))
                        <x-backend.combination :productVarients=$product_varients manage="1" />
                        {{-- @foreach (collect($product_varients) as $product_varient)
                        <tr id="variation_row_{{$product_varient->id}}">
                            <td>
                                @foreach (json_decode($product_varient->attribute_id) as $item)
                                    @php
                                        $attribute = \App\Models\Attribute::find($item);
                                        echo $attribute->name;
                                    @endphp
                                @endforeach
                            </td>
                            <td>
                                <input type="hidden"  name="varient_attribute_id[]"  min="0" step="0.01" class="form-control"  value="{{implode("-",json_decode($product_varient->attribute_id))}}">
                                <input type="number"  name="varient_price[]"  min="0" step="0.01" class="form-control"  value="{{$product_varient->price}}">
                            </td>
                            <td>
                                <input type="number"  name="varient_mrp[]"  min="0" step="0.01" class="form-control"  value="{{$product_varient->mrp}}">
                            </td>
                            <td>
                                <input type="text" name="varient_sku[]" value="{{$product_varient->sku}}" class="form-control">
                            </td>
                            <td>
                                <input type="number"  name="varient_qty[]" value="{{$product_varient->qty}}" min="0" step="1" class="form-control" >
                            </td>
                            <td class="footable-last-visible">
                                <a href="{{route('backend.product.remove-varient',$product_varient->id)}}" class="btn btn-danger btn-xs"  onclick ="confirm('Are You Sure?');" >Remove</a>
                            </td>
                        </tr>
                    @endforeach --}}
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
