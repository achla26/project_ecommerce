@extends('backend.layout')
@section('title','State')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage State</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($state->id) ? route('backend.state.update',$state->id): route('backend.state.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($state->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$state->id ?? ''}}">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Name</label>
                                            <input type="text" id="simpleinput" class="form-control" name="name" value="{{$state->name ?? old('name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Country</label>
                                            <select class="form-control" name="country_id">
                                                <option value="">-Select-</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}"  {{ isset($state->country_id) ?  ($state->country_id == $country->id) ? 'selected': '': '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
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