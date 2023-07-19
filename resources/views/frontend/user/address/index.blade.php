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
                    @if (count($get_types) < count($types))
                        <div class="row">
                            <div class="col-md-12 text-end mb-2">
                                <a href="{{route('user.address.create')}}" class="btn btn-lg btn-primary">Add Address</a>
                            </div>
                        </div>
                    @endif
                    
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="row">
                                            @foreach ($addresses as $address)
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                        <h6>{{ucfirst($address->type)}} Address  <a href="{{route('user.address.edit',$address->id)}}"><i class="fi-rr-edit"></i></a>
                                                            <form action="{{ route('user.address.destroy',$address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item')">
                                                                @csrf
                                                                @method('DELETE')                                                  
                                                                <button type="submit" class="fi-rr-trash"></button>
                                                            </form>
                                                        </h6>
                                                        <ul>
                                                            <li><strong>Name  : </strong>{{auth()->user()->full_name}}</li>
                                                            <li><strong>Email  : </strong>{{auth()->user()->email}}</li>
                                                            <li><strong>Mobile Number : </strong>{{auth()->user()->mobile_number}}</li>
                                                            <li><strong>Address1 : </strong>{{$address->address1}}</li>
                                                            <li><strong>Address2 : </strong>{{$address->address2}}</li>
                                                            <li><strong>City : </strong>{{$address->city->name}}</li>
                                                            <li><strong>State : </strong>{{$address->state->name}}</li>
                                                            <li><strong>Country : </strong>{{$address->country->name}}
                                                                {{$address->postcode}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
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
@endsection
