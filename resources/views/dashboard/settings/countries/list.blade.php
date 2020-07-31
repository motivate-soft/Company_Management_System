@section('title') 
{{ __('settings/countries.countryList') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')  
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('settings/countries.countryList') }}</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.settings') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('settings/countries.countryList') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('countries.add') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __('settings/countries.addNew') }}</a>  
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
                    <div class="table-responsive">
                        <table class="table table-borderless" id="default-datatable">  
                            <thead>
                          <tr>
                            <th>#</th>
                            <th>{{ __('settings/countries.nameEN') }}</th>
                            <th>{{ __('settings/countries.nameAR') }}</th>
                            <th>{{ __('settings/countries.phoneCode') }}</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>  
              
                        @if(count($countries) > 0)
                          @foreach($countries as $key => $country)
                            <tr>
                               <td>{{ $key + 1 }}</td>
                               <td>{{ $country->name }}</td>
                               <td>{{ $country->ar_name }}</td>
                               <td>{{ $country->phonecode }}</td>
                               <td>
                                <button class="btn btn-dark btn-sm get_states" data-country="{{ $country->name }}" data-id="{{ $country->id }}">{{ __('settings/countries.statesBTN') }}</button>
                               </td>
                               <td><a href="#" data-toggle="modal" data-target="#edit_countries{{ $country->id }}" class="btn btn-primary btn-sm">{{ __('settings/countries.editBTN') }}</a></td>  
                               <td><a href="{{ url('dashboard/delete_countries/'.$country->id.'') }}" onclick="return confirm('are you sure you want to delete Country?');" class="btn btn-danger btn-sm">{{ __('settings/countries.delete') }}</a></td>
                               
                           </tr>

                            
            
            
                             @endforeach        
                            @else
                            {{ "No Data Found!" }}
                            @endif
                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

@include('dashboard.settings.countries.models')

<div aria-live="polite" aria-atomic="true" id="toaster_me" style="display: none;">
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 30px; right: 30px;" id="toaster_ho">
      <div class="toast-header">
          <i class="feather icon-alert-triangle text-success mr-2"></i>
          <span class="toast-title mr-auto">{{ __('settings/countries.success') }}</span>

      </div>
      <div class="toast-body" id="message_created_body">

      </div>
  </div>
</div>

<!-- End Contentbar -->
@endsection

@include('dashboard.settings.countries.script')
