@extends('backend.layout')
@section('title','Role')
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
                            <a href='{{route('backend.role.create')}}' class="btn btn-sm btn-primary">Add</a>
                        </div>
                        <h4 class="page-title">Roles List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
           
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <table id="example" class="table dt-responsive nowrap table-striped w-100">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th width="280px">Action</th>
                                         </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($roles as $key => $role)
                                           <tr>
                                               <td>{{ $loop->iteration }}</td>
                                               <td>{{ $role->name }}</td>
                                               <td>
                                                <a href="{{route('backend.role.edit',$role->id)}}"class="btn btn-primary btn-sm action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                @if ($role->name != 'admin' && $role->name !='vendor')
                                                        
                                                    <form action="{{ route('backend.role.destroy',$role->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this item')">

                                                       
                                        
                                                        @csrf
                                                        @method('DELETE')
                                        
                                                        <button type="submit" class="btn btn-danger btn-sm action-icon"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                @endif

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