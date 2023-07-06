<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-form-label" for="signinSrEmail">Gallery</label>
                <div class="col-md-9 text-end" for="signinSrEmail">
                    <button type="button" class="btn btn-success btn-xs" id="add_product_img_div">Add</button>
                </div>
            </div>
            <div id="append_product_img_div">
                <div class="row">
                    <div class="col-md-4"><p><strong>File</strong></p></div>
                    <div class="col-md-3 text-center"><p><strong>Image</strong></p></div>
                    <div class="col-md-2 text-center"><p><strong>Main Image</strong></p></div>
                    <div class="col-md-2 text-center"><p><strong>Action</strong></p></div>
                </div>
                @if (isset($product_images) && !empty($product_images) && count($product_images) > 0)
                    @foreach ($product_images as $image)
                        <x-backend.product_images :image="$image" />
                    @endforeach
                @else
                    <x-backend.product_images counter="1"/>
                @endif
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Video Link</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="video_link"
                        value="{{ $product->video_link ?? old('video_link') }}" placeholder="Video Link">
                    <small class="text-muted">Use proper link without extra
                        parameter. Don't use short share link/embeded iframe
                        code.</small>
                </div>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-md-3 col-form-label" for="signinSrEmail">PDF
                Specification</label>
            <div class="col-md-8">
                <input type="file" name="pdf" class="form-control">
            </div>
        </div>
    </div>
</div>
