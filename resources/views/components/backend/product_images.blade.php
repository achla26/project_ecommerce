<div class="row" id="append_product_img_row{{ $image->id ?? $counter }}">
    <div class="col-md-12 mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="file" multiple class="form-control" id="files" name="images[name][]"
                    onchange="previewFile('#files','#product-preview-img{{ $image->id ?? $counter }}');">
            </div>
            <div class="col-md-3 text-center">
                @if (isset($image) && !empty($image))
                    <img id="product-preview-img{{ $image->id ?? $counter }}" src="{{ asset('storage/' . $image->name) }}"
                        alt="Uploaded Image Preview Holder" width="50px" height="50px">
                @else
                    <img id="product-preview-img{{ $image->id ?? $counter }}" src="{{ asset('assets/placeholder.jpg') }}"
                        alt="Uploaded Image Preview Holder" width="50px" height="50px">
                @endif
            </div>
            <div class="col-md-2 text-center">
                <input type="radio" value="1" name="images[main][]">
            </div>

            <div class="col-md-2 mb-3 text-center">
                @if (isset($image->id) && !empty($image->id))
                    <a href="{{ route('backend.product.remove-image', $image->id) }}" onclick="confirm('Are you sure?')"
                        class="btn btn-sm btn-danger">X</a>
                @else
                    <button type="button" class="btn btn-danger btn-xs"
                        onclick="remove('#append_product_img_row{{$counter ?? ''}}')">X</button>
                @endif
            </div>

        </div>
    </div>
</div>
