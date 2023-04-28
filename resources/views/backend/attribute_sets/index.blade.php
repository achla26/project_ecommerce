@extends('backend.layout')
@section('title','Attribute Set')
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
                            <a href='{{route('backend.attribute-set.create')}}' class="btn btn-sm btn-success">Add</a>
                        </div>
                        <h4 class="page-title">Attribute Sets List</h4>
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
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attribute_sets as $attribute_set)
                                                <tr>
                                                    <td>{{$attribute_set->id}}</td>
                                                    <td>{{$attribute_set->name}}</td>
                                                    
                                                    <td>
                                                        
                                            
                                                        <form action="{{ route('backend.attribute-set.destroy',$attribute_set->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item')">
   
                                                            <a href="{{route('backend.attribute.create',$attribute_set->id)}}"class="btn btn-success btn-sm action-icon"> <i class="mdi mdi-bookmark-plus"></i></a>
                                                            
                                                            <a href="{{route('backend.attribute-set.edit',$attribute_set->id)}}"class="btn btn-primary btn-sm action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            
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