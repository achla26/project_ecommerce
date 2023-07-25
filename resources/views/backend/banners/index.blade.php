@extends('backend.layout')
@section('title','Banner')
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
                            <a href='{{route('backend.banner.create')}}' class="btn btn-sm btn-success">Add</a>
                        </div>
                        <h4 class="page-title">Banners List</h4>
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
                                                <th>Sr No.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($banners as $banner)
                                                <tr>
                                                    <td>{{$banner->id}}</td>
                                                    <td><img src="{{ !empty($banner->image) ? asset('storage/'.$banner->image) : asset('storage/uploads/no-image.jpg')}}" style="height:50px;width:60px;"></td>
                                                    <td>{{$banner->title}}</td>
                                                    <td>
                                                        <div id="update-status{{$banner->id}}">
                                                            @if($banner->status == 'active')
                                                                @php
                                                                    $status = 'deactive';
                                                                    $btn = 'success';
                                                                    $url = route('backend.banner.status');
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $status = 'active';
                                                                    $btn = 'warning';
                                                                    $url = route('backend.banner.status');
                                                                @endphp
                                                            @endif
                                                        
                                                            <a  onclick= "updateStatus('{{$status}}','{{$banner->id}}','{{$url}}','#update-status{{$banner->id}}')" class="btn btn-{{$btn}} btn-sm">{{ucfirst($banner->status)}}</a>
                                                        </div>
                                                     </td>
                                                    <td>
                                                        <form action="{{ route('backend.banner.destroy',$banner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item')">
   
                                                            <a href="{{route('backend.banner.edit',$banner->id)}}"class="btn btn-primary btn-sm action-image"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            
                                                            @csrf
                                                            @method('DELETE')
                                              
                                                            <button type="submit" class="btn btn-danger btn-sm action-image"><i class="mdi mdi-delete"></i></button>
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