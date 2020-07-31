@section('title') 
Orbiter - Pricing
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Pricing</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item"><a href="#">Basic</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pricing</li>
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
    <div class="row align-items-center justify-content-center">
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body p-0">
                    <div class="pricing text-center">
                        <div class="pricing-top">
                            <h4 class="text-success mb-0">Starter</h4>
                            <img src="assets/images/pricing/pricing-starter.svg" class="img-fluid my-4" alt="starter pricing">
                            <div class="pricing-amount">
                                <h3 class="text-success mb-0"><sup>$</sup>99</h3>
                                <h6 class="pricing-duration">Per Year</h6>
                            </div>
                        </div>
                        <div class="pricing-middle">
                            <ul class="list-group">
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>100 GB Disk Space</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>10 Email</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>5 Domain</li>
                              <li class="list-group-item"><i class="feather icon-x mr-2"></i>SSL Certificate</li>
                              <li class="list-group-item"><i class="feather icon-x mr-2"></i>24/7 Support</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom pricing-bottom-basic">
                            <div class="pricing-btn">
                                <button type="button" class="btn btn-success font-16">Purchase</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body p-0">
                    <div class="pricing text-center">
                        <p class="text-center text-white mb-0"><span class="badge badge-primary text-uppercase rounded-top-0 font-16">Popular</span></p>
                        <div class="pricing-top">                                        
                            <h3 class="text-primary mb-0">Premium</h3>
                            <img src="assets/images/pricing/pricing-premium.svg" class="img-fluid price-pro-image my-4" alt="premium pricing">
                            <div class="pricing-amount">
                                <h2 class="text-primary mb-0"><sup>$</sup>299</h2>
                                <h5 class="pricing-duration">Per Year</h5>
                            </div>
                        </div>
                        <div class="pricing-middle">
                            <ul class="list-group">
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>10 GB Disk Space</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>1 Email</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>1 Domain</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>SSL Certificate</li>
                              <li class="list-group-item"><i class="feather icon-x mr-2"></i>24/7 Support</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom pricing-bottom-professional">                                        
                            <div class="pricing-btn">
                                <button type="button" class="btn btn-primary font-16">Purchase</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- End col -->                    
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body p-0">
                    <div class="pricing text-center">
                        <div class="pricing-top">
                            <h4 class="text-info mb-0">Ultimate</h4>
                            <img src="assets/images/pricing/pricing-ultimate.svg" class="img-fluid my-4" alt="ultimate pricing">
                            <div class="pricing-amount">
                                <h3 class="text-info mb-0"><sup>$</sup>499</h3>
                                <h6 class="pricing-duration">Per Year</h6>
                            </div>
                        </div>
                        <div class="pricing-middle">
                            <ul class="list-group">
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>1 TB Disk Space</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>100 Email</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>50 Domain</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>SSL Certificate</li>
                              <li class="list-group-item"><i class="feather icon-check mr-2"></i>24/7 Support</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom pricing-bottom-enterprise">                                        
                            <div class="pricing-btn">
                                <button type="button" class="btn btn-info font-16">Purchase</button>
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