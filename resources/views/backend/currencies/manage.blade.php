@extends('backend.layout')
@section('title','Currency')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Currency</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">     
                          
                            <form  method="post" action="{{isset($currency->id) ? route('backend.currency.update',$currency->id): route('backend.currency.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$currency->id ?? ''}}">
                                @if (isset($currency->id))
                                    @method('put')
                                @endif
                              
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
                                            <a class="nav-link" id="v-pills-seo-tab" data-bs-toggle="pill" href="#v-pills-seo" role="tab" aria-controls="v-pills-seo"
                                                aria-selected="false">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">SEO</span>
                                            </a>
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-sm-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="name">Currency Name</label>
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Currency Name" value="{{ $currency->name  ??   old('name')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label>Select Section</label>
                                                            <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                                                                <option value="">Select</option>
                                                                    @foreach($sections as $section)
                                                                        <option value="{{ $section->id }}" {{ isset($currency->section_id) ?  ($currency->section_id == $section->id) ? 'selected': '': '' }}>{{ $section->name }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <div id="appendCategoriesLevel">
                                                                @include('backend.currencies.append_category_level',$currency)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="discount">Currency Discount</label>
                                                            <input type="number" class="form-control" id="discount" name="discount" placeholder="Currency Discount" value="{{ $currency->discount  ??   old('discount') }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="description">Currency Description</label>
                                                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..."> {{  $currency->description ??  old('description')}} </textarea>
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
                                                            @if (isset($currency->icon) && !empty($currency->icon))
                                                                <img id="previewImg1" src="{{asset('storage/'.$currency->icon)}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
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
                                                            @if (isset($currency->image) && !empty($currency->image))
                                                                <img id="previewImg2" src="{{asset('storage/'.$currency->image)}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                                            @else
                                                                <img id="previewImg2" src="{{asset('assets/placeholder.jpg')}}" alt="Uploaded Image Preview Holder" width="150px" height="150px">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="meta_title">Meta Title</label>
                                                            <textarea id="meta_title" name="meta_title" class="form-control" rows="3" placeholder="Enter ...">{{  $currency->meta_title ??  old('meta_title')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="meta_description">Meta Description</label>
                                                            <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ...">{{  $currency->meta_description ??  old('meta_description')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="meta_keywords">Meta Keywords</label>
                                                            <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3" placeholder="Enter ...">{{  $currency->meta_keywords ??  old('meta_keywords')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group mb-3">
                                                            <label for="meta_title">Meta Title</label>
                                                            <textarea id="meta_title" name="meta_title" class="form-control" rows="3" placeholder="Enter ...">{{  $currency->meta_title ??  old('meta_title')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                              
                          </form>
                        </div>             

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->

    </div>
@endsection
@section('script')
<script>
    function previewFile(input){
         var file = $("#picture2").get(0).files[0];
    
         if(file){
             var reader = new FileReader();
    
             reader.onload = function(){
                 $("#previewImg").attr("src", reader.result);
             }
    
             reader.readAsDataURL(file);
         }
     }
     // Append Categories Level
	$('#section_id').change(function(){
		var section_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax({
			type:'post',
			url:"{{route('backend.currency.append-currencies')}}",
			data:{section_id:section_id},
			success:function(resp){
				$("#appendCategoriesLevel").html(resp);
			},error:function(){
				alert("Error");
			}
		});
	});
 </script>
@endsection