@section('title')
    {{__('Systems/SystemTwo/staffs.staffs_detail')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/staffs.detail')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('staffs.index')}}">{{__('Systems/SystemTwo/staffs.staffs')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/staffs.detail')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('staffs.index') }}" >{{__('Systems/SystemTwo/staffs.back')}}</a>
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
                                <span>{{__('Systems/SystemTwo/staffs.firstname')}}</span>
                                <p class="textcolor-black">@if(isset($staff->firstname)){{ $staff->firstname }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.secondname')}}</span>
                                <p class="textcolor-black">@if(isset($staff->secondname)){{ $staff->secondname }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.lastname')}}</span>
                                <p class="textcolor-black">@if(isset($staff->lastname)){{ $staff->lastname }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.mobile_number')}}</span>
                                <p class="textcolor-black">@if(isset($staff->mobile_number)){{ $staff->mobile_number }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.monthly_salary')}}</span>
                                <p class="textcolor-black">@if(isset($staff->monthly_salary)){{ $staff->monthly_salary }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.working_hours')}}</span>
                                <p class="textcolor-black">@if(isset($staff->working_hours)){{ $staff->working_hours }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.email')}}</span>
                                <p class="textcolor-black">@if(isset($staff->email)){{ $staff->email }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.address')}}</span>
                                <p class="textcolor-black">@if(isset($staff->address)){{ $staff->address }}@endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.country')}}</span>
                                <p class="textcolor-black">
                                    @if(isset($countries) && count($countries) > 0)
                                        @foreach($countries as $key => $country)
                                            @if($country->id == $staff->country)
                                                {{$country->name}}
                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.province')}}</span>
                                <p class="textcolor-black">
                                    @if(isset($provinces) && count($provinces) > 0)
                                        @foreach($provinces as $key => $province)
                                            @if($province->id == $staff->province)
                                                @if(app()->getLocale() == "en"){{$province->name}} @else {{$province->ar_name}} @endif

                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.city')}}</span>
                                <p class="textcolor-black">
                                    @if(isset($cities) && count($cities) > 0)
                                        @foreach($cities as $key => $city)
                                            @if($city->id == $staff->city)
                                                @if(app()->getLocale() == "en"){{$city->name}} @else {{$city->ar_name}} @endif

                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.neighborhood')}}</span>
                                <p class="textcolor-black">
                                    @if(isset($neighborhoods) && count($neighborhoods) > 0)
                                        @foreach($neighborhoods as $key => $neighborhood)
                                            @if($neighborhood->id == $staff->neighborhood)
                                                @if(app()->getLocale() == "en"){{$neighborhood->name}} @else {{$neighborhood->ar_name}} @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.neighborhood')}}</span>
                                <p class="textcolor-black">
                                    {{$staff->permission}}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemTwo/staffs.selection_powers')}}</span>
                                <p class="textcolor-black">@if(isset($staff->selection_powers)){{ $staff->selection_powers }}@endif</p>
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
