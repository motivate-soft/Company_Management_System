@section('title')
    {{__('Systems/SystemTwo/jobtasks.jobtasks_edit')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/jobtasks.edit_jobtask')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('jobtasks.index')}}">{{__('Systems/SystemTwo/jobtasks.jobtasks')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/jobtasks.edit_jobtask')}}</li>
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
            <form method="post" action="{{ url('dashboard/edit-jobtask') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jobtask_id" value="{{ $jobtask->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label for="employee">{{__('Systems/SystemTwo/jobtasks.employee')}}</label>
                            <select id="employee" class="form-control" name="employee" required="">
                                {{--<option disabled selected value="">Select the transaction type</option>--}}
                                <option value="employee_1" @if(isset($jobtask->employee) && $jobtask->employee == "employee_1") selected @endif>EMPLOYEE_1</option>
                                <option value="employee_2" @if(isset($jobtask->employee) && $jobtask->employee == "employee_2") selected @endif>EMPLOYEE_2</option>
                                <option value="employee_3" @if(isset($jobtask->employee) && $jobtask->employee == "employee_3") selected @endif>EMPLOYEE_3</option>
                                <option value="employee_4" @if(isset($jobtask->employee) && $jobtask->employee == "employee_4") selected @endif>EMPLOYEE_4</option>
                                <option value="employee_5" @if(isset($jobtask->employee) && $jobtask->employee == "employee_5") selected @endif>EMPLOYEE_5</option>
                            </select>

                            {{--<input type="text" placeholder="employee" class="form-control" @if(isset($jobtask->employee)) value="{{ $jobtask->employee }}"@endif name="employee" placeholder="No employee" required="">--}}
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{__('Systems/SystemTwo/jobtasks.job_name')}}</label>
                            <input type="text" placeholder="job_name" class="form-control" @if(isset($jobtask->job_name)) value="{{ $jobtask->job_name }}"@endif name="job_name" placeholder="No job_name" required="">
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{__('Systems/SystemTwo/jobtasks.job_type')}}</label>
                            <input type="text" placeholder="job_name" class="form-control" @if(isset($jobtask->job_type)) value="{{ $jobtask->job_type }}"@endif name="job_type" placeholder="No job_name" required="">
                        </div>
                    </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label for="job_task_date">{{__('Systems/SystemTwo/jobtasks.job_task_date')}}</label>
                                <div class="input-group">
                                    <input type="text" id="default-date" class="form-control" placeholder="yyyy/mm/dd" aria-describedby="basic-addon2" name="job_task_date" @if(isset($jobtask->job_task_date)) value="{{ $jobtask->job_task_date }}" @endif />
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{__('Systems/SystemTwo/jobtasks.job_number_days')}}</label>
                            <input type="number" class="form-control" min="0" @if(isset($jobtask->job_number_days)) value="{{ $jobtask->job_number_days }}"@endif name="job_number_days" placeholder="No job_name" required="">

                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{__('Systems/SystemTwo/jobtasks.status')}}</label>
                            <select id="status" class="form-control" name="status" required="">
                                {{--<option disabled selected value="">Select the transaction type</option>--}}
                                <option value="Completed" @if(isset($jobtask->status) && $jobtask->status == "Completed") selected @endif>Completed</option>
                                <option value="Canceled" @if(isset($jobtask->status) && $jobtask->status == "Canceled") selected @endif>Canceled</option>
                                <option value="In Going" @if(isset($jobtask->status) && $jobtask->status == "In Going") selected @endif>In Going</option>
                                <option value="On Hold" @if(isset($jobtask->status) && $jobtask->status == "On Hold") selected @endif>On Hold</option>
                                <option value="Pending" @if(isset($jobtask->status) && $jobtask->status == "Pending") selected @endif>Pending</option>
                            </select>

                        </div>
                    </div>


                    <div class="col-lg-12 mb-4">
                        <div class="form-group mb-0">
                            <label>{{__('Systems/SystemTwo/jobtasks.job_note')}}</label>
                            <textarea class="form-control" name="job_note" placeholder="No job_name" required="">@if(isset($jobtask->job_note)){{ $jobtask->job_note }}@endif</textarea>

                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="form-group mb-0">
                             <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/jobtasks.save')}}</button>
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
