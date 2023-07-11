@extends('frontend.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/demo1.css') }}" />
@endsection
@section('content')
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                @include('frontend.user.sidebar')
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="ec-vendor-block-bg">
                                                <a href="#" class="btn btn-lg btn-primary"
                                                    data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal"
                                                    data-bs-target="#edit_modal">Edit Detail</a>
                                            </div>
                                            <div class="ec-vendor-block-detail">
                                                <img class="v-img" src="{{asset('storage/'.auth()->user()->profile)}}" alt="vendor image">
                                                <h5 class="name">{{auth()->user()->full_name}}</h5>
                                                <p>( Business Man )</p>
                                            </div>
                                            <p>Hello <span>{{auth()->user()->full_name}}!</span></p>
                                            <p>From your account you can easily view and track orders. You can manage and
                                                change your account information like address, contact information and
                                                history of orders.</p>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>Account Information <a href="javasript:void(0)"
                                                            data-link-action="editmodal" title="Edit Detail"
                                                            data-bs-toggle="modal" data-bs-target="#edit_modal"><i
                                                                class="fi-rr-edit"></i></a></h6>
                                                    <ul>
                                                        <li><strong>Name  : </strong>{{auth()->user()->full_name}}</li>
                                                        <li><strong>Email  : </strong>{{auth()->user()->email}}</li>
                                                        <li><strong>Mobile Number : </strong>{{auth()->user()->mobile_number}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" id="edit_modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                            <form class="row g-3" action="{{route('user.update-profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="ec-vendor-block-bg cover-upload">
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input type="file" id="thumbUpload01" class="ec-image-upload"
                                                accept=".png, .jpg, .jpeg">
                                            <label><i class="fi-rr-edit"></i></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image-thumb-preview ec-image-preview v-img"
                                                    src="assets/images/banner/8.jpg" alt="edit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-vendor-block-detail">
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input type="file" name="profile" id="thumbUpload02" class="ec-image-upload"
                                                accept=".png, .jpg, .jpeg">
                                            <label><i class="fi-rr-edit"></i></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image-thumb-preview ec-image-preview v-img"
                                                    src="{{asset('storage/'.auth()->user()->profile)}}" alt="edit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-vendor-upload-detail">
                                    
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">First name</label>
                                            <input type="text" name="fname" value="{{ auth()->user()->fname}}" class="form-control">
                                        </div>
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Last name</label>
                                            <input type="text"  name="lname" value="{{ auth()->user()->lname}}" class="form-control">
                                        </div>
                                        <div class="col-md-12 space-t-15">
                                            <label class="form-label">Email</label>
                                            <input type="text" readonly value="{{auth()->user()->email}}" class="form-control">
                                        </div>
                                        <div class="col-md-12 space-t-15">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text"  name="mobile_number" value="{{ auth()->user()->mobile_number}}" class="form-control">
                                        </div> 
                                        <div class="col-md-12 space-t-15">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="#" class="btn btn-lg btn-secondary qty_close"
                                                data-bs-dismiss="modal" aria-label="Close">Close</a>
                                        </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
