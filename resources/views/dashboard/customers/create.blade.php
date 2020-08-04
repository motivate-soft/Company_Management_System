@section('title') 
{{ __('customers/customers.customerAdd') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')


<link href="{{ asset('assets/dashboard/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('customers/customers.customerAdd') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="list-customers">{{ __('side.customers') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('customers/customers.customerAdd') }}</li>
                </ol>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('customers.index') }}" >{{ __('customers/customers.back') }}</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- End col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="basic-form-wizard" action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <h3>Basic</h3>
                                    <section>
                                        <h4 class="font-22 mb-3">Add New Customer !!!</h4>
                                        <div class="form-group">
                                            <label>{{ __('customers/customers.customerSalesEmployee') }}</label>
                                        <input type="text" class="form-control" name="salesemployee" placeholder="{{ __('customers/customers.customerSalesEmployee') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('customers/customers.customerNickname') }}</label>
                                        <input type="text" class="form-control" name="nickname" placeholder="{{ __('customers/customers.customerNickname') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('customers/customers.customerName') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('customers/customers.customerName') }}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('customers/customers.entryType') }}</label>
                                        <input type="text" class="form-control" name="entrytype" placeholder="{{ __('customers/customers.entryType') }}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('customers/customers.entryName') }}</label>
                                        <input type="text" class="form-control" name="entryname" placeholder="{{ __('customers/customers.entryName') }}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('customers/customers.position') }}</label>
                                        <input type="text" class="form-control" name="position" placeholder="{{ __('customers/customers.position') }}" required="">
                                        </div>
                                    </section>
                                    <h3>Contact</h3>
                                    <section>
                                        <h4 class="font-22 mb-3">Contact Information</h4>
                                        <div class="form-group">
                                            <label for="tel">{{ __('customers/customers.mobileNumber') }}</label>
                                            <input type="tel" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="landlinenumber">{{ __('customers/customers.landlineNumber') }}</label>
                                            <input type="tel" class="form-control" name="landlinenumber" id="landlinenumber" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">{{ __('customers/customers.fax') }}</label>
                                            <input type="number" class="form-control" id="fax" name="fax" placeholder="{{ __('customers/customers.fax') }}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">{{ __('customers/customers.customerEmail') }}</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('customers/customers.customerEmail') }}" required="">
                                        </div>
                                    </section>
                                    <h3>Address</h3>
                                    <section>
                                        <h4 class="font-22 mb-3">Address !!!</h4>
                                        <div class="form-group">
                                            <label for="zipcode">{{ __('customers/customers.zipcode') }}</label>
                                            <input type="number" class="form-control" name="zipcode" id="zipcode" placeholder="{{ __('customers/customers.zipcode') }}" required="">

                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">--select</option>  
                                                {{ get_all_countries() }}
                                            </select>  
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            {{--<select name="city" id="city" class="form-control">--}}
                                                {{--<option value="">--select</option>--}}
                                            {{--</select>--}}
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            {{--<select name="city" id="district" class="form-control">--}}
                                                {{--<option value="">--select</option>--}}
                                            {{--</select>--}}
                                            <input type="text" class="form-control" id="district" name="district" placeholder="District" required=""/>

                                        </div>

                                        {{--<div class="form-group">--}}
                                            {{--<label for="email">Neighborhood</label>--}}
                                            {{--<select name="neighborhood" id="neighborhood" class="form-control">--}}
                                                {{--<option value="">--select</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" name="street" placeholder="Street" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Address" required="">
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label for="note">Notes</label>--}}
                                            {{--<textarea name="address_note" cols="3" id="note" rows="3" class="form-control" placeholder="Address Notes"></textarea>--}}
                                        {{--</div>--}}
                                    </section>
                                    <!-- <h3>Hints</h3>  
                                    <section>
                                        <h4 class="font-22 mb-3">See Your Hints !!!</h4>
                                        <ul>
                                            <li><strong>Customer Name :</strong> John</li>
                                            <li><strong>Customer Phone :</strong> Doe</li>
                                            <li><strong>Customer Email :</strong> johndoe@gmail.com</li>
                                            <li><strong>Customer Address :</strong> 123, Street, City.</li>
                                            <li><strong>Customer Notes :</strong> 123, Street, City.</li>
                                        </ul>
                                    </section> -->
                                    <h3>Finish</h3>  
                                    <section>
                                        <h4 class="font-22 mb-3">Let's Finished !!!</h4>
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="acceptTerms">
                                          <label class="custom-control-label" for="acceptTerms" onclick="enable()">I Agree with the Terms and Conditions.</label>
                                        </div>
                                    </section>
                                    <button type="submit" id="create" class="btn-blue" value="Add" disabled>Add</button>
                                </div>
                            </form>  
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
 
<!-- End Contentbar -->
@endsection 
@section('script')

<script src="{{ asset('assets/dashboard/dashboard/plugins/jquery-step/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-form-wizard.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

<script src="{{ asset('assets/dashboard/plugins/select2/select2.min.js') }}"></script> 

<script>
    
        function enable() {
            // alert($("#create").attr('disabled'));
            if ($("#create").attr('disabled') === 'disabled'){
                $("#create").removeAttr('disabled');
            } else {
                $("#create").attr('disabled', 'disabled');
            }
        }
</script>
@endsection 