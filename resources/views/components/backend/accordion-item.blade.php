<div class="accordion-item" id="append_product_accordion_row{{ $tab->id ?? $counter }}">
    <div class="row d-flex align-items-center">
        <div class="col-sm-10">
            <h2>
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne{{ $tab->id ?? $counter }}" aria-expanded="false" aria-controls="flush-collapseOne{{ $tab->id ?? $counter }}">
                    Information Tab
                </button>
            </h2>
            <div id="flush-collapseOne{{ $tab->id ?? $counter }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="form-group mb-3 row">
                        <label for="technical_specification" class="col-sm-2 col-form-label ">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  id="long_desc" name="tabs[name][]" value="{{ $tab->name ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="technical_specification" class="col-sm-2 col-form-label ">Description</label>
                        <div class="col-sm-12">
                            <textarea class="form-control textarea" id="technical_specification" name="tabs[description][]"
                                placeholder="Description">{{ $tab->description ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            @if (isset($tab->id) && !empty($tab->id))
            <a href="{{ route('backend.product.remove-accordion', $tab->id) }}" onclick="confirm('Are you sure?')"
            class="btn btn-sm btn-danger">Remove</a>
        @else
            <button type="button" class="btn btn-danger btn-xs"
                onclick="remove('#append_product_accordion_row{{$counter ?? ''}}')">Remove</button>
        @endif
        </div>
    </div> 
    
</div>