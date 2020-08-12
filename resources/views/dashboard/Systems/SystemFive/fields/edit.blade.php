@section('title')
{{__('Systems/SystemFive/fields.fields_edit')}}
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
            <h4 class="page-title">{{__('Systems/SystemFive/fields.edit_field')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('fields.index')}}">{{__('Systems/SystemFive/fields.fields')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/fields.edit_field')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('fields.index') }}" >{{__('Systems/SystemFive/fields.back')}}</a>
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
            <form method="post" action="{{ url('dashboard/edit-field') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="field_id" value="{{ $field->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemFive/fields.name')}}</label>
                                <input type="text" placeholder="name" class="form-control" @if(isset($field->name)) value="{{ $field->name }}"@endif name="name" required="">
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemFive/fields.ar_name')}}</label>
                                <input type="text" placeholder="ar_name" class="form-control" @if(isset($field->ar_name)) value="{{ $field->ar_name }}"@endif name="ar_name" required="">
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="state">{{__('Systems/SystemFive/fields.state')}}</label>
                                <select id="state" name="state" class="form-control">
                                    <option @if(isset($field->state) && $field->state == 1) selected @endif value="1">{{__('Systems/SystemFive/fields.state_enabled')}}</option>
                                    <option @if(isset($field->state) && $field->state == 0) selected @endif value="0">{{__('Systems/SystemFive/fields.state_disabled')}}</option>
                                </select>
                                {{--<input type="number" placeholder="entry_hour" class="form-control" @if(isset($field->entry_hour)) value="{{ $field->entry_hour }}"@endif name="entry_hour" placeholder="No entry_hour" required="">--}}
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFive/fields.save')}}</button>
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
