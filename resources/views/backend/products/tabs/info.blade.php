<div class="tab-pane fade active show" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="box-title">Product Information</h3>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Product Name <span class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" placeholder="Product Name"
                        value="{{ $product->name ?? old('name') }}">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">SKU<span class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU"
                        value="{{ $product->sku ?? old('sku') }}">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Section <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                        <option value="">Select</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}"
                                {{ isset($product->section_id) ? ($product->section_id == $section->id ? 'selected' : '') : '' }}>
                                {{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Category<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                    <div id="appendCategoriesLevel">
                        @include('backend.products.append_product_category', $product)
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 row" id="brand">
                <label class="col-md-3 col-from-label">Brand</label>
                <div class="col-md-8">
                    <select class="form-control" id="brand" name="brand">
                        <option value="">-Select-</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Unit</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="unit" placeholder="Unit (e.g. KG, Pc etc)"
                        value="{{ $product->unit ?? old('unit') }}">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Minimum Purchase Qty
                    <span class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="number" class="form-control" name="max_purchase_qty"
                        value="{{ $product->max_purchase_qty ?? old('max_purchase_qty') }}" min="1"
                        value="">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-md-3 col-from-label">Barcode</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="barcode" placeholder="Barcode"
                        value="{{ $product->value ?? old('value') }}">
                </div>
            </div>
        </div>
    </div>
</div>
