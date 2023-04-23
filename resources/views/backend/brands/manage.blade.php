@extends('backend.layout')
@section('title','Brand')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Brand</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($brand->id) ? route('backend.brand.update',$brand->id): route('backend.brand.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($brand->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$brand->id ?? ''}}">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Name</label>
                                            <input type="text" id="simpleinput" class="form-control" name="name" value="{{$brand->name ?? old('name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="example-email" class="form-label">Image</label>
                                            <input type="file"   class="form-control" id="picture2" name="image" onchange="previewFile('#picture2','#previewImg2');">
                                        </div>
                                        <div class="col-3">
                                            @if (isset($section->image) && !empty($brand->image))
                                                <img id="previewImg2" src="{{asset('storage/'.$section->image)}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                            @else
                                                <img id="previewImg2" src="{{asset('assets/placeholder.jpg')}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                            @endif
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

@endsection