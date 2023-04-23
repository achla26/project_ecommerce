@extends('backend.layout')
@section('title','Coupon')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Coupon</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($coupon->id) ? route('backend.coupon.update',$coupon->id): route('backend.coupon.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($coupon->id))
                                    @method('put')
                                @endif

                                <input type="hidden" name="id" value="{{$coupon->id ?? ''}}">
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="coupon_option">Coupon Option</label>
                                            <input  type="radio" name="coupon_option" value="automatic" {{( isset($coupon->coupon_option) && $coupon->coupon_option== 'automatic') ? 'checked' :''}} onchange="couponOption(this);">Automatic
                                            <input type="radio" name="coupon_option" value="manual" onchange="couponOption(this);" {{( isset($coupon->coupon_option) && $coupon->coupon_option== 'manual') ? 'checked' :'checked'}}>Manual
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3"  {{( isset($coupon->coupon_code) &&  $coupon->coupon_code == 'manual') ? "style='display: block;'" : "style='display: none;'"}}  id="couponField">
                                    <div class="col-9">
                                        <label for="simpleinput" class="form-label">Coupon Code</label>
                                        <input type="text" id="simpleinput" class="form-control" name="coupon_code" value="{{$coupon->coupon_code ?? old('coupon_code')}}" placeholder="Enter Coupon Code">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="coupon_type">Coupon Type</label><br>
                                            <input  type="radio" name="coupon_type" value="multiple_time" {{( isset($coupon->coupon_type) && $coupon->coupon_type== 'multiple_time') ? 'checked' :''}}>Multiple Time
                                            <input type="radio" name="coupon_type" value="single_time" {{( isset($coupon->coupon_type) && $coupon->coupon_type== 'single_time') ? 'checked' :''}}>Single Time
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="amount_type">Amount Type</label><br>
                                            <span><input  type="radio" name="amount_type" value="percentage" {{( isset($coupon->amount_type) && $coupon->amount_type == 'percentage') ? 'checked' :''}}>Percentage
                                            <span><input type="radio" name="amount_type" value="fixed" {{( isset($coupon->amount_type) && $coupon->amount_type == 'fixed') ? 'checked' :''}}>Fixed
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <label for="simpleinput" class="form-label">Amount</label>
                                        <input type="text" id="simpleinput" class="form-control" name="amount" value="{{$coupon->amount ?? old('amount')}}" placeholder="Enter Amount">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="amount_type">Select Categories</label><br>
                                            <select name="categories[]" class="form-control select2" multiple="" >
                                                <option value="">Select</option>
                                                @foreach($categories as $section)
                                                  <optgroup label="{{ $section['name'] }}"></optgroup>
                                                  @foreach($section['categories'] as $category)
                                                    <option value="{{ $category['id'] }}" {{ isset($coupon->categories) ? in_array($category['id'],(json_decode($coupon->categories))) ? 'selected':'' : ''}}>&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{ $category['name']}}</option>
                                                    @foreach($category['subcategories'] as $subcategory)
                                                      <option value="{{ $subcategory['id'] }}" {{ isset($coupon->categories) ?  in_array($subcategory['id'],(json_decode($coupon->categories))) ? 'selected':'' : ''}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $subcategory['name']}}</option>
                                                    @endforeach
                                                  @endforeach
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="users">Select Users</label><br>
                                            <select name="users[]" class="form-control select2" multiple="">
                                                <option value="">Select</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{isset($coupon->categories) ?  in_array($user->id,(json_decode($coupon->users))) ? 'selected':'':''}}>{{ $user->email}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-9">
                                        <label for="simpleinput" class="form-label">Expiry Date</label>
                                        <input type="datetime-local" id="simpleinput" class="form-control" name="expiry_date" value="{{$coupon->expiry_date ?? old('expiry_date')}}" placeholder="Enter Expiry Date">
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
<script>
    function couponOption(e) {
        if (e.value == 'automatic') {
            $("#couponField").hide();
        } else {
            $("#couponField").show();
        }
    }

</script>
@endsection
