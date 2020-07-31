@section('title') 
{{ __('plugins/payments/bank_rajhi.pluginName') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('plugins/payments/bank_rajhi.pluginName') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/plugins')}}">{{ __('side.plugins') }}</a></li>
                    <li class="breadcrumb-item">{{ __('plugins/plugins.payments') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('plugins/payments/bank_rajhi.pluginName') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba">{{ __('plugins/payments/bank_rajhi.update') }}</button>
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
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="card-title">{{ __('plugins/payments/bank_rajhi.paymentInformation') }}</h5>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label>{{ __('plugins/payments/bank_rajhi.accountHolder') }}</label>
                                <input type="text" class="form-control" maxlength="50" name="#" id="#" required placeholder="{{ __('plugins/payments/bank_rajhi.accountHolder') }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label>{{ __('plugins/payments/bank_rajhi.accountIban') }}</label>
                                <input type="text" class="form-control" maxlength="25" name="#" id="#" required placeholder="{{ __('plugins/payments/bank_rajhi.accountIbanPlaceHolder') }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="form-group mb-0">
                                <label>{{ __('plugins/payments/bank_rajhi.accountNumber') }}</label>
                                <input type="number" class="form-control" maxlength="18" name="#" id="#" required placeholder="{{ __('plugins/payments/bank_rajhi.accountNumberPlaceHolder') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label>{{ __('plugins/payments/bank_rajhi.additionalEN') }}</label>
                                <textarea name="#" id="#" required cols="3" rows="3" class="form-control" placeholder="{{ __('plugins/payments/bank_rajhi.additionalEN') }} ..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label>{{ __('plugins/payments/bank_rajhi.additionalAR') }}</label>
                                <textarea name="#" id="#" required cols="3" rows="3" class="form-control" placeholder="{{ __('plugins/payments/bank_rajhi.additionalAR') }} ..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                 <button type="submit" class="btn btn-primary pl-5 pr-5">{{ __('plugins/payments/bank_rajhi.update') }}</button>
                            </div>
                        </div>
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
<!-- MaxLength js -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('assets/dashboard//js/custom/custom-form-maxlength.js') }}"></script>
@endsection 