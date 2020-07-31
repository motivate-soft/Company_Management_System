@section('title') 
Orbiter - Sweet Alerts
@endsection 
@extends('layouts.main')
@section('style')
<!-- Sweet Alert css -->
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Sweet Alerts</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Advanced UI</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sweet Alerts</li>
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
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Text</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-basic">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Title</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-title">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Success message with ok button</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-success">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Popup with IP address</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-dynamic">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Time for auto close</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-auto-close">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Popup with Ajax request</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-ajax">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Chaining modals like multiform step</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-chaining">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">By passing a parameter with cancel</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-params">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Popup with message and custom Image Header</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-image">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Popup with custom HTML description and buttons</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="custom-html">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Popup with message and custom css sush as width, padding and background</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="custom-padding-width">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Warning message, with the "Confirm" Button</h5>
                </div>
                <div class="card-body">
                    <div class="sweet-alert">
                        <button type="button" class="btn btn-primary" id="sa-warning">Show Demo</button>
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
<!-- Sweet-Alert js -->
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
@endsection 