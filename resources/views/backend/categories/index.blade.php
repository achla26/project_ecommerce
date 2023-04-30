@extends('backend.layout')
@section('title','Category')
@section('css')
@endsection
@push('scripts')
    @vite('resources/js/pages/category.js')
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href='{{route('backend.category.create')}}' class="btn btn-sm btn-primary">Add</a>
                        </div>
                        <h4 class="page-title">Categories List</h4>
                    </div>
                </div>
            </div>
            <div class="row">
            <!-- end page title -->
                    <div id="app">
                    <div class="col-12">
                        <custom-table 
                        :columns='tableColumns' 
                        :per-page = "perPage"
                        :items = "items"
                        {{-- :update-status = "updateStatus" --}}
                        update-link = "{{route('backend.category.edit', '__')}}"
                        :module = "module"
                        />
                    </div> <!-- container -->
                </div> <!-- container -->
            </div>
    </div>
</div>
@endsection

@section('script')
   
@endsection