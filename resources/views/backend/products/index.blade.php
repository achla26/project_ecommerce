@extends('backend.layout')
@section('title','Product')
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
                        <div class="page-title-right">
                            <a href='{{route('backend.product.create')}}' class="btn btn-sm btn-success">Add</a>
                        </div>
                        <h4 class="page-title">Products List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if(Session::has('success_msg'))
                <x-alert
                    type='success'
                    msg="{{Session::get('success_msg')}}"
                />
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <table id="example" class="table dt-responsive nowrap table-striped w-100">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product) 
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>
                                                        @if (isset($product['thumbnail']) && !empty($product['thumbnail']))
                                                            <img class="main-image"
                                                                src="{{ asset('storage/' . $product['thumbnail']) }}" style="height:50px;width:60px;" alt="Product" />
                                                        @endif 
                                                    <td>{{$product->name}}</td>
                                                    <td>
                                                        <div id="update-status{{$product->id}}">
                                                            @if($product->status == 'active')
                                                                @php
                                                                    $status = 'deactive';
                                                                    $btn = 'success';
                                                                    $url = route('backend.product.status');
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $status = 'active';
                                                                    $btn = 'warning';
                                                                    $url = route('backend.product.status');
                                                                @endphp
                                                            @endif
                                                        
                                                            <a  onclick= "updateStatus('{{$status}}','{{$product->id}}','{{$url}}','#update-status{{$product->id}}')" class="btn btn-{{$btn}} btn-sm">{{ucfirst($product->status)}}</a>
                                                        </div>
                                                     </td>
                                                    <td>
                                                        <form action="{{ route('backend.product.destroy',$product->id) }}" method="POST">
   
                                                            <a href="{{route('backend.product.edit',$product->id)}}"class="btn btn-primary btn-sm action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            
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
      
@endsection