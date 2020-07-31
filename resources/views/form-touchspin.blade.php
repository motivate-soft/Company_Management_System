@section('title') 
Orbiter - Form Touch Spin
@endsection 
@extends('layouts.main')
@section('style')
<!-- Touchspin css -->
<link href="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Touchspin</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Touchspin</li>
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
                    <h5 class="card-title">Value Attribute</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-value-attribute" name="touchspin-value-attribute" value="50">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Empty Value</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-empty-value" name="touchspin-empty-value" value="">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Postfix</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-postfix" name="touchspin-postfix" value="55">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Prefix</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-prefix" name="touchspin-prefix" value="0">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Value Attribute is not set</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-value-attr-not-set" name="touchspin-value-attr-not-set" value="">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Value is set explicitly to 33</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-value-set-explicitly" name="touchspin-value-set-explicitly" value="33">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Vertical Button</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-vertical-btn" name="touchspin-vertical-btn" value="0">
                </div>
            </div>
        </div>  
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Change button class</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" id="touchspin-change-btn-class" name="touchspin-change-btn-class" value="0">
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
<!-- Touchspin js -->
<script src="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-form-touchspin.js') }}"></script>
@endsection 