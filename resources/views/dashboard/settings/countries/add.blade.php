@section('title') 
{{ __('settings/countries.addNew') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')


<link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('settings/countries.addNew') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.settings') }}</li>
                    <li class="breadcrumb-item"><a href="{{route('countries.index')}}">{{ __('settings/countries.countryList') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('settings/countries.addNew') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('countries.index') }}" >{{ __('settings/countries.countryList') }}</a>
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
            <form method="post" action="{{ route('countries.countries.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row"> 
                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('settings/countries.nameEN') }}</label>
                            <input type="text" class="form-control" name="country_name" placeholder="{{ __('settings/countries.nameEN') }}" required="">
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('settings/countries.nameAR') }}</label>
                            <input type="text" class="form-control" name="ar_country_name" placeholder="{{ __('settings/countries.nameAR') }}" required="">
                        </div>
                    </div>

                    <!--<div class="col-lg-4 mb-4">-->
                    <!--    <div class="form-group mb-0">-->
                    <!--        <label>Country Short name:</label>    -->
                    <!--        <input type="text" class="form-control" name="short_code" placeholder="Enter Country Short Name" required="">-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="col-lg-4 mb-4">
                        <div class="form-group mb-0">
                            <label>{{ __('settings/countries.phoneCode') }}</label>    
                            <input type="number" class="form-control" name="country_code" placeholder="{{ __('settings/countries.phoneCode') }}" required="">
                        </div>
                    </div>

                    

                
                    <div class="col-lg-12 mt-4">
                        <div class="form-group mb-0">
                             <button type="submit" class="btn btn-primary pl-5 pr-5">{{ __('settings/countries.addNew') }}</button>
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





@endsection 