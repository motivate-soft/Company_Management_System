@section('title') 
{{ __('side.dashboard') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')
<!-- Apex css -->
<link href="{{ asset('assets/dashboard/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- jvectormap css -->
<link href="{{ asset('assets/dashboard/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('assets/dashboard/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar --> 
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('side.dashboard') }}</h4>
        </div>
    </div>          
</div>    
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">              
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-xs-12 col-sm-12 col-lg-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                        </div>
                        @if(app()->getLocale() != "en")
                            <div class="col-7 text-left">
                        @else
                            <div class="col-7 text-right">
                        @endif
                            <h5 class="card-title font-14">{{ __('dashboard.soldItems') }}</h5>
                            <h4 class="mb-0">{{$sold_items}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13">   {{ __('dashboard.updated') }}</span>
                        </div>
                        @if(app()->getLocale() != "en")
                            <div class="col-4 text-left">
                        @else
                            <div class="col-4 text-right">
                        @endif
                            <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>{{$weekly_add_sold}}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-xs-12 col-sm-12 col-lg-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                        </div>
                        @if(app()->getLocale() != "en")
                            <div class="col-7 text-left">
                        @else
                            <div class="col-7 text-right">
                        @endif
                            <h5 class="card-title font-14">{{ __('dashboard.income') }}</h5>
                            <h4 class="mb-0">{{$incoming}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13">{{ __('dashboard.updated') }}</span>
                        </div>
                        @if(app()->getLocale() != "en")
                            <div class="col-4 text-left">
                        @else
                            <div class="col-4 text-right">
                        @endif
                            <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>{{$weekly_add_incoming}}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-xs-12 col-sm-12 col-lg-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                        </div>
                        @if(app()->getLocale() != "en")
                            <div class="col-7 text-left">
                        @else
                            <div class="col-7 text-right">
                        @endif
                            <h5 class="card-title font-14">{{ __('dashboard.products') }}</h5>
                            <h4 class="mb-0">{{$total_products}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="font-13">{{ __('dashboard.capacity') }}</span>
                        </div>
                        @if(app()->getLocale() != "en")
                            <div class="col-4 text-left">
                        @else
                            <div class="col-4 text-right">
                        @endif
                            <span class="badge badge-success"></i>{{$weekly_add_product}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <!-- Start row -->
            <div class="row">
                
                <!-- Start col -->
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title mb-0">{{ __('dashboard.revenue') }}</h5>
                                </div>
                                @if(app()->getLocale() != "en")
                                    <div class="col-6 text-left">
                                @else
                                    <div class="col-6 text-right">
                                @endif
                                    <h4 class="mb-0">SAR {{$average_revenue}} <span class="badge badge-secondary-inverse font-14 v-a-m">{{ __('dashboard.lastMonth') }} - +ERROR </span></h4>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title mb-0">{{ __('dashboard.tax') }}</h5>
                                </div>
                                @if(app()->getLocale() != "en")
                                    <div class="col-6 text-left">
                                @else
                                    <div class="col-6 text-right">
                                @endif
                                    <h4 class="mb-0">SAR ERROR <span class="badge badge-secondary-inverse font-14 v-a-m">{{ __('dashboard.lastYear') }} - SAR ERROR </span></h4>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start row -->
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="card text-center m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">{{ __('dashboard.orders') }}</h5>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <p class="dash-analytic-icon"><i class="feather icon-shopping-bag success-rgba text-success"></i></p>
                            <h4 class="mb-3">{{$orders}}</h4>
                            <p>&nbsp;</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="card text-center m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">{{ __('dashboard.users') }}</h5>
                        </div>
                        <div class="card-body px-0 pb-0">
                            <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i></p>
                            <h4 class="mb-3">{{$users}}</h4>
                            <p>&nbsp;</p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                
            </div>
            <!-- End row -->                        
        </div>
        <!-- End col --> 
        <!-- Start col -->
        <div class="col-lg-12 col-xl-8">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __('dashboard.summary') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-0">
                            <div class="row align-items-center">
                                <div class="card-body">
                                    <div id="apex-area-chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col --> 
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Apex js -->
<script src="{{ asset('assets/dashboard/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/apexcharts/irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-chart-apex.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('assets/dashboard/plugins/slick/slick.min.js') }}"></script>
<!-- Dashboard js -->
<script src="{{ asset('assets/dashboard/js/custom/custom-dashboard-ecommerce.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function(){

        user_data="{{$user_chart}}";
        order_chart="{{$order_chart}}";
        console.log("asdf", user_data);



        var options = {
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                },
                zoom: {
                  type: 'x',
                  enabled: false,
                  autoScaleYaxis: true
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
            },
            colors: ['#0080ff', '#d4d8de'],
            series: [{
                name: 'Users',
                data: [user_data[1], user_data[3], user_data[5], user_data[7], user_data[9], user_data[11], user_data[13]]
            }, {
                name: 'Orders',
                data: [order_chart[1], order_chart[3], order_chart[5], order_chart[7], order_chart[9], order_chart[11], order_chart[13]]
            }],
            legend: {
                show: false,
            },
            xaxis: {
                type: 'time',
                // categories: ["0:59", "02:00", "06:00", "10:00", "14:00", "18:00", "23:59"],
                axisBorder: {
                    show: true, 
                    color: 'rgba(0,0,0,0.05)'
                },
                axisTicks: {
                    show: true, 
                    color: 'rgba(0,0,0,0.05)'
                }
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], opacity: .2
                },
                borderColor: 'rgba(0,0,0,0.05)'
            },
            tooltip: {
                x: {
                    format: 'hh:mm'
                },
            }
        }
        var chart = new ApexCharts(
            document.querySelector("#apex-area-chart1"),
            options
        );
        chart.render();
    })

</script>
@endsection

