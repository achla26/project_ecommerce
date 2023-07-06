@extends('backend.layout')
@section('title', 'Product')
@section('css')
@endsection
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form id="form" method="post"
                action="{{ isset($product->id) ? route('backend.product.update', $product->id) : route('backend.product.store') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
                @if (isset($product->id))
                    @method('put')
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-2 mb-sm-0">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link active show" id="v-pills-info-tab" data-bs-toggle="pill"
                                                href="#v-pills-info" role="tab" aria-controls="v-pills-info"
                                                aria-selected="true">
                                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                <span class="d-none d-md-block">General</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                aria-selected="false">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Images</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                                href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                                aria-selected="false">
                                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Unit/Price</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-combination-tab" data-bs-toggle="pill"
                                                href="#v-pills-combination" role="tab"
                                                aria-controls="v-pills-combination" aria-selected="false">
                                                <i class="mdi mdi-combination-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Varients</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-desc-tab" data-bs-toggle="pill"
                                                href="#v-pills-desc" role="tab" aria-controls="v-pills-desc"
                                                aria-selected="false">
                                                <i class="mdi mdi-desc-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Description</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-seo-tab" data-bs-toggle="pill"
                                                href="#v-pills-seo" role="tab" aria-controls="v-pills-seo"
                                                aria-selected="false">
                                                <i class="mdi mdi-seo-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">SEO</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-other-tab" data-bs-toggle="pill"
                                                href="#v-pills-other" role="tab" aria-controls="v-pills-other"
                                                aria-selected="false">
                                                <i class="mdi mdi-other-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Other</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end col-->
                                    <div class="col-sm-9">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            @include('backend.products.tabs.info' , $product)
                                            @include('backend.products.tabs.detail' , $product)
                                            @include('backend.products.tabs.image' , $product)
                                            @include('backend.products.tabs.price' , $product)
                                            @include('backend.products.tabs.varient' , $product)
                                            @include('backend.products.tabs.seo' , $product)
                                            @include('backend.products.tabs.other' , $product)
                                        </div>
                                        <!-- end tab-content-->
                                    </div>
                                    <!-- end col-->
                                </div>
                                <!-- end row-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="Second group">
                                <button type="submit" value="publish" class="btn btn-success">Save &amp;
                                    Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
    </div><!-- end col-->
    </div>
    </form> <!-- end row-->
    </div> <!-- container -->
    </div>
@endsection
@section('script')

    <script>
        function make_combinations() {
            var fd = new FormData($('#form')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                url: "{{ route('backend.product.combination') }}",
                data: fd,
                type: 'POST',
                // dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#choice").html(response);
                }
            });

        }


        $("input[name='discount_category']").on('change', function() {
            if ($("#time_bound").prop("checked")) {
                $("#disp_disc").show();
            } else {
                $("#disp_disc").hide();
            }
        });

        $("#is_discount").on('change', function() {
            console.log("p")
            if ($("#is_discount").prop("checked")) {
                $("#disp_disc_div").show();
            } else {
                $("#disp_disc_div").hide();
            }
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('long_desc');
        CKEDITOR.replace('terms');
        CKEDITOR.replace('technical_specification');
        CKEDITOR.replace('warranty');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $("#add_product_img_div").on('click', function() {

                $.ajax({
                    type: 'post',
                    url: "{{ route('backend.product.append-image-div') }}",
                    data: {},
                    success: function(resp) {
                        $("#append_product_img_div").append(resp);
                    },
                    error: function() {
                        alert("Error");
                    }
                }); 
            });
        });


        function attr_previewFile(input, id) {
            var file = $("#attr_picture" + id).get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#attr_previewImg" + id).attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
        $('#section_id').change(function() {
            var section_id = $(this).val();
            
            $.ajax({
                type: 'post',
                url: "{{ route('backend.product.append-categories') }}",
                data: {
                    section_id: section_id
                },
                success: function(resp) {
                    $("#appendCategoriesLevel").html(resp);
                },
                error: function() {
                    alert("Error");
                }
            });
        });

        $("[name=shipping_type]").on("change", function (){
        $(".flat_rate_shipping_div").hide();

        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });
    </script>
@endsection
