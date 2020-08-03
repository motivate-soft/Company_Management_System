@section('title')
    {{__('Systems/SystemTwo/jobtasks.jobtasks_add')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

    <link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: pink;!important;
            text-decoration-color: #0a6aa1;
            font-size: 12px;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            color: pink;!important;
            text-decoration-color: #0a6aa1;

            font-size: 12px;
        }
        :-ms-input-placeholder { /* IE 10+ */
            color: pink;!important;
            text-decoration-color: #0a6aa1;

            font-size: 12px;
        }
        :-moz-placeholder { /* Firefox 18- */
            color: pink;!important;
            text-decoration-color: #0a6aa1;

            font-size: 12px;
        }
    </style>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemTwo/jobtasks.add_jobtask')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('jobtasks.index')}}">{{__('Systems/SystemTwo/jobtasks.jobtasks')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/jobtasks.add_jobtask')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('jobtasks.index') }}">Back</a>
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
                <form method="post" action="{{ route('jobtasks.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="employee">{{__('Systems/SystemTwo/jobtasks.employee')}}</label>
                                        <select class="form-control" id="employee" name="employee" required="">
                                            <option disabled selected
                                                    value="">select employee</option>
                                            <option value="employee_1">EMPLOYEE_1</option>
                                            <option value="employee_2">EMPLOYEE_2</option>
                                            <option value="employee_3">EMPLOYEE_3</option>
                                            <option value="employee_4">EMPLOYEE_4</option>
                                            <option value="employee_5">EMPLOYEE_5</option>
                                        </select>
                                        {{--<input type="text" class="form-control" id="code" name="employee"--}}
                                               {{--placeholder="Insert employee" required="">--}}
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="job_name">{{__('Systems/SystemTwo/jobtasks.job_name')}}</label>

                                        <input type="text" class="form-control" id="code" name="job_name"
                                               placeholder="job_name" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="job_type">{{__('Systems/SystemTwo/jobtasks.job_type')}}</label>
                                        <input type="text" class="form-control" id="coupon_value" name="job_type"
                                               placeholder="job_type" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label>{{__('Systems/SystemTwo/jobtasks.job_task_date')}}</label>
                                        <div class="input-group">
                                            <input type="text" id="default-date" class="form-control"
                                                   placeholder="yyyy/mm/dd" aria-describedby="basic-addon2"
                                                   name="job_task_date" autocomplete="off"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                        class="feather icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="job_number_days">{{__('Systems/SystemTwo/jobtasks.job_number_days')}}</label>
                                        <input type="number" class="form-control" id="total_usage" name="job_number_days"
                                               placeholder="job_number_days" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="status">{{__('Systems/SystemTwo/jobtasks.status')}}</label>
                                        <select class="form-control" id="status" name="status" required="">
                                            <option disabled selected
                                                    value="">select status</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="In Going">In Going</option>
                                            <option value="On Hold">On Hold</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                        {{--<input type="number" class="form-control" id="total_usage" name="status"--}}
                                               {{--placeholder="job_task_status" required="">--}}
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="job_note">{{__('Systems/SystemTwo/jobtasks.job_note')}}</label>
                                        <textarea class="form-control" id="total_usage" name="job_note"
                                                  placeholder="job_note" required=""></textarea>
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit"
                                                class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/jobtasks.add_jobtask')}}</button>
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


    <script src="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard//plugins/datepicker/i18n/datepicker.en.js') }}"></script>


    <script src="{{ asset('assets/dashboard//js/custom/custom-toasts.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#default-date').datepicker({
                language: 'en',
                dateFormat: 'yyyy/mm/dd',
            });
            $('#default-date12').datepicker({
                language: 'en',
                dateFormat: 'yyyy/mm/dd',
            });

            $('#default-datatable').DataTable();

        });
    </script>
@endsection 
