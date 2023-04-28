@extends('backend.layout')
@section('title','Permission')
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
                            <a href='{{route('backend.permission.create')}}' class="btn btn-sm btn-primary">Add</a>
                        </div>
                        <h4 class="page-title">Permissions List</h4>
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
                                         </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($permissions as $key => $permission)
                                           <tr>
                                               <td>{{ $loop->iteration }}</td>
                                               <td>{{ $permission->name }}</td>
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