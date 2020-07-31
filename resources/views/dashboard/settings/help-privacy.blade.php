@section('title') 
Help & Privacy
@endsection 
@extends('layouts.main')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
<link href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Help & Privacy</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Help & Privacy</li>
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
                        <form method="post" action="{{ url('help_privacy') }}" >
                            @csrf
                            <div class="row mb-2">
                                <div class="col-sm-12 mb-3">
                                    <label>Help English</label>
                                    <textarea id="help_en" name="help_en" class="form-control" >@if(!is_null($help_en)){{$help_en->_value}}@endif</textarea>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label>Help Arabic</label>
                                    <textarea id="help_ar" name="help_ar" class="form-control" >@if(!is_null($help_ar)){{$help_ar->_value}}@endif</textarea>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label>Privacy English</label>
                                    <textarea id="privacy_en" name="privacy_en" class="form-control" >@if(!is_null($privacy_en)){{$privacy_en->_value}}@endif</textarea>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label>Privacy Arabic</label>
                                    <textarea id="privacy_ar" name="privacy_ar" class="form-control" >@if(!is_null($privacy_ar)){{$privacy_ar->_value}}@endif</textarea>
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
<!-- Summernote JS -->
<script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>
 
<script>
    $(document).ready(function() {
      $('#help_en').summernote();
      $('#help_ar').summernote();
      $('#privacy_en').summernote();
      $('#privacy_ar').summernote();
    });
</script>
@endsection 