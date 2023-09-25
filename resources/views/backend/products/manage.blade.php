@extends('backend.layout')
@section('title', 'Product') 
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sumoselect@3.4.9/sumoselect.min.css">
<script src="https://cdn.tiny.cloud/1/0nsgay2x7ks322wvrjxj1wf3bpyozxbe2i40uz6edz52pdiu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <textarea>
    Welcome to TinyMCE!
  </textarea>
  <script>
    tinymce.init({
      selector: '.textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
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
                enctype="multipart/form-data" novalidate>
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
                                            <a class="nav-link" id="v-pills-desc-tab" data-bs-toggle="pill"
                                                href="#v-pills-desc" role="tab" aria-controls="v-pills-desc"
                                                aria-selected="false">
                                                <i class="mdi mdi-desc-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Description</span>
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
                                                aria-controls="v-pills-combination" aria-selected="false" style="display: {{(isset($product->type)  && $product->type == 'varient') ? "" :  "none" }} ;">
                                                <i class="mdi mdi-combination-outline d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Varients</span>
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
                                            @include('backend.products.tabs.info', $product)
                                            @include('backend.products.tabs.detail', $product)
                                            @include('backend.products.tabs.image', $product)
                                            @include('backend.products.tabs.price', $product)
                                            @include('backend.products.tabs.varient', $product)
                                            @include('backend.products.tabs.seo', $product)
                                            @include('backend.products.tabs.other', $product)
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
        function getProductAttributes() {
            let attr = [];
            let option_id = [];
            attr = $('#attribute_ids').val();
            $('.option_ids').each(function() {
                option_id.push($(this).val());
            });
        }


        function makeCombinations() {

            var varients = [];
            let price = $("#unit_price").val();
            let mrp = $("#unit_mrp").val();
            let sku = $("#unit_sku").val(); 
            let qty = $("#unit_qty").val(); 

            $(`select[name="attribute_id[]"] option:selected`).each(function() {
                varients.push($(this).val());
            });   
 

            $.ajax({
                url: "{{ route('backend.product.get-combinations') }}",
                data: {
                    varients , price ,mrp , sku ,qty
                },
                type: 'POST',
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
    
    <script>
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


        function getAttributes() {
            let attributes = $("#attribute_ids").val();
            $.ajax({
                type: 'post',
                url: "{{ route('backend.product.get-varients') }}",
                data: {
                    attributes
                },
                success: function(resp) {
                    $("#varients_wrapper").html(resp);

                },
                error: function() {
                    alert("Error");
                }
            });

        }

        $("[name=shipping_type]").on("change", function() {
            $(".flat_rate_shipping_div").hide();

            if ($(this).val() == 'flat_rate') {
                $(".flat_rate_shipping_div").show();
            }

        });

        function addMoreTab(){
            $.ajax({
                type: 'post',
                url: "{{ route('backend.product.append-accordion-div') }}",
                data: {},
                success: function(resp) {
                    $("#accordionFlushExample   ").append(resp);
                },
                error: function() {
                    alert("Error");
                }
            });
        }

        function getProductType(event){
            if(event.value == 'simple'){
                $("#v-pills-combination-tab").hide();
            }else{
                $("#v-pills-combination-tab").show();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sumoselect@3.4.9/jquery.sumoselect.min.js"></script>
    <script>
        $(".select-multi").SumoSelect({
            search: true,
            searchText: 'Enter here.'
        })
    </script>
@endsection
