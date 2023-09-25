@if (isset($combos) && !empty($combos))
    @php
        $counter = rand(000, 999);
    @endphp
    @foreach ($combos as $key => $combo)
        @php
            $ids = [];
        @endphp
        <tr id="variation_row_{{ $counter }}">
            <td>
                @if (isset($manage) && $manage == 1) 
                    @foreach (json_decode($combo->attribute_ids) as $combo_item)
                        @php
                            $attribute = \App\Models\Attribute::find($combo_item);
                            if (!empty($attribute)) {
                                echo $attribute->name;
                                $ids[]= $attribute->id;
                            }
                        @endphp
                    @endforeach  
                @else
                    @foreach ($combo as $combo_item)
                        @php
                            $attribute = \App\Models\Attribute::find($combo_item);
                            if (!empty($attribute)) {
                                echo $attribute->name;
                                $ids[]= $attribute->id;
                            }
                        @endphp
                    @endforeach  
                @endif                
            </td>
            <td>
                <input type="hidden" name="varient[attribute_id][]" min="0" step="0.01" class="form-control"
                    value="{{ $combo->attribute_ids ?? json_encode($ids , JSON_UNESCAPED_UNICODE) }}">

                <input type="number" name="varient[price][]" min="0" step="0.01" class="form-control"
                    value="{{ $combo->price ?? $mrp }}">
            </td>
            <td>
                <input type="number" name="varient[mrp][]" min="0" step="0.01" class="form-control"
                    value="{{ $combo->mrp ?? $price }}">
            </td>
            <td>
                <input type="text" name="varient[sku][]" value="{{ $combo->sku ?? $sku }}"
                    class="form-control">
            </td>
            <td>
                <input type="number" name="varient[qty][]" value="{{ $combo->qty ?? $qty }}"
                    min="0" step="1" class="form-control">
            </td>
            <td colspan="8">
                <input type="file" name="varient[image][]" class="form-control">

            </td>
            <td class="footable-last-visible">
                <button type="button" class="btn btn-danger btn-xs"
                    onclick="remove('#variation_row_{{ $counter }}')">Remove</button>
            </td>
        </tr>
    @endforeach
@endif
