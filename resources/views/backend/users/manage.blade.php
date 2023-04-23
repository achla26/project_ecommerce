@extends('backend.layout')
@section('title','User')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($user->id) ? route('backend.user.update',$user->id): route('backend.user.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($user->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$user->id ?? ''}}">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">First Name</label>
                                            <input type="text" id="simpleinput" class="form-control" name="fname" value="{{$user->fname ?? old('fname')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Last Name</label>
                                            <input type="text" id="simpleinput" class="form-control" name="lname" value="{{$user->lname ?? old('lname')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <label for="simpleinput" class="form-label">Email</label>
                                            <input type="email" id="simpleinput" class="form-control" name="email" value="{{$user->email ?? old('email')}}">
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