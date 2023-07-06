<div class="tab-pane fade  show" id="v-pills-desc" role="tabpanel" aria-labelledby="v-pills-desc-tab">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="box-title">Product Variation</h3>
                <div class="form-group mb-3 row">
                    <label for="short_desc" class="col-sm-2 col-form-label ">Short
                        Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Short Description">{{ $product->short_desc ?? old('short_desc') }}</textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="long_desc" class="col-sm-2 col-form-label ">Long
                        Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Long Description">{{ $product->long_desc ?? old('long_desc') }}</textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="technical_specification" class="col-sm-2 col-form-label ">Technical
                        Specification</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="technical_specification" name="technical_specification"
                            placeholder="Long Description">{{ $product->technical_specification ?? old('technical_specification') }}</textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="uses" class="col-sm-2 col-form-label ">Uses</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="uses" name="uses" placeholder="Uses">{{ $product->uses ?? old('uses') }}</textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="warranty" class="col-sm-2 col-form-label ">Warranty</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="warranty" name="warranty" placeholder="Warranty">{{ $product->warranty ?? old('warranty') }}</textarea>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label class="col-md-2 col-from-label">Tags <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input id="tags_1" type="text" class="tags form-control"
                            value="{{ $product->keywords ?? old('keywords') }}" name="keywords" /></p>
                        <small class="text-muted">This is used for search.
                            Input those words by which cutomer can find this
                            product.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
