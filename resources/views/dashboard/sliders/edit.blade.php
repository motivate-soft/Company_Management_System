@section('title')
{{ __('coupon.couponEdit') }}
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
            <h4 class="page-title">{{ __('coupon.couponEdit') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.marketing') }}</li>
                    <li class="breadcrumb-item active"><a href="{{route('coupons.index')}}">{{ __('side.coupons') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('coupon.couponEdit') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('coupons.index') }}" >{{ __('coupon.couponBack') }}</a>
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
            <form method="post" action="{{ url('edit-coupon') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="coupon_id" value="{{ $coupon->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-3 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('coupon.couponPromoCode') }}</label>
                            <input type="text" placeholder="{{ __('coupon.couponPromoCode') }}" class="form-control" @if(isset($coupon->code)) value="{{ $coupon->code }}"@endif name="code" placeholder="Promo Code" required="">
                        </div>
                    </div>

                    <div class="col-lg-3 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('coupon.couponType') }}</label>
                            <select class="form-control" name="type" required="">
                                <option disabled selected value="">{{ __('coupon.couponTypeSelect') }}</option>
                                <option value="Free" @if(isset($coupon->type) && $coupon->type == "Free") selected @endif>{{ __('coupon.couponFree') }}</option>
                                <option value="Percentage" @if(isset($coupon->type) && $coupon->type == "Percentage") selected @endif>{{ __('coupon.couponPercentage') }}</option>
                                <option value="Flat" @if(isset($coupon->type) && $coupon->type == "Flat") selected @endif>{{ __('coupon.couponFlat') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('coupon.couponValue') }}</label>
                            <input type="number" class="form-control" name="coupon_value" @if(isset($coupon->coupon_value)) value="{{ $coupon->coupon_value }}" @endif placeholder="Value" required="">
                        </div>
                    </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="total_usage">{{ __('coupon.total_usage_per_client') }}</label>
                                <input type="number" class="form-control" id="total_usage" name="total_usage"
                                       placeholder="{{ __('coupon.total_usage_per_client') }}" value="{{$coupon->total_usage}}" required="">
                            </div>
                        </div>
                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('coupon.couponStatus') }}</label>
                            <select class="form-control" name="status" required="">
                                <option disabled selected value="">{{ __('coupon.couponeStatusSelect') }}</option>
                                <option value="0" @if(isset($coupon->status) && $coupon->status == "0") selected @endif>{{ __('coupon.couponHold') }}</option>
                                <option value="1" @if(isset($coupon->status) && $coupon->status == "1") selected @endif>{{ __('coupon.couponeActive') }}</option>

                            </select>
                        </div>
                    </div>



                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('coupon.couponStart') }}</label>
                            <div class="input-group">
                                <input type="text" id="default-date" class="form-control" placeholder="yyyy/mm/dd" aria-describedby="basic-addon2" name="start_date" @if(isset($coupon->start_time)) value="{{ $coupon->start_time }}" @endif />
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('coupon.couponEnd') }}</label>
                            <div class="input-group">
                                <input type="text" id="default-date12" class="form-control" placeholder="yyyy/mm/dd" aria-describedby="basic-addon2" name="end_date" @if(isset($coupon->end_time)) value="{{ $coupon->end_time }}"@endif />
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 mt-4">
                        <div class="form-group mb-0">
                             <button type="submit" class="btn btn-primary pl-5 pr-5">{{ __('coupon.couponSave') }}</button>
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
