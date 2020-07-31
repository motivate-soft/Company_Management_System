@section('title')
{{ __('side.pluginList') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')
    <link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')

@php
$lang_current = Config::get('app.locale');
@endphp
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('side.pluginList') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.plugins') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('side.pluginList') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ url('plugin-add') }}"><i class="feather icon-plus mr-2"></i>{{ __('plugins/plugins.requestPlugin') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start Al Saad SMS Gateway col -->
        @if(count($plugins) > 0)
        @foreach($plugins as $key => $plug)
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top" @if(!is_null($plug->image)) src="{{url('/')}}/uploads/plugins_images/{{ $plug->image }}" @else src="assets/dashboard/images/default.png" @endif  alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-18">{{ $plug->ar_name }}</h5>
                    <p class="card-text mb-3">{{ $plug->ar_description }}</p>

                    @if($plug->status != 1)
                    <a href="{{ url('dashboard/plugin/'.$plug->id) }}" class="btn btn-primary">{{__('general.activate')}}</a>
                    
                    @else
                    <a href="{{ url('dashboard/plugin/edit/'.$plug->id) }}" class="btn btn-primary">{{__('general.edit')}}</a>
                    <a href="{{ url('dashboard/plugin/'.$plug->id) }}" class="btn btn-danger">{{__('general.deactivate')}}</a>
                    @endif


                    <a href="{{ $plug->url }}" style="@if(app()->getLocale() != "en") float: left; @else float: right; @endif" class="btn btn-primary" target="_blank"><i class="dripicons-web"></i></a>
                </div>
            </div>
        </div>
        

        @endforeach
        @endif
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top"  src="{{asset('/uploads/plugins_images/Malath-SMS.png')}}"  alt="Malath-SMS">
                <div class="card-body">
                    <h5 class="card-title font-18">Malath SMS</h5>
                    <p class="card-text mb-3">
                        {{__('general.malath_desc')}}
                    </p>
                    @if($malath && $malath->status)
                        <a href="#" class="btn btn-danger active">{{__('general.deactivate')}}</a>
                    @else
                        <a href="#" class="btn btn-primary active">{{__('general.activate')}}</a>
                    @endif
                    <a href="{{route('malath.index')}}" class="btn btn-primary">{{__('general.edit')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top"  src="{{asset('/uploads/plugins_images/MyFatoorah-Payment-Gateway.png')}}"  alt="Malath-SMS">
                <div class="card-body">
                    <h5 class="card-title font-18">My Fatoorah</h5>
                    <p class="card-text mb-3">
                        {{__('general.malath_desc')}}
                    </p>
                    @if($MyFatoorah && $MyFatoorah->status)
                        <a href="#" class="btn btn-danger MyFatoorahActive">{{__('general.deactivate')}}</a>
                    @else
                        <a href="#" class="btn btn-primary MyFatoorahActive">{{__('general.activate')}}</a>
                    @endif
                    <a href="{{route('my_fatoorah.index')}}" class="btn btn-primary">{{__('general.edit')}}</a>
                </div>
            </div>
        </div>
        <!-- End Al Saad SMS Gateway col -->
        <!-- Start Meet Application Features col -->
        {{-- <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top" src="assets/dashboard/images/plugins/applications/{{ __('plugins/applications/meatApplication/pluginInformation.img') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-18">{{ __('plugins/applications/meatApplication/pluginInformation.pluginName') }}</h5>
                    <p class="card-text mb-3">{{ __('plugins/applications/meatApplication/pluginInformation.pluginDescription') }}</p>
                    <a href="#" class="btn btn-primary">{{ __('plugins/plugins.activateButton') }}</a>
                    <a href="https://devhere.co" style="@if(app()->getLocale() != "en") float: left; @else float: right; @endif" class="btn btn-primary"><i class="dripicons-web"></i></a>
                </div>
            </div>
        </div>
        <!-- End Meet Application Features col -->



        <!-- Start Bank Al Rajhi Payment Method col -->
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top" src="assets/dashboard/images/plugins/payments/{{ __('plugins/payments/bank_rajhi.img') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-18">{{ __('plugins/payments/bank_rajhi.pluginName') }}</h5>
                    <p class="card-text mb-3">{{ __('plugins/payments/bank_rajhi.pluginDescription') }}</p>
                    <a href="payments/bank-rajhi" class="btn btn-primary">{{ __('plugins/plugins.activateButton') }}</a>
                    <a href="https://www.alrajhibank.com.sa/" style="@if(app()->getLocale() != "en") float: left; @else float: right; @endif" class="btn btn-primary"><i class="dripicons-web"></i></a>
                </div>
            </div>
        </div>
        <!-- End Bank Al Rajhi Payment Method col -->
        <!-- Start Cash On Delivery Payment Method col -->
        <div class="col-md-12 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <img class="card-img-top" src="assets/dashboard/images/plugins/payments/{{ __('plugins/payments/cod.img') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-18">{{ __('plugins/payments/cod.pluginName') }}</h5>
                    <p class="card-text mb-3">{{ __('plugins/payments/cod.pluginDescription') }}</p>
                    <a href="#" class="btn btn-primary">{{ __('plugins/plugins.activateButton') }}</a>
                    <a href="https://devhere.co" style="@if(app()->getLocale() != "en") float: left; @else float: right; @endif" class="btn btn-primary"><i class="dripicons-web"></i></a>
                </div>
            </div>
        </div> --}}
        <!-- End Cash On Delivery Payment Method col -->

    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
    <!-- Sweet-Alert js -->
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>

    <script>
        $(document).ready(function () {
            var active = function () {
                $('.active').on("click", function () {
                    var this_item = $(this);
                    var id = $(this).parent().find('.id').val();
                    swal({
                        title: 'Are you sure?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes!',
                        cancelButtonText: 'No, cancel!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10',
                        buttonsStyling: false
                    }).then(function () {
                        $.ajax({
                            method: "post",
                            url: "{{route('malath.changeStatus')}}",
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },

                            async: true,
                            success: function (data) {
                                //  wait.resolve();
                                $(".loadingMask").css('display', 'none');
                                if (data.errors) {
                                    swal(
                                        'Error',
                                        'Please try again',
                                        'error'
                                    )
                                } else {
                                    swal(
                                        'Done!',
                                        'Updated Successfully',
                                        'success'
                                    ).then(function (){
                                        window.location = "{{route('plugins.index')}}"
                                    });
                                }
                            },
                            error: function () {
                                swal(
                                    'Error',
                                    'Please try again',
                                    'error'
                                )
                            }
                        });

                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            swal(
                                'Cancelled',
                                'Your imaginary data is safe :)',
                                'error'
                            )
                        }
                    })


                });
            };
            var MyFatoorahActive = function () {
                $('.MyFatoorahActive').on("click", function () {
                    var this_item = $(this);
                    var id = $(this).parent().find('.id').val();
                    swal({
                        title: 'Are you sure?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes!',
                        cancelButtonText: 'No, cancel!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10',
                        buttonsStyling: false
                    }).then(function () {
                        $.ajax({
                            method: "post",
                            url: "{{route('my_fatoorah.changeStatus')}}",
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },

                            async: true,
                            success: function (data) {
                                //  wait.resolve();
                                $(".loadingMask").css('display', 'none');
                                if (data.errors) {
                                    swal(
                                        'Error',
                                        'Please try again',
                                        'error'
                                    )
                                } else {
                                    swal(
                                        'Done!',
                                        'Updated Successfully',
                                        'success'
                                    ).then(function (){
                                        window.location = "{{route('plugins.index')}}"
                                    });
                                }
                            },
                            error: function () {
                                swal(
                                    'Error',
                                    'Please try again',
                                    'error'
                                )
                            }
                        });

                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            swal(
                                'Cancelled',
                                'Your imaginary data is safe :)',
                                'error'
                            )
                        }
                    })


                });
            };

            active();
            MyFatoorahActive();
        });
    </script>
@endsection
