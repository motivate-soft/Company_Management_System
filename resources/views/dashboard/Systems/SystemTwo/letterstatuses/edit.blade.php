@section('title')
{{__('Systems/SystemTwo/letterstatuses.letterstatuses_edit')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/letterstatuses.edit_letterstatus')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('letterstatuses.index')}}">{{__('Systems/SystemTwo/letterstatuses.letterstatuses')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/letterstatuses.edit_letterstatus')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('letterstatuses.index') }}" >{{__('Systems/SystemTwo/letterstatuses.back')}}</a>
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
            <form method="post" action="{{ url('dashboard/edit-letterstatus') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="letterstatus_id" value="{{ $letterstatus->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/letterstatuses.name')}}</label>
                                <input type="text" placeholder="name" class="form-control" @if(isset($letterstatus->name)) value="{{ $letterstatus->name }}"@endif name="name" required="">
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/letterstatuses.name')}}</label>
                                <input type="text" placeholder="ar_name" class="form-control" @if(isset($letterstatus->ar_name)) value="{{ $letterstatus->ar_name }}"@endif name="ar_name" required="">
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="person">{{__('Systems/SystemTwo/letterstatuses.name')}}</label>
                                <select id="person" name="person" class="form-control">
                                    @if(isset($persons) && count($persons))
                                        @foreach($persons as $key => $person)
                                            <option @if($person->firstname == $letterstatus->person) selected @endif value="{{$person->firstname}}">{{$person->firstname}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                {{--<input type="text" class="form-control" id="code" name="name"--}}
                                       {{--placeholder="name" required="">--}}
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="state">{{__('Systems/SystemTwo/letterstatuses.state')}}</label>
                                <select id="state" name="state" class="form-control">
                                    <option @if(isset($letterstatus->state) && $letterstatus->state == 1) selected @endif value="1">{{__('Systems/SystemTwo/letterstatuses.state_enabled')}}</option>
                                    <option @if(isset($letterstatus->state) && $letterstatus->state == 0) selected @endif value="0">{{__('Systems/SystemTwo/letterstatuses.state_disabled')}}</option>
                                </select>
                                {{--<input type="number" placeholder="entry_hour" class="form-control" @if(isset($letterstatus->entry_hour)) value="{{ $letterstatus->entry_hour }}"@endif name="entry_hour" placeholder="No entry_hour" required="">--}}
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/letterstatuses.save')}}</button>
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
