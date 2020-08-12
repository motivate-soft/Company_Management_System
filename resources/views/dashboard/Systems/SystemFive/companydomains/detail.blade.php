@section('title')
    {{__('Systems/SystemFive/companydomains.detail')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

<style>
    .textcolor-black { color:black; }
</style>

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemFive/companydomains.detail')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('companydomains.index')}}">{{__('Systems/SystemFive/companydomains.companydomains')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/companydomains.detail')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('companydomains.index') }}" >{{__('Systems/SystemFive/companydomains.back')}}</a>
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
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemFive/companydomains.name')}}</span>
                                <p class="textcolor-black">@if(isset($companydomain->name)) {{ $companydomain->name }}@endif</p>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemFive/companydomains.ar_name')}}</span>
                                <p class="textcolor-black">@if(isset($companydomain->ar_name)) {{ $companydomain->ar_name }}@endif</p>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemFive/companydomains.person')}}</span>
                                <p class="textcolor-black">@if(isset($companydomain->person)) {{ $companydomain->person }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemFive/companydomains.created_at')}}</span>
                                <p class="textcolor-black">@if(isset($companydomain->created_at)) {{ $companydomain->created_at }}@endif</p>
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

<script src="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datepicker/i18n/datepicker.en.js') }}"></script>


{{-- <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script> --}}

<script>
    $(document).ready(function() {

        $('#default-date').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });

        $('#default-date12').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });


    });
</script>
@endsection
