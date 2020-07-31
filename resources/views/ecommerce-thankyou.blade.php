@section('title') 
Orbiter - Thank You
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Thank You</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">eCommerce</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thank You</li>
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
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Order Confirmed</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="thankyou-content text-center my-5">
                                <img src="assets/images/ecommerce/thankyou.svg" class="img-fluid mb-5" alt="thankyou">
                                <h2 class="text-success">Thank You !!!</h2>
                                <p class="my-4">Your Order has been successfully placed. Your Order ID is #9869572</p>
                                <div class="button-list">
                                    <button type="button" class="btn btn-primary-rgba font-16"><i class="feather icon-map-pin mr-2"></i>Track Order</button>
                                    <button type="button" class="btn btn-success font-16"><i class="feather icon-file-text mr-2"></i>View Invoice</button>
                                </div>
                            </div>
                        </div>
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