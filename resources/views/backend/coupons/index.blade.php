@extends('backend.layout')
@section('title','Coupon')
@section('css')
@include('backend.includes.data-table-header')
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href='{{route('backend.coupon.create')}}' class="btn btn-sm btn-success">Add</a>
                        </div>
                        <h4 class="page-title">Coupons List</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <table id="example" class="table dt-responsive nowrap table-striped w-100">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>Code</th>
                                              <th>Coupon Type</th>
                                              <th>Amount</th>
                                              <th>Expiry Date</th>
                                              <th>Status</th>
                                              <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($coupons as $coupon)
                                            <tr>
                                              <td>{{ $coupon->id }}</td>
                                              <td>{{ $coupon->coupon_code }}</td>
                                              <td>{{ $coupon->coupon_type }}</td>
                                              <td>
                                                  {{ $coupon->amount }}
                                                  @if($coupon->amount_type=="Percentage")
                                                    %
                                                  @else
                                                    INR
                                                  @endif
                                              </td>
                                              <td>{{ $coupon->expiry_date }}</td>
                                              <td>
                                                <div id="update-status{{$coupon->id}}">
                                                    @if($coupon->status == 'active')
                                                        @php
                                                            $status = 'deactive';
                                                            $btn = 'success';
                                                            $url = route('backend.coupon.status');
                                                        @endphp
                                                    @else
                                                        @php
                                                            $status = 'active';
                                                            $btn = 'warning';
                                                            $url = route('backend.coupon.status');
                                                        @endphp
                                                    @endif
                                                
                                                    <a  onclick= "updateStatus('{{$status}}','{{$coupon->id}}','{{$url}}','#update-status{{$coupon->id}}')" class="btn btn-{{$btn}} btn-sm">{{ucfirst($coupon->status)}}</a>
                                                </div>
                                             </td>
                                            <td>
                                                <form action="{{ route('backend.coupon.destroy',$coupon->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item')">

                                                    <a href="{{route('backend.coupon.edit',$coupon->id)}}"class="btn btn-primary btn-sm action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    
                                                    @csrf
                                                    @method('DELETE')
                                      
                                                    <button type="submit" class="btn btn-danger btn-sm action-icon"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                                                                               
                                </div> <!-- end preview-->
                            
                            </div> <!-- end tab-content-->

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->

    </div>
@endsection

@section('script')
@include('backend.includes.data-table-footer')        
@endsection