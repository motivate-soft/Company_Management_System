@section('title')
    {{__('Systems/SystemFive/offers.offers_add')}}
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
                <h4 class="page-title">{{__('Systems/SystemFive/offers.add_offer')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('offers.index')}}">{{__('Systems/SystemFive/offers.offers')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/offers.add_offer')}}</li>
                    </ol>
                </div>
            </div>

            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('offers.index') }}">Back</a>
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
                <form method="post" action="{{ route('offers.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="company_name">{{__('Systems/SystemFive/offers.company_name')}}</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               placeholder="company_name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="domain">{{__('Systems/SystemFive/offers.domain')}}</label>
                                        <input type="text" class="form-control" id="domain" name="domain"
                                               placeholder="domain" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="offer_title">{{__('Systems/SystemFive/offers.offer_title')}}</label>
                                        <input type="text" class="form-control" id="offer_title" name="offer_title"
                                               placeholder="offer_title" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="state">{{__('Systems/SystemFive/offers.state')}}</label>
                                        <select class="form-control" id="state" name="state">
                                            <option value="Awaiting Deliveries">Awaiting Deliveries</option>
                                            <option value="Submitted">Submitted</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                        {{--<input type="text" class="form-control" id="order_detail" name="order_detail"--}}
                                        {{--placeholder="order_detail" required="">--}}
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="order_detail">{{__('Systems/SystemFive/offers.order_detail')}}</label>
                                        <textarea class="form-control" id="order_detail" name="order_detail"
                                        placeholder="order_detail" required=""></textarea>
                                        {{--<input type="text" class="form-control" id="order_detail" name="order_detail"--}}
                                               {{--placeholder="order_detail" required="">--}}
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFive/offers.add_offer')}}</button>
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
