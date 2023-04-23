<div class="col-4 mb-4" id="add_more_{{$rand ?? ''}}"> 
    <div class="row">
        <div class="col-9">
            <input type="text"  class="form-control" placeholder="Value" name="name[]" value="{{$item ?? ''}}"> 
        </div>
        
        @if (isset($rand))
            <div class="col-3">
                @if (isset($id) && !empty($id))
                    <a href="{{ route('backend.attribute.destroy',$id) }}" onclick="return confirm('Are you sure you want to delete this item')"class="btn btn-danger btn-sm action-icon"><i class="mdi mdi-delete"></i></a>
                
                @else               
                    <button type="button" class="btn btn-danger btn-sm" onclick="remove('#add_more_{{$rand ?? ''}}')"><i class="uil uil-trash-alt" ></i></button>
                @endif
            </div> 
        @endif        
    </div>
</div>