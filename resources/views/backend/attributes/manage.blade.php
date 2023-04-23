@extends('backend.layout')
@section('title','Attribute')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Attributes</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{route('backend.attribute.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($attribute->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="attribute_set_id" value="{{$attribute_set->id}}">
                                
                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group mb-3">
                                            <label  class="form-label">Attribute Set Name</label>
                                            <input type="text"  class="form-control" placeholder="Value"  id="attribute_set_id" value="{{$attribute_set->name}}" readonly> 
                                            
                                        </div>
                                    </div>
                                </div>
                                        
                                <div class="row" >
                                    <div class="col-12">
                                        <label for="simpleinput" class="form-label">Values</label>
                                        <div class="row" id="attr_values">
                                            @if (isset($attributes))
                                            @php
                                                $rand = rand(1000,9999);
                                                // $values = collect($attributes)->pluck('name')->toArray();
                                            @endphp
                                                @foreach ($attributes as $item)
                                                @php
                                                    $id = $item->id;
                                                    $item = $item->name;
                                                @endphp
                                                    <x-backend.attribute-value
                                                        id={{$id}}
                                                        item={{$item}}
                                                        rand={{$rand}}
                                                    />      
                                                @endforeach     
                                            @endif                                            
                                        </div>
                                    </div>
                                                     
                                </div>
                                    

                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group mb-3">
                                            <button type="button" class="btn btn-info btn-sm" onclick="addMore()">Add More</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>             

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div> <!-- container -->

@endsection
@section('script')
<script>
    function addMore(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url:"{{route('backend.attribute.append-attribute-value')}}",
        data:{},
        success:function(resp) {
            $("#attr_values").append(resp);
        },
        error:function(){
            alert("Error");
        }
    });
    }
</script>
@endsection