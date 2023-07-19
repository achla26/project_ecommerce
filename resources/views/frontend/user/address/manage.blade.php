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
                    <div class="row">
                        <div class="col-md-12 text-end mb-2">
                            <a href="{{route('user.address.index')}}" class="btn btn-lg btn-primary">Back</a>
                  
                        </div>
                    </div>
                    
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <form class="row g-3" action="{{ isset($address) && !empty($address) ?  route('user.address.update' , $address->id) : route('user.address.store')}}" method="post" enctype="multipart/form-data">
                                @csrf  
                                @if (isset($address) && !empty($address))
                                @method('PUT')
                                @endif
                                <div class="ec-vendor-upload-detail">
                                    <div class="row">
                                        @if (isset($address) && !empty($address->type))
                                        
                                            <div class="col-md-12 space-t-15">
                                                <label class="form-label">Type</label>
                                                <input type="text" name="type" readonly  value="{{ $address->type}}" class="form-control"> 
                                            </div>
                                        @else
                                            <div class="col-md-12 space-t-15">
                                                <label class="form-label">Type</label>
                                                <select  name="type" id="type"class="form-select">
                                                    @foreach ($types as $type)
                                                        @if (!in_array($type , $get_types))
                                                        <option value="{{$type}}" {{ (isset($address->type) && $address->type == $type) ?? old('type') == $type}}>{{ucfirst($type)}}</option> 
                                                        @endif 
                                                    @endforeach                                    
                                                </select>
                                            </div>
                                        @endif
                                        
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">First name</label>
                                            <input type="text" readonly  value="{{ auth()->user()->fname}}" class="form-control">
                                        </div>
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Last name</label>
                                            <input type="text"  readonly  value="{{ auth()->user()->lname}}" class="form-control">
                                        </div>
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Email</label>
                                            <input type="text" readonly value="{{auth()->user()->email}}" class="form-control">
                                        </div>
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text"  readonly  value="{{ auth()->user()->mobile_number}}" class="form-control">
                                        </div>  
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Address1</label>
                                            <input type="text"  name="address1"  class="form-control" value="{{$address->address1 ?? old('address1')}}">
                                        </div> 
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Address2</label>
                                            <input type="text"  name="address2"  class="form-control" value="{{$address->address2 ?? old('address2')}}">
                                        </div> 
                                        <div class="col-md-6 space-t-15">
                                            <label class="form-label">Country</label>
                                            <select  name="country_id" class="form-select" id="country_id" onchange="getStates()">
                                                <option value="">-Select-</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}" {{isset($address->country_id) && $country->id == $address->country_id ? "selected":""}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 space-t-15"  id="state_wrapper" >
                                            @if (isset($states) && !empty($states))
                                                <label class="form-label">State</label>
                                                <select  name="state_id" id="state_id" class="form-select" onchange="getCitites(this)">
                                                    <option value="">-Select-</option> 
                                                    @foreach ($states as $state)
                                                        <option value="{{$state->id}}" {{$state->id == $address->state_id ? "selected":""}}>{{$state->name}}</option>    
                                                    @endforeach
                                                </select>
                                            @else
                                                <label class="form-label">State</label>
                                                <select  name="state_id" id="state_id" class="form-select" onchange="getCitites(this)">
                                                    <option value="">-Select-</option> 
                                                </select>
                                            @endif
                                           
                                        </div> 
                                        <div class="col-md-6 space-t-15"  id="province_wrapper" >
                                            <label class="form-label">Province</label>
                                            <input type="text"  name="province" id="province" value="{{$address->province ?? old('province')}}" class="form-control"/>
                                        </div> 
                                        <div class="col-md-6 space-t-15" id="city_wrapper">
                                            @if (isset($cities) && !empty($cities))
                                                <label class="form-label">State</label>
                                                <select  name="city_id" id="city_id" class="form-select">
                                                    <option>-Select-</option> 
                                                    @foreach ($cities as $city)
                                                        <option value="{{$city->id}}" {{$city->id == $address->city_id ? "selected":""}}>{{$city->name}}</option>                        
                                                    @endforeach
                                                </select>
                                            @else
                                                <label class="form-label">City</label>
                                                <select  name="city_id" id="city_id" class="form-select">
                                                    <option>-Select-</option> 
                                                </select>
                                            @endif
                                            
                                        </div> 
                                        <div class="col-md-6 space-t-15"  >
                                            <label class="form-label">PostCode</label>
                                            <input type="text"  name="postcode" id="postcode" value="{{$address->postcode ?? old('postcode')}}" class="form-control"/>
                                        </div> 
                                        <div class="col-md-12 space-t-15 mt-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
@section('script')
    <script>
        function getStates() {
            let country_id = document.querySelector("#country_id").value;
            $.ajax({
                type: "POST",
                url: "{{ route('get-states') }}",
                data: {
                    country_id
                },
                success: function(response) {
                    $("#state_wrapper").html(response)
                }
            });
        }

        function getCities() {
            let country_id = document.querySelector("#country_id").value;
            let state_id = document.querySelector("#state_id").value;
            $.ajax({
                type: "POST",
                url: "{{ route('get-cities') }}",
                data: {
                    country_id , state_id
                },
                success: function(response) {
                    $("#city_wrapper").html(response)
                }
            });
        }
    </script>
@endsection