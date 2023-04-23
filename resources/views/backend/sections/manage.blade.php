@extends('backend.layout')
@section('title','Section')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Section</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($section->id) ? route('backend.sections.update',$section->id): route('backend.sections.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($section->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$section->id ?? ''}}">
                                <div class="row">
                                    
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                                aria-selected="true">
                                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Description</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                aria-selected="false">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Image</span>
                                            </a>
                                        </div>
                                    </div> <!-- end col-->
                                
                                    <div class="col-sm-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label for="simpleinput" class="form-label">Name</label>
                                                            <input type="text" id="simpleinput" class="form-control" name="name" value="{{$section->name ?? old('name')}}">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <label for="example-email" class="form-label">Icon</label>
                                                            <input type="file"   class="form-control" id="picture1" name="icon" onchange="previewFile('#picture1','#previewImg1');">
                                                        </div>
                                                        <div class="col-3">
                                                            @if (isset($section->icon) && !empty($category->icon))
                                                                <img id="previewImg1" src="{{asset('storage/'.$section->icon)}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                                            @else
                                                                <img id="previewImg1" src="{{asset('assets/placeholder.jpg')}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                                            @endif
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
                                                            @if (isset($section->image) && !empty($section->image))
                                                                <img id="previewImg2" src="{{asset('storage/'.$section->image)}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                                            @else
                                                                <img id="previewImg2" src="{{asset('assets/placeholder.jpg')}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end col-->
                                </div>
                            
                            </form>
                            <!-- end row-->
                        </div>       
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div> <!-- container -->
@endsection
@section('script')

@endsection