@section('title') 
Orbiter - Chart Chart
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Chartjs</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Charts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chartjs</li>
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
                    <h5 class="card-title">Bubble Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-bubble-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Line Different Size Point Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-line-diff-size-point" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Basic Line Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-basic-line" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Line Stepped Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-line-stepped" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Scatter Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-scatter-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Line Point Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-line-point" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Bar Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-bar-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Horizontal Bar Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-horizontal-bar-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Multi Axis Bar Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-multi-axis-bar-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Stacked Bar Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-stacked-bar-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Line Bar Mixed Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-line-bar-mixed-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Boundary Area Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-boundary-area-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Dataset Area Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-dataset-area-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Stacked Area Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-stacked-area-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Radar Area Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-radar-area-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Radar Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-radar-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Doughnut Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-doughnut-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Pie Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-pie-chart" class="chartjs-chart"></canvas>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Polar Area Chart</h5>
                </div>
                <div class="card-body">
                    <canvas id="chartjs-polar-area-chart" class="chartjs-chart"></canvas>
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
<!-- Chart js -->
<script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/chart-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-chart-chartjs.js') }}"></script>
@endsection 