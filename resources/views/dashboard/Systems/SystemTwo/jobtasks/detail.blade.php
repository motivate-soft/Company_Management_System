@section('title')
    {{__('Systems/SystemTwo/jobtasks.jobtasks_detail')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/jobtasks.detail')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('jobtasks.index')}}">{{__('Systems/SystemTwo/jobtasks.jobtasks')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/jobtasks.detail')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('jobtasks.index') }}" >{{__('Systems/SystemTwo/jobtasks.back')}}</a>
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
                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <span>{{__('Systems/SystemTwo/jobtasks.employee')}}</span>
                            <p class="textcolor-black">@if(isset($jobtask->employee)){{ $jobtask->employee }}@endif</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{__('Systems/SystemTwo/jobtasks.job_name')}}</label>
                            <p class="textcolor-black">@if(isset($jobtask->job_name)){{ $jobtask->job_name }}@endif</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <span>{{__('Systems/SystemTwo/jobtasks.job_type')}}</span>
                            <p class="textcolor-black">@if(isset($jobtask->job_type)){{ $jobtask->job_type }}@endif</p>
                        </div>
                    </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <span for="job_task_date">{{__('Systems/SystemTwo/jobtasks.job_task_date')}}</span>
                                <p class="textcolor-black">@if(isset($jobtask->job_task_date)){{ $jobtask->job_task_date }}@endif</p>
                            </div>
                        </div>
                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <span>{{__('Systems/SystemTwo/jobtasks.job_number_days')}}</span>
                            <p class="textcolor-black">@if(isset($jobtask->job_number_days)){{ $jobtask->job_number_days }}@endif</p>

                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <span>{{__('Systems/SystemTwo/jobtasks.status')}}</span>
                            <p class="textcolor-black">@if(isset($jobtask->status)){{ $jobtask->status }}@endif</p>

                        </div>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <div class="form-group mb-0">
                            <span>{{__('Systems/SystemTwo/jobtasks.job_note')}}</span>
                            <p class="textcolor-black">@if(isset($jobtask->job_note)){{ $jobtask->job_note }}@endif</p>

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
