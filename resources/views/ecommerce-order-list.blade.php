@section('title') 
Orbiter - Order List
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Order List</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order List</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Create New Order</button>
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
                                    <th>Invoice</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>                                                
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#o2599</th>
                                    <td>11</td>
                                    <td>Amy Adams</td>
                                    <td>02/06/2019</td>
                                    <td>$1,95,000</td>
                                    <td><span class="badge badge-primary-inverse">Processing</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2600</th>
                                    <td>12</td>
                                    <td>Shiva Radharaman</td>
                                    <td>01/06/2019</td>
                                    <td>$85,000</td>
                                    <td><span class="badge badge-secondary-inverse">Shipped</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2601</th>
                                    <td>13</td>
                                    <td>Ryan Smith</td>
                                    <td>28/05/2019</td>
                                    <td>$70,000</td>
                                    <td><span class="badge badge-success-inverse">Completed</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2602</th>
                                    <td>14</td>
                                    <td>James Witherspon</td>
                                    <td>21/05/2019</td>
                                    <td>$1,25,000</td>
                                    <td><span class="badge badge-warning-inverse">Refunded</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2603</th>
                                    <td>15</td>
                                    <td>Courney Berry</td>
                                    <td>17/05/2019</td>
                                    <td>$1,30,000</td>
                                    <td><span class="badge badge-danger-inverse">Cancelled</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2604</th>
                                    <td>16</td>
                                    <td>Lisa Perry</td>
                                    <td>12/05/2019</td>
                                    <td>$1,50,000</td>
                                    <td><span class="badge badge-info-inverse">Delivered</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2605</th>
                                    <td>17</td>
                                    <td>John Doe</td>
                                    <td>01/05/2019</td>
                                    <td>$5,000</td>
                                    <td><span class="badge badge-success-inverse">Completed</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-primary-rgba"><i class="feather icon-file"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a href="{{url('/page-order-detail')}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
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