@extends('backend.layout')
@section('title','Attribute Set')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Attribute Set</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($attribute_set->id) ? route('backend.attribute-set.update',$attribute_set->id): route('backend.attribute-set.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($attribute_set->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$attribute_set->id ?? ''}}">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Name</label>
                                            <input type="text" id="simpleinput" class="form-control" name="name" value="{{$attribute_set->name ?? old('name')}}">
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