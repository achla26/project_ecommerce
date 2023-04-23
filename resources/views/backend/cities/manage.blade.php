@extends('backend.layout')
@section('title','City')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage City</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($city->id) ? route('backend.city.update',$city->id): route('backend.city.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($city->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$city->id ?? ''}}">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Name</label>
                                            <input type="text" id="simpleinput" class="form-control" name="name" value="{{$city->name ?? old('name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Country</label>
                                            <select class="form-control" name="country_id"id="country_id">
                                                <option value="">-Select-</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}"  {{ isset($state->country_id) ?  ($state->country_id == $country->id) ? 'selected': '': '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group mb-3">
                                            <div id="appendState">
                                                @include('backend.cities.append_state')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Cost</label>
                                            <input type="text" id="simpleinput" class="form-control" name="cost" value="{{$city->cost ?? old('cost')}}">
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
$('#country_id').change(function(){
    var country_id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'post',
        url:"{{route('backend.city.append-state')}}",
        data:{country_id:country_id},
        success:function(resp){
            $("#appendState").html(resp);
        },error:function(){
            alert("Error");
        }
    });
});
</script>
@endsection