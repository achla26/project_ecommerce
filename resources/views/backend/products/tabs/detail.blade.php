<div class="tab-pane fade  show" id="v-pills-desc" role="tabpanel" aria-labelledby="v-pills-desc-tab">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="box-title">Product Details</h3>
                <div class="form-group mb-3 row">
                    <label class="col-md-2 col-from-label">Short Description <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Short Description">{{ $product->short_desc ?? old('short_desc') }}</textarea>
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label class="col-md-2 col-from-label">Tags <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input id="tags_1" type="text" class="tags form-control"
                            value="{{ $product->tags ?? old('tags') }}" name="tags" /></p>
                        <small class="text-muted">This is used for search.
                            Input those words by which cutomer can find this
                            product.</small>
                    </div>
                </div>

                

                <div class="form-group mb-3 row">
                    <div class="col-md-12">
                        <button onclick="addMoreTab()" type="button" class="btn btn-success btn-sm">Add Tab</button>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @if (isset($product->tabs))
                            @foreach ($product->tabs as $tab)
                                <x-backend.accordion-item :tab="$tab"/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
