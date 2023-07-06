<div class="tab-pane fade" id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="box-title">SEO Meta Tags</h3>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Meta Title</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="meta_title"
                        value="{{ $product->meta_title ?? old('meta_title') }}" placeholder="Meta Title">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Description</label>
                <div class="col-md-8">
                    <textarea name="meta_description" rows="8" class="form-control">{{ $product->meta_description ?? old('meta_description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
