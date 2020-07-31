@section('title') 
Orbiter - Tooltips
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Tooltips</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Basic UI</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tooltips</li>
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
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tooltip on Top</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Hover over the buttons below to see the four tooltips directions: top.</h6>
                    <div class="button-list">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                          Tooltip on top
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tooltip on Right</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Hover over the buttons below to see the four tooltips directions: right.</h6>
                    <div class="button-list">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                          Tooltip on right
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tooltip on Bottom</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Hover over the buttons below to see the four tooltips directions: Bottom.</h6>
                    <div class="button-list">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                          Tooltip on bottom
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tooltip on Left</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Hover over the buttons below to see the four tooltips directions: Left.</h6>
                    <div class="button-list">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
                          Tooltip on left
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tooltip Disabled</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Elements with the <code class="highlighter-rouge">disabled</code> attribute aren’t interactive, meaning users cannot focus, hover, or click them to trigger a tooltip (or popover). </h6>
                    <div class="button-list">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="right" title="Disabled tooltip">
                          <button class="btn btn-danger" style="pointer-events: none;" type="button" disabled>Disabled button</button>
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

@endsection 