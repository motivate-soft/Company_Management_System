@section('title')
    {{__('Systems/SystemTwo/communications.communications_edit')}}
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
            <h4 class="page-title">{{__('Systems/SystemTwo/communications.edit_communication')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.marketing') }}</li>
                    <li class="breadcrumb-item active"><a href="{{route('communications.index')}}">{{__('Systems/SystemTwo/communications.communications')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/communications.edit_communication')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('communications.index') }}" >{{__('Systems/SystemTwo/communications.back')}}</a>
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
            <form method="post" action="{{ url('dashboard/edit-communication') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="communication_id" value="{{ $communication->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="transaction_type">{{__('Systems/SystemTwo/communications.transaction_type')}}</label>

                                <select id="transaction_type" class="form-control" name="transaction_type" required="">
                                    {{--<option disabled selected value="">Select the transaction type</option>--}}
                                    <option value="atm" @if(isset($communication->transaction_type) && $communication->transaction_type == "atm") selected @endif>ATM</option>
                                    <option value="charge" @if(isset($communication->transaction_type) && $communication->transaction_type == "charge") selected @endif>CHARGE</option>
                                    <option value="check" @if(isset($communication->transaction_type) && $communication->transaction_type == "check") selected @endif>CHECK</option>
                                    <option value="deposit" @if(isset($communication->transaction_type) && $communication->transaction_type == "deposit") selected @endif>DEPOSIT</option>
                                    <option value="online" @if(isset($communication->transaction_type) && $communication->transaction_type == "online") selected @endif>ONLINE</option>
                                </select>

                                {{--<input type="text" placeholder="transaction_type" class="form-control" @if(isset($communication->transaction_type)) value="{{ $communication->transaction_type }}"@endif name="transaction_type" placeholder="No transaction_type" required="">--}}
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.entity_name')}}</label>
                                <input type="text" placeholder="entity_name" class="form-control" @if(isset($communication->entity_name)) value="{{ $communication->entity_name }}"@endif name="entity_name" placeholder="No entity_name" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.letter_authorized')}}</label>
                                <input type="text" placeholder="letter_authorized" class="form-control" @if(isset($communication->letter_authorized)) value="{{ $communication->letter_authorized }}"@endif name="letter_authorized" placeholder="No letter_authorized" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.employee_responsible')}}</label>
                                <input type="text" placeholder="employee_responsible" class="form-control" @if(isset($communication->employee_responsible)) value="{{ $communication->employee_responsible }}"@endif name="employee_responsible" placeholder="No employee_responsible" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>number</label>
                                <input type="number" placeholder="number" min="0" class="form-control" @if(isset($communication->number)) value="{{ $communication->number }}"@endif name="number" placeholder="No number" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="date_letter">{{__('Systems/SystemTwo/communications.date_letter')}}</label>
                                <div class="input-group">
                                    <input type="text" id="default-date" class="form-control" placeholder="yyyy/mm/dd" aria-describedby="basic-addon2" name="date_letter" @if(isset($communication->date_letter)) value="{{ $communication->date_letter }}" @endif />
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.status_letter')}}</label>
                                <input type="number" class="form-control" @if(isset($communication->status_letter)) value="{{ $communication->status_letter }}"@endif name="status_letter" placeholder="No status_letter" required="">
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.transaction_explanation')}}</label>
                                <input type="text" class="form-control" @if(isset($communication->transaction_explanation)) value="{{ $communication->transaction_explanation }}"@endif name="transaction_explanation" placeholder="No transaction_explanation" required="">

                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/communications.prepayments')}}</label>
                                <input type="text" class="form-control" @if(isset($communication->prepayments)) value="{{ $communication->prepayments }}"@endif name="prepayments" placeholder="No prepayments" required="">

                            </div>
                        </div>

                        {{--<div class="col-lg-12 mt-4">--}}
                            {{--<div class="form-group mb-0">--}}
                                {{--<label for="reponse">response</label>--}}
                                {{--<textarea id="reponse" name="reponse">@if(isset($communication->response)){{ $communication->reponse }}@endif</textarea>--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">Save</button>
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
