@section('title')
    {{__('Systems/SystemTwo/communications.communications_add')}}
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
                <h4 class="page-title">{{__('Systems/SystemTwo/communications.add_communication')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('communications.index')}}">{{__('Systems/SystemTwo/communications.communications')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/communications.add_communication')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('communications.index') }}">{{__('Systems/SystemTwo/communications.back')}}</a>
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
                <form method="post" action="{{ route('communications.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="transaction_type">{{__('Systems/SystemTwo/communications.transaction_type')}}</label>
                                        <select class="form-control" name="transaction_type" required="" id="type">

                                            @if(isset($transactions) && count($transactions) > 0)
                                                @foreach($transactions as $key => $transaction)
                                                    <option value="{{$transaction->name}}">{{$transaction->name}}</option>
                                                    @endforeach

                                            @endif

                                        </select>

                                        {{--<input type="text" class="form-control" id="code" name="transaction_type"--}}
                                               {{--placeholder="Insert transaction_type" required="">--}}
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="entity_name">{{__('Systems/SystemTwo/communications.entity_name')}}</label>
                                        <input type="text" class="form-control" id="code" name="entity_name"
                                               placeholder="Insert entity_name" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="letter_authorized">{{__('Systems/SystemTwo/communications.letter_authorized')}}</label>
                                        <input type="text" class="form-control" id="coupon_value" name="letter_authorized"
                                               placeholder="letter_authorized" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="employee_responsible">{{__('Systems/SystemTwo/communications.employee_responsible')}}</label>
                                        <input type="text" class="form-control" id="coupon_value" name="employee_responsible"
                                               placeholder="employee_responsible" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="number">number</label>
                                        <input type="number" class="form-control" min="0" id="coupon_value" name="number"
                                               placeholder="number" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label>{{__('Systems/SystemTwo/communications.date_letter')}}</label>
                                        <div class="input-group">
                                            <input type="text" id="default-date" class="form-control"
                                                   placeholder="yyyy/mm/dd" aria-describedby="basic-addon2"
                                                   name="date_letter" autocomplete="off"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="status_letter">{{__('Systems/SystemTwo/communications.status_letter')}}</label>
                                        <input type="number" class="form-control" id="total_usage" name="status_letter"
                                               placeholder="status_letter" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="prepayments">prepayments</label>
                                        <input type="text" class="form-control" id="total_usage" name="prepayments"
                                               placeholder="prepayments" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="transaction_explanation">{{__('Systems/SystemTwo/communications.transaction_explanation')}}</label>
                                        <textarea class="form-control" id="transaction_explanation" name="transaction_explanation" placeholder="transaction_explanation" required=""></textarea>

                                        {{--<input type="text" class="form-control" id="code" name="transaction_explanation"--}}
                                               {{--placeholder="transaction_explanation" required="">--}}
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit"
                                                class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/communications.add_communication')}}</button>
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
