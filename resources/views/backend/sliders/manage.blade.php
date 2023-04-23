@extends('backend.layout')
@section('title','Slider')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Slider</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($slider->id) ? route('backend.slider.update',$slider->id): route('backend.slider.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($slider->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$slider->id ?? ''}}">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Title</label>
                                            <input type="text" id="simpleinput" class="form-control" name="title" value="{{$slider->title ?? old('title')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Sub Title</label>
                                            <input type="text" id="simpleinput" class="form-control" name="sub_title" value="{{$slider->sub_title ?? old('sub_title')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Description</label>
                                            <input type="text" id="simpleinput" class="form-control" name="description" value="{{$slider->description ?? old('description')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Button Text</label>
                                            <input type="text" id="simpleinput" class="form-control" name="btn_text" value="{{$slider->btn_text ?? old('btn_text')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Button Link</label>
                                            <input type="text" id="simpleinput" class="form-control" name="btn_link" value="{{$slider->btn_link ?? old('btn_link')}}">
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
                                            @if (isset($slider->image) && !empty($slider->image))
                                                <img id="previewImg2" src="{{asset('storage/'.$slider->image)}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
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