@section('title')
    {{__('Systems/SystemTwo/jobtypes.jobtype_add')}}
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
                <h4 class="page-title">{{__('Systems/SystemTwo/jobtypes.add_jobtype')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('jobtypes.index')}}">{{__('Systems/SystemTwo/jobtypes.jobtypes')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/jobtypes.add_jobtype')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('jobtypes.index') }}">Back</a>
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
                <form method="post" action="{{ route('jobtypes.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="name">{{__('Systems/SystemTwo/jobtypes.name')}}</label>
                                        <input type="text" class="form-control" id="code" name="name"
                                               placeholder="name" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="ar_name">{{__('Systems/SystemTwo/jobtypes.ar_name')}}</label>
                                        <input type="text" class="form-control" id="ar_name" name="ar_name"
                                               placeholder="ar_name" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="state">{{__('Systems/SystemTwo/jobtypes.state')}}</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="1">{{__('Systems/SystemTwo/jobtypes.state_enabled')}}</option>
                                            <option value="0">{{__('Systems/SystemTwo/jobtypes.state_disabled')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/jobtypes.add_jobtype')}}</button>
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


@endsection 
