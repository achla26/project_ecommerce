@extends('backend.layout')
@section('title','Currency')
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
                            <a href='{{route('backend.currency.create')}}' class="btn btn-sm btn-primary">Add</a>
                        </div>
                        <h4 class="page-title">Categories List</h4>
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
                                              <th>ID</th>
                                              <th>Image</th>
                                              <th>Currency</th>
                                              <th>Parent Currency</th>
                                              <th>Section</th>
                                              <th>Status</th>
                                              <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($currencies as $currency)
                                            @if(!isset($currency->parentcategory->name))
                                              <?php $parent_category = "Root"; ?>
                                            @else
                                              <?php $parent_category = $currency->parentcategory->name; ?>
                                              @endif
                                            <tr>
                                              <td>{{ $currency->id }}</td>
                                              <td><img src="{{ !empty($currency->icon) ? asset('storage/'.$currency->icon) : asset('storage/uploads/no-image.jpg')}}" style="height:50px;width:60px;"></td>
                                              <td>{{ $currency->name }}</td>
                                              <td>{{ $parent_category }}</td>
                                              <td>{{ $currency->section->name }}</td>
                                              <td>
                                                <div id="update-status{{$currency->id}}">
                                                    @if($currency->status == 'active')
                                                        @php
                                                            $status = 'deactive';
                                                            $btn = 'success';
                                                            $url = route('backend.currency.status');
                                                        @endphp
                                                    @else
                                                        @php
                                                            $status = 'active';
                                                            $btn = 'warning';
                                                            $url = route('backend.currency.status');
                                                        @endphp
                                                    @endif
                                                
                                                    <a  onclick= "updateStatus('{{$status}}','{{$currency->id}}','{{$url}}','#update-status{{$currency->id}}')" class="btn btn-{{$btn}} btn-sm">{{ucfirst($currency->status)}}</a>
                                                </div>
                                             </td>
                                             <td>
                                                <form action="{{ route('backend.currency.destroy',$currency->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this item')">

                                                    <a href="{{route('backend.currency.edit',$currency->id)}}"class="btn btn-primary btn-sm action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    
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