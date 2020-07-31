@section('title') 
Social Links
@endsection 
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Social Links</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social Links</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('social.save') }}" >
                            @csrf
                            <div class="row mb-2">
                                <div class="col-sm-6 mb-3">
                                    <label>WhatsApp URL</label>
                                    <input type="text" class="form-control" name="WhatsApp" value="@if(!is_null($WhatsApp)){{$WhatsApp->_value}}@endif" >
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label>Twitter URL</label>
                                    <input type="text" class="form-control" name="Twitter" value="@if(!is_null($Twitter)){{$Twitter->_value}}@endif" >
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label>YouTube URL</label>
                                    <input type="text" class="form-control" name="YouTube" value="@if(!is_null($YouTube)){{$YouTube->_value}}@endif" >
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label>Instagram URL</label>
                                    <input type="text" class="form-control" name="Instagram" value="@if(!is_null($Instagram)){{$Instagram->_value}}@endif" >
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label>Facebook URL</label>
                                    <input type="text" class="form-control" name="Facebook" value="@if(!is_null($Facebook)){{$Facebook->_value}}@endif" >
                                </div> 
                            </div>
                            <input type="submit" value="Save" class="btn btn-primary" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
 
<!-- End Contentbar -->
@endsection 
@section('script')

<script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

<script>
    $(document).ready(function() {
    
        $('#default-datatable').DataTable();
    
    });
</script>
@endsection 