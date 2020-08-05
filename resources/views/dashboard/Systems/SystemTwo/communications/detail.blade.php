@section('title')
    {{__('Systems/SystemTwo/communications.communications_detail')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/communications.detail')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('communications.index')}}">{{__('Systems/SystemTwo/communications.communications')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/communications.detail')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('communications.index') }}" >{{__('Systems/SystemTwo/communications.back')}}</a>
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
                                <span>{{__('Systems/SystemTwo/communications.transaction_type')}}</span>
                                <p class="textcolor-black">@if(isset($communication->transaction_type)){{ $communication->transaction_type }}@endif</p>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/communications.entity_name')}}</span>
                                <p class="textcolor-black">@if(isset($communication->entity_name)){{ $communication->entity_name }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.letter_authorized')}}</label>
                                <p class="textcolor-black">@if(isset($communication->letter_authorized)){{ $communication->letter_authorized }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.employee_responsible')}}</label>
                                <p class="textcolor-black">@if(isset($communication->employee_responsible)){{ $communication->employee_responsible }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>number</span>
                                <p class="textcolor-black">@if(isset($communication->number)){{ $communication->number }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span for="date_letter">{{__('Systems/SystemTwo/communications.date_letter')}}</span>
                                <p class="textcolor-black">@if(isset($communication->date_letter)){{ $communication->date_letter }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/communications.status_letter')}}</span>
                                <p class="textcolor-black">@if(isset($communication->status_letter)){{ $communication->status_letter }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/communications.prepayments')}}</span>
                                <p class="textcolor-black">@if(isset($communication->prepayments)){{ $communication->prepayments }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/communications.transaction_explanation')}}</span>
                                <p class="textcolor-black">@if(isset($communication->transaction_explanation)){{ $communication->transaction_explanation }}@endif</p>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/communications.response')}}</span>
                                <p class="textcolor-black">@if(isset($communication->response)){{ $communication->response }}@endif</p>
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
