@section('title') 
Orbiter - Google Map
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Google</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Maps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Google</li>
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
                    <h5 class="card-title">Basic</h5>
                </div>
                <div class="card-body">
                    <div id="basic-map" class="gmaps"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Marker</h5>
                </div>
                <div class="card-body">
                    <div id="markers-map" class="gmaps"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Polylines</h5>
                </div>
                <div class="card-body">
                    <div id="polylines-map" class="gmaps"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Polygon</h5>
                </div>
                <div class="card-body">
                    <div id="polygon-map" class="gmaps"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Route</h5>
                </div>
                <div class="card-body">
                    <div id="route-map" class="gmaps"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Search Location Map</h5>
                </div>
                <div class="card-body">
                    <form method="post" id="geocoding_form" class="m-b-20">
                         <div class="input-group mb-3">
                            <input type="text" id="address" class="form-control fill" placeholder="Search your place" aria-label="Search your place" aria-describedby="button-addon2">
                               <div class="input-group-append">
                                <button class="btn btn-primary">Search Location</button>
                               </div>
                         </div>                                 
                    </form>
                 <div id="mapGeo" class="gmaps"></div>
             </div>
            </div>
        </div>
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Street View Panoramas</h5>
                </div>
                <div class="card-body">
                    <div id="panoramas-map" class="gmaps"></div>
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
<!-- Google Maps JS -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAHkwvENanRtWflk3OycbzcnhwEtR2mz6c"></script>
<script src="{{ asset('assets/plugins/gmaps/gmaps.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-gmaps.js') }}"></script>
@endsection 