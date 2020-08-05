{{__('Systems/SystemTwo/entryexits.entryexits_edit')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/entryexits.edit_entryexit')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('entryexits.index')}}">{{__('Systems/SystemTwo/entryexits.entryexits')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/entryexits.edit_entryexit')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('entryexits.index') }}" >{{__('Systems/SystemTwo/entryexits.back')}}</a>
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
            <form method="post" action="{{ url('dashboard/edit-entryexit') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="entryexit_id" value="{{ $entryexit->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/entryexits.name')}}</label>
                                <input type="text" placeholder="name" class="form-control" @if(isset($entryexit->name)) value="{{ $entryexit->name }}"@endif name="name" placeholder="No name" required="">
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="date">{{__('Systems/SystemTwo/entryexits.date')}}</label>
                                <div class="input-group">
                                    <input type="text" id="default-date" class="form-control" placeholder="yyyy/mm/dd" aria-describedby="basic-addon2" name="date" @if(isset($entryexit->date)) value="{{ $entryexit->date }}" @endif />
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/entryexits.entry_hour')}}</label>
                                <input type="number" placeholder="entry_hour" class="form-control" @if(isset($entryexit->entry_hour)) value="{{ $entryexit->entry_hour }}"@endif name="entry_hour" placeholder="No entry_hour" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/entryexits.exit_hour')}}</label>
                                <input type="number" placeholder="exit_hour" class="form-control" @if(isset($entryexit->exit_hour)) value="{{ $entryexit->exit_hour }}"@endif name="exit_hour" placeholder="No exit_hour" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/entryexits.working_time')}}</label>
                                <input type="number" placeholder="working_time" class="form-control" @if(isset($entryexit->working_time)) value="{{ $entryexit->working_time }}"@endif name="working_time" placeholder="No working_time" required="">
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/entryexits.save')}}</button>
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
