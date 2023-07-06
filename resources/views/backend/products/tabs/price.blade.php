<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
    <div class="row">
        <h3 class="box-title">Product price + stock</h3>
        <div class="form-group mb-3 row">
            <label class="col-md-3 col-from-label">Unit price <span class="text-danger">*</span></label>
            <div class="col-md-6">
                <input type="number" min="0" value="{{ $product->unit_price ?? old('unit_price') }}"
                    step="0.01" placeholder="Unit price" name="unit_price" class="form-control" id="unit_price">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-md-3 col-from-label">Unit Mrp <span class="text-danger">*</span></label>
            <div class="col-md-6">
                <input type="number" id="unit_mrp" min="0" value="{{ $product->unit_mrp ?? old('unit_mrp') }}"
                    step="0.01" placeholder="Unit Mrp" name="unit_mrp" class="form-control">
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-md-3 col-from-label">
                Set Point
            </label>
            <div class="col-md-6">
                <input type="number" min="0" value="{{ $product->reward_point ?? old('reward_point') }}"
                    step="1" placeholder="1" name="reward_point" class="form-control">
            </div>
        </div>
        <div id="show-hide-div" style="display: none;">
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Quantity <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <input type="number" min="0" value="{{ $product->current_stock ?? old('current_stock') }}"
                        step="1" placeholder="Quantity" name="current_stock" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-md-3 col-from-label">
                External link
            </label>
            <div class="col-md-9">
                <input type="text" placeholder="External link"
                    value="{{ $product->external_link ?? old('external_link') }}" name="external_link"
                    class="form-control">
                <small class="text-muted">Leave it blank if you do not use
                    external site link</small>
            </div>
        </div>
        <div class="form-group mb-3 row">
            <label class="col-md-3 col-from-label">
                External link button text
            </label>
            <div class="col-md-9">
                <input type="text" placeholder="External link button text"
                    value="{{ $product->external_link_btn ?? old('external_link_btn') }}" name="external_link_btn"
                    class="form-control">
                <small class="text-muted">Leave it blank if you do not use
                    external site link</small>
            </div>
        </div>
    </div>
</div>