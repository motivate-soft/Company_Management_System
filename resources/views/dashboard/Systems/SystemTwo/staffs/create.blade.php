@section('title')
    {{__('Systems/SystemTwo/staffs.staffs_add')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')


    <link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        /*::placeholder { color: #77ff25;!important; font-size: 40px; }*/
        /*:-moz-placeholder { color:blue;!important; }*/
        /*::-moz-placeholder { color:blue;!important; }*/

        /*input::-moz-placeholder {*/
        /*color: blue;*/
        /*font-weight: bold;*/
        /*}*/
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
                <h4 class="page-title">{{__('Systems/SystemTwo/staffs.add_staff')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('jobtasks.index')}}">{{__('Systems/SystemTwo/staffs.staffs')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/staffs.add_staff')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('staffs.index') }}">{{__('Systems/SystemTwo/staffs.back')}}</a>
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
                <form method="post" action="{{ route('staffs.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="firstname">{{__('Systems/SystemTwo/staffs.firstname')}}</label>
                                        <input type="text" class="form-control" id="code" name="firstname"
                                               placeholder="firstname" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="secondname">{{__('Systems/SystemTwo/staffs.secondname')}}</label>
                                        <input type="text" class="form-control" id="code" name="secondname"
                                               placeholder="secondname" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="lastname">{{__('Systems/SystemTwo/staffs.lastname')}}</label>
                                        <input type="text" class="form-control" id="code" name="lastname"
                                               placeholder="lastname" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="mobile_number">{{__('Systems/SystemTwo/staffs.mobile_number')}}</label>
                                        <input type="text" class="form-control" id="code" name="mobile_number"
                                               placeholder="mobile_number" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="monthly_salary">{{__('Systems/SystemTwo/staffs.monthly_salary')}}</label>
                                        <input type="text" class="form-control" id="code" name="monthly_salary"
                                               placeholder="monthly_salary" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="working_hours">{{__('Systems/SystemTwo/staffs.working_hours')}}</label>
                                        <input type="number" class="form-control" id="code" name="working_hours"
                                               placeholder="working_hours" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="email">{{__('Systems/SystemTwo/staffs.email')}}</label>
                                        <input type="email" class="form-control" id="code" name="email"
                                               placeholder="email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="address">{{__('Systems/SystemTwo/staffs.address')}}</label>
                                        <input type="text" class="form-control" id="code" name="address"
                                               placeholder="address" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="country">{{__('Systems/SystemTwo/staffs.country')}}</label>
                                        <input type="text" class="form-control" id="code" name="country"
                                               placeholder="country" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="province">{{__('Systems/SystemTwo/staffs.province')}}</label>
                                        <input type="text" class="form-control" id="code" name="province"
                                               placeholder="province" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="city">{{__('Systems/SystemTwo/staffs.city')}}</label>
                                        <input type="text" class="form-control" id="code" name="city"
                                               placeholder="city" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="selection_powers">{{__('Systems/SystemTwo/staffs.selection_powers')}}</label>
                                        <input type="text" class="form-control" id="code" name="selection_powers"
                                               placeholder="selection_powers" required="">
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit"
                                                class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/staffs.add_staff')}}</button>
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
