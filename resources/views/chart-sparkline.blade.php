@section('title') 
Orbiter - Sparkline Chart
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Sparkline</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Charts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sparkline</li>
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
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Line Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-line"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Area Line Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-area-line"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Pie Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-pie"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Bar Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-bar"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Composite Bar Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-composite-bar"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tristate Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-tristate"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Discrete Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-discrete"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Bullet Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-bullet"></div>
                </div>
            </div>
        </div>    
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Box Plot Chart</h5>
                </div>
                <div class="card-body text-center">                                
                    <div id="sparkline-box-plot"></div>
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
<!-- Sparkline Chart JS -->
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script> 
<script src="{{ asset('assets/js/custom/custom-chart-sparkline.js') }}"></script>
@endsection 