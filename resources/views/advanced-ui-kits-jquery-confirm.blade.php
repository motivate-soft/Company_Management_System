@section('title') 
Orbiter - jQuery Confirm
@endsection 
@extends('layouts.main')
@section('style')
<!-- jQuery Confirm css -->
<link href="{{ asset('assets/plugins/jquery-confirm/css/jquery-confirm.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">jQuery Confirm</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Advanced UI</a></li>
                    <li class="breadcrumb-item active" aria-current="page">jQuery Confirm</li>
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
                    <h5 class="card-title mb-0">Simple Dialog</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="simple-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Confirm Dialog</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="confirm-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Prompt using Confirm</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="prompt-confirm-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Dialog without Button</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="btn-without-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Button keys 1</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="btn-keys-dialog">Show Demoo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Button keys 2</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="btn1-keys-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Error</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="error-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sucess</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="sucess-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Close Icon</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="close-icon-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Handle CloseIcon's Callback</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="handle-dialog">Show Demo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">Draggable</h5>
                </div>
                <div class="card-body">
                    <div class="jquery-confirm">
                        <button type="button" class="btn btn-primary" id="draggable-dialog">Show Demo</button>
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
<!-- jQuery Confirm js -->
<script src="{{ asset('assets/plugins/jquery-confirm/js/jquery-confirm.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-jquery-confirm.js') }}"></script>
@endsection 