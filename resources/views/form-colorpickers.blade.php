@section('title') 
Orbiter - Form Color Picker
@endsection 
@extends('layouts.main')
@section('style')
<!-- Color Picker css -->
<link href="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css">
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Color Picker</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Color Picker</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- End col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Default Color Picker</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Most simple example, with any options or color information.</h6>
                    <input id="default-color" type="text" class="form-control input-lg" value="#0080ff"/>
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">RGB Color Picker</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Most simple example, with any options or color information.</h6>
                    <input id="rgb-color" type="text" class="form-control input-lg" value="#0080ff"/>
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Initial color</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Usage input <code>data-color</code> attribute, colopicker element <code>data-color</code> attribute.</h6>
                    <div id="initial-color" class="input-group" title="Using input value">
                      <input type="text" class="form-control input-lg" value="#0080ff"/>
                      <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                      </span>
                    </div>
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Initial RGB Color</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Usage input <code>data-color</code> attribute, colopicker element <code>data-color</code> attribute.</h6>
                    <div id="initial-rgb-color" class="input-group" title="Using input value">
                      <input type="text" class="form-control input-lg" value="#0080ff"/>
                      <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                      </span>
                    </div>
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Horizontal Mode</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">In this mode the hue and alpha bars are horizontal instead of vertical.</h6>
                    <div id="horizontal-color" class="input-group" title="Using input value">
                      <input type="text" class="form-control input-lg" value="#0080ff"/>
                      <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                      </span>
                    </div>
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Transparent</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Example showing the <code>transparent</code> named color support.</h6>
                    <div id="transparent-color" class="input-group" title="Using input value">
                      <input type="text" class="form-control input-lg" value="transparent"/>
                      <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                      </span>
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
<!-- Color Picker js -->
<script src="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-form-colorpicker.js') }}"></script>
@endsection 