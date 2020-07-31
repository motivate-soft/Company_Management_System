@section('title') 
Orbiter - Tour
@endsection 
@extends('layouts.main')
@section('style')
<!-- Product Tour css -->
<link href="{{ asset('assets/plugins/product-tour/product-tour.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Tour</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Advanced UI</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tour</li>
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
    <div class="row tourbar"> 
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30" id="tour-form">
                <div class="card-header">
                    <h5 class="card-title">Form row</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.</h6>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input mt-2" type="checkbox" id="gridCheck">
                                <label class="form-check-label ml-3" for="gridCheck">
                                Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End col --> 
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30" id="tour-card">
                <img class="card-img-top" src="assets/images/ui-cards/ui-cards-1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-18">Card title</h5>
                    <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div> 
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">                            
                <div class="card-body">
                    <h5 class="card-title font-18">Card title</h5>
                    <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <img class="card-img-top" src="assets/images/ui-cards/ui-cards-2.jpg" alt="Card image cap">
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top" src="assets/images/ui-cards/ui-cards-3.jpg" alt="Card image cap">  
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top" src="assets/images/ui-cards/ui-cards-4.jpg" alt="Card image cap">  
                <div class="card-body">
                    <h5 class="card-title font-18">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-body pt-0">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div> 
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="card-title mb-0">Products Statistics</h5>
                        </div>
                        <div class="col-4">
                            <ul class="list-inline-group text-right mb-2 pl-0">
                                <li class="list-inline-item mr-0 font-12"><i class="feather icon-more-vertical- font-20 text-primary"></i></li>
                            </ul>                                       
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p class="mb-2">Total Products</p>
                        <h3>563</h3>
                    </div>
                    <div class="progress font-14 mb-1" style="height: 30px;">
                      <div class="progress-bar" role="progressbar" style="width: 27%" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100">27%</div>
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100">24%</div>
                      <div class="progress-bar bg-success" role="progressbar" style="width: 16%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">16%</div>
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">15%</div>
                      <div class="progress-bar bg-info" role="progressbar" style="width: 14%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">14%</div>
                    </div>
                    <div class="mt-4">
                        <p><i class="mdi mdi-circle text-primary mr-2"></i>Active Products<span class="float-right">152</span></p>
                        <p><i class="mdi mdi-circle text-warning mr-2"></i>Performing Products<span class="float-right">135</span></p>
                        <p><i class="mdi mdi-circle text-success mr-2"></i>Submitted Products<span class="float-right">67</span></p>
                        <p><i class="mdi mdi-circle text-danger mr-2"></i>Pending Products<span class="float-right">78</span></p>
                        <p><i class="mdi mdi-circle text-info mr-2"></i>Rejected Products<span class="float-right">28</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card m-b-30" id="tour-upload">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="card-title mb-0">Upload Products</h5>
                        </div>
                        <div class="col-4">
                            <ul class="list-inline-group text-right mb-0 pl-0">
                                <li class="list-inline-item mr-0 font-12"><button type="button" class="btn btn-sm btn-primary-rgba font-14 px-2">Download</button></li>
                            </ul>                                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="ecommerce-upload">
                        <form action="#" class="dropzone dz-clickable">                                    
                            <div class="dz-default dz-message">
                                <p class="dash-analytic-icon"><i class="feather icon-plus primary-rgba text-primary"></i></p>
                                <span>Upload files in .csv formats per template guidelines</span>
                            </div>
                        </form>
                        <img src="assets/images/dashboard/cloud.svg" class="img-fluid" alt="colud">
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="card-title mb-0">Important Files</h5>
                        </div>
                        <div class="col-4">
                            <ul class="list-inline-group text-right mb-2 pl-0">
                                <li class="list-inline-item mr-0 font-12"><i class="feather icon-more-vertical- font-20 text-primary"></i></li>
                            </ul>                                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="product-file-type">
                        <ul class="list-unstyled">
                            <li class="media mb-3">
                                <span class="mr-3 align-self-center img-icon primary-rgba text-primary">.doc</span>
                                <div class="media-body">
                                <h5 class="text-dark font-18 mb-1">Marketing Guidelines<i class="feather icon-download-cloud float-right"></i></h5>
                                <p>.doc, 5.3 MB</p>
                                </div>
                            </li>
                            <li class="media mb-3">
                                <span class="mr-3 align-self-center img-icon success-rgba text-success">.xls</span>
                                <div class="media-body">
                                <h5 class="text-dark font-18 mb-1">Complete Product Sheet<i class="feather icon-download-cloud float-right"></i></h5>
                                <p>.xls, 2.5 MB</p>
                                </div>
                            </li>
                            <li class="media mb-3">
                                <span class="mr-3 align-self-center img-icon danger-rgba text-danger">.pdf</span>
                                <div class="media-body">
                                <h5 class="text-dark font-18 mb-1">Annual Sales Report 2018-19<i class="feather icon-download-cloud float-right"></i></h5>
                                <p>.pdf, 10.5 MB</p>
                                </div>
                            </li>
                            <li class="media">
                                <span class="mr-3 align-self-center img-icon info-rgba text-info">.zip</span>
                                <div class="media-body">
                                <h5 class="text-dark font-18 mb-1">Brand Photography<i class="feather icon-download-cloud float-right"></i></h5>
                                <p>.zip, 53.2 MB</p>
                                </div>
                            </li>
                        </ul>
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
<!-- Dropzone JS -->
<script src="{{ asset('assets/plugins/dropzone/dist/dropzone.js') }}"></script>
<!-- Product Tour js -->
<script src="{{ asset('assets/plugins/product-tour/product-tour.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-tour.js') }}"></script>
@endsection 