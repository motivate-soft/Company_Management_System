@section('title') 
Orbiter - Switchery
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Switchery</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Advanced UI</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Switchery</li>
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
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Basic Switchery Examples</h5>
                </div>
                <div class="card-body">
                    <div class="switchery-list">
                        <input type="checkbox" class="js-switch-primary" checked />
                        <input type="checkbox" class="js-switch-secondary" checked />
                        <input type="checkbox" class="js-switch-success" checked />
                        <input type="checkbox" class="js-switch-danger" checked />
                        <input type="checkbox" class="js-switch-warning" checked />
                        <input type="checkbox" class="js-switch-info" checked />
                        <input type="checkbox" class="js-switch-light" checked />
                        <input type="checkbox" class="js-switch-dark" checked />
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Large Switchery Examples</h5>
                </div>
                <div class="card-body">
                    <div class="switchery-list">
                        <input type="checkbox" class="js-switch-primary-large" checked />
                        <input type="checkbox" class="js-switch-secondary-large" checked />
                        <input type="checkbox" class="js-switch-success-large" checked />
                        <input type="checkbox" class="js-switch-danger-large" checked />
                        <input type="checkbox" class="js-switch-warning-large" checked />
                        <input type="checkbox" class="js-switch-info-large" checked />
                        <input type="checkbox" class="js-switch-light-large" checked />
                        <input type="checkbox" class="js-switch-dark-large" checked />
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Multicolor Switchery Examples</h5>
                </div>
                <div class="card-body">
                    <div class="switchery-list">
                        <input type="checkbox" class="js-switch-primary-multicolor" checked />
                        <input type="checkbox" class="js-switch-secondary-multicolor" checked />
                        <input type="checkbox" class="js-switch-success-multicolor" checked />
                        <input type="checkbox" class="js-switch-danger-multicolor" checked />
                        <input type="checkbox" class="js-switch-warning-multicolor" checked />
                        <input type="checkbox" class="js-switch-info-multicolor" checked />
                        <input type="checkbox" class="js-switch-light-multicolor" checked />
                        <input type="checkbox" class="js-switch-dark-multicolor" checked />
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Small Switchery Examples</h5>
                </div>
                <div class="card-body">
                    <div class="switchery-list">
                        <input type="checkbox" class="js-switch-primary-small" checked />
                        <input type="checkbox" class="js-switch-secondary-small" checked />
                        <input type="checkbox" class="js-switch-success-small" checked />
                        <input type="checkbox" class="js-switch-danger-small" checked />
                        <input type="checkbox" class="js-switch-warning-small" checked />
                        <input type="checkbox" class="js-switch-info-small" checked />
                        <input type="checkbox" class="js-switch-light-small" checked />
                        <input type="checkbox" class="js-switch-dark-small" checked />
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Multicolor On - Off Switchery Examples</h5>
                </div>
                <div class="card-body">
                    
                        <input type="checkbox" class="js-switch-primary-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-secondary-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-success-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-danger-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-warning-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-info-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-light-multicolor-on-off" checked />
                        <input type="checkbox" class="js-switch-dark-multicolor-on-off" checked />
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
<!-- Custom Switchery js -->
<script src="{{ asset('assets/js/custom/custom-switchery.js') }}"></script>
@endsection 