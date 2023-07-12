@if (isset($manage) && !empty($manage))
    @if (isset($productVarients) && !empty($productVarients))                         
        @foreach (collect($productVarients)->pluck('attribute_id')->toArray() as $combo)
            @php
                $combos[] = json_decode($combo);
            @endphp
        @endforeach
    @endif
    @if (isset($combos) && !empty($combos))
        @php
            $counter = rand(000, 999);
        @endphp
        @foreach ($combos as $key => $combo)
            @php
                $ids = '';
            @endphp
            <tr id="variation_row_{{ $counter }}">
                <td>
                    @foreach ($combo as $combo_item)
                        @php
                            $attribute = \App\Models\Attribute::find($combo_item);
                            if (!empty($attribute)) {
                                echo $attribute->name;
                                $ids .= $attribute->id . '-';
                            }
                        @endphp
                    @endforeach
                    @php
                        $ids = rtrim($ids, '-');
                    @endphp
                </td>
                <td>
                    <input type="hidden" name="varient_attribute_id[]" min="0" step="0.01" class="form-control"
                        value="{{ $productVarients[$key]['id'] ?? '' }}">
                    <input type="number" name="varient_price[]" min="0" step="0.01" class="form-control"
                        value="{{ $productVarients[$key]['price'] ?? '' }}">
                </td>
                <td>
                    <input type="number" name="varient_mrp[]" min="0" step="0.01" class="form-control"
                        value="{{ $productVarients[$key]['mrp'] ?? '' }}">
                </td>
                <td>
                    <input type="text" name="varient_sku[]" value="{{ $productVarients[$key]['sku'] ?? '' }}"
                        class="form-control">
                </td>
                <td>
                    <input type="number" name="varient_qty[]" value="{{ $productVarients[$key]['qty'] ?? '' }}"
                        min="0" step="1" class="form-control">
                </td>

                <td class="footable-last-visible">
                    <button type="button" class="btn btn-danger btn-xs"
                        onclick="remove({{ $counter }})">Remove</button>
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    <div class="row">
                        <div class="col-4">
                            <input type="file" name="varient_image" class="form-control">
                        </div>
                        <div class="col-12"></div>
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
@endif
