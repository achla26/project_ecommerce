@extends('backend.layout')
@section('title','Tax')
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
                            <a href='{{route('backend.tax.create')}}' class="btn btn-sm btn-success">Add</a>
                        </div>
                        <h4 class="page-title">Taxs List</h4>
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
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($taxes as $tax)
                                                <tr>
                                                    <td>{{$tax->id}}</td>
                                                    <td>{{$tax->name}}</td>
                                                    <td>
                                                        <div id="update-status{{$tax->id}}">
                                                            @if($tax->status == 'active')
                                                                @php
                                                                    $status = 'deactive';
                                                                    $btn = 'success';
                                                                    $url = route('backend.tax.status');
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $status = 'active';
                                                                    $btn = 'warning';
                                                                    $url = route('backend.tax.status');
                                                                @endphp
                                                            @endif
                                                        
                                                            <a  onclick= "updateStatus('{{$status}}','{{$tax->id}}','{{$url}}','#update-status{{$tax->id}}')" class="btn btn-{{$btn}} btn-sm">{{ucfirst($tax->status)}}</a>
                                                        </div>
                                                     </td>
                                                    <td>
                                                        <form action="{{ route('backend.tax.destroy',$tax->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item')">
   
                                                            <a href="{{route('backend.tax.edit',$tax->id)}}"class="btn btn-primary btn-sm action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            
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