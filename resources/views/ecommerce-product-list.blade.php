@section('title') 
Orbiter - Product List
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Product List</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button href="{{url('/ecommerce-product-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add New</button>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Quntity</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#1</th>
                                    <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Apple MacBook Pro</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$1,95,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Gaming</span><span class="badge badge-secondary-inverse">Popular</span></td>
                                    <td>205</td>
                                    <td>02/06/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#2</th>
                                    <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Dell Alienware</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$85,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Old</span><span class="badge badge-secondary-inverse">Sale</span></td>
                                    <td>585</td>
                                    <td>30/05/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#3</th>
                                    <td><img src="assets/images/ecommerce/product_03.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Acer Predator Helios</td>
                                    <td class="text-danger">Out of Stock</td>
                                    <td>$97,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Pupular</span><span class="badge badge-secondary-inverse">Gaming</span></td>
                                    <td>680</td>
                                    <td>24/05/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#4</th>
                                    <td><img src="assets/images/ecommerce/product_04.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Asus ROG Strix</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$75,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Trending</span><span class="badge badge-secondary-inverse">Latest</span></td>
                                    <td>785</td>
                                    <td>20/05/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#5</th>
                                    <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Razer Blade Pro 17</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$81,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Popular</span><span class="badge badge-secondary-inverse">New</span></td>
                                    <td>230</td>
                                    <td>10/05/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#6</th>
                                    <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>HP Spectre x360</td>
                                    <td class="text-danger">Out of Stock</td>
                                    <td>$68,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Featured</span><span class="badge badge-secondary-inverse">Trending</span></td>
                                    <td>435</td>
                                    <td>02/05/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#7</th>
                                    <td><img src="assets/images/ecommerce/product_03.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Lenovo Legion Y530</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$88,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Latest</span><span class="badge badge-secondary-inverse">New</span></td>
                                    <td>395</td>
                                    <td>30/04/2019</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-product-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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