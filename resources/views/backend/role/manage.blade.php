@extends('backend.layout')
@section('title','Role')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Role</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form  method="post" action="{{isset($role->id) ? route('backend.role.update',$role->id): route('backend.role.store')}}" enctype="multipart/form-data">
                                @csrf
                                @if (isset($role->id))
                                    @method('put')
                                @endif
                                
                                <input type="hidden" name="id" value="{{$role->id ?? ''}}">

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="simpleinput" class="form-label">Name</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" value="{{$role->name ?? old('name')}}">
                                    </div>
                                </div>
                                <div class="row ">
                                    <strong class="mb-2">Permission: 
                                        <label> <input type="checkbox" id="check_all">Check All</label>
                                    </strong>
                                    @foreach($permission as $permission)
                                        <div class="col-3 mb-2">
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{$permission->id}}" {{ isset($rolePermissions)  && in_array($permission->id , $rolePermissions) ? 'checked' : ''}}>{{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
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
    $("#check_all").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection