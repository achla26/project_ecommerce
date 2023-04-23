<div class="col-md-6 mb-3">
    <div class="row">
        <div class="col-md-5">
            <input type="file" multiple class="form-control" id="files" name="images[]" onchange="previewFile('#files','#{{$id}}');">
        </div>
        <div class="col-md-5">
            @if (isset($image) && !empty($image))
                <img id="{{$id}}" src="{{ asset('storage/' . $image) }}" alt="Uploaded Image Preview Holder"
                    width="100px" height="100px">
            @else
                <img id="{{$id}}" src="{{ asset('assets/placeholder.jpg') }}"  alt="Uploaded Image Preview Holder"
                    width="100px" height="100px">
            @endif
        </div>
        @if (isset($id) && !empty($id))
            <div class="col-md-2 mb-3">
                <a href="{{route('backend.product.remove-image',$id)}}" onclick="confirm('Are you sure?')" class="btn btn-sm btn-danger">X</a>
            </div>
        @endif
    </div>
</div>