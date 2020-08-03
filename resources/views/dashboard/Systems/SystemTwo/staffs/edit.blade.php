@section('title')
    {{__('Systems/SystemTwo/staffs.staffs_edit')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemTwo/staffs.edit_staff')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('staffs.index')}}">{{__('Systems/SystemTwo/staffs.staffs')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/staffs.edit_staff')}}</li>
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
            <form method="post" action="{{ url('dashboard/edit-staff') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="staff_id" value="{{ $staff->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.firstname')}}</label>
                                <input type="text" placeholder="firstname" class="form-control" @if(isset($staff->firstname)) value="{{ $staff->firstname }}"@endif name="firstname" placeholder="No firstname" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.secondname')}}</label>
                                <input type="text" placeholder="secondname" class="form-control" @if(isset($staff->secondname)) value="{{ $staff->secondname }}"@endif name="secondname" placeholder="No secondname" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.lastname')}}</label>
                                <input type="text" placeholder="lastname" class="form-control" @if(isset($staff->lastname)) value="{{ $staff->lastname }}"@endif name="lastname" placeholder="No lastname" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.mobile_number')}}</label>
                                <input type="text" placeholder="mobile_number" class="form-control" @if(isset($staff->mobile_number)) value="{{ $staff->mobile_number }}"@endif name="mobile_number" placeholder="No mobile_number" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.monthly_salary')}}</label>
                                <input type="text" placeholder="monthly_salary" class="form-control" @if(isset($staff->monthly_salary)) value="{{ $staff->monthly_salary }}"@endif name="monthly_salary" placeholder="No monthly_salary" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.working_hours')}}</label>
                                <input type="number" placeholder="working_hours" class="form-control" @if(isset($staff->working_hours)) value="{{ $staff->working_hours }}"@endif name="working_hours" placeholder="No working_hours" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.email')}}</label>
                                <input type="email" placeholder="email" class="form-control" @if(isset($staff->email)) value="{{ $staff->email }}"@endif name="email" placeholder="No email" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.address')}}</label>
                                <input type="text" placeholder="address" class="form-control" @if(isset($staff->address)) value="{{ $staff->address }}"@endif name="address" placeholder="No address" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.country')}}</label>
                                <input type="text" placeholder="country" class="form-control" @if(isset($staff->country)) value="{{ $staff->country }}"@endif name="country" placeholder="No country" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.province')}}</label>
                                <input type="text" placeholder="province" class="form-control" @if(isset($staff->province)) value="{{ $staff->province }}"@endif name="province" placeholder="No province" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.city')}}</label>
                                <input type="text" placeholder="city" class="form-control" @if(isset($staff->city)) value="{{ $staff->city }}"@endif name="city" placeholder="No city" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.selection_powers')}}</label>
                                <input type="text" placeholder="selection_powers" class="form-control" @if(isset($staff->selection_powers)) value="{{ $staff->selection_powers }}"@endif name="selection_powers" placeholder="No selection_powers" required="">
                            </div>
                        </div>

                    <div class="col-lg-12 mt-4">
                        <div class="form-group mb-0">
                             <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/staffs.save')}}</button>
                        </div>
                    </div>
                    </form>

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
