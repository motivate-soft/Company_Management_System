@section('title')
    {{__('Systems/SystemTwo/entryexits.permissiongroup_add')}}
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

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemTwo/permissiongroups.add_permissiongroup')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('permissiongroups.index')}}">{{__('Systems/SystemTwo/permissiongroups.permissiongroups')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/permissiongroups.add_permissiongroup')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('permissiongroups.index') }}">Back</a>
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
                <form method="post" action="{{ route('permissiongroups.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="name">{{__('Systems/SystemTwo/permissiongroups.name')}}</label>
                                        <input type="text" class="form-control" id="code" name="name"
                                               placeholder="name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="ar_name">{{__('Systems/SystemTwo/permissiongroups.ar_name')}}</label>
                                        <input type="text" class="form-control" id="code" name="ar_name"
                                               placeholder="ar_name" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="state">{{__('Systems/SystemTwo/permissiongroups.state')}}</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="1">{{__('Systems/SystemTwo/permissiongroups.state_enabled')}}</option>
                                            <option value="0">{{__('Systems/SystemTwo/permissiongroups.state_disabled')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <div class="form-group mb-0">
                                        <label>{{__('Systems/SystemTwo/permissiongroups.permissions')}}</label>

                                        @if(isset($permissions) && count($permissions) > 0)
                                            @foreach($permissions as $key => $permission)
                                            <div class="row">
                                                <div class="col-sm-6 text-center">
                                                    <label for="{{$permission->id}}">@if(app()->getLocale() == "en"){{$permission->name}} @else {{$permission->ar_name}}@endif</label>
                                                </div>
                                                <div class="col-sm-6 text-center">
                                                    <label class="switch">
                                                        <input type="checkbox" name="{{$permission->id}}"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>


                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/permissiongroups.add_permissiongroup')}}</button>
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
