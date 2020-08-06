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
                                            <label for="employee">{{__('Systems/SystemFour/quotations.employee')}}</label>
                                            <select type="text" class="form-control" id="employee" name="employee_id" required="">
                                                <option>Select Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->secondname}} {{$employee->lastname}}</option>
                                                @endforeach
                                            </select>
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
                                            <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="landlinenumber">{{ __('customers/customers.landlineNumber') }}</label>
                                            <input type="text" class="form-control" name="landlinenumber" id="landlinenumber" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">{{ __('customers/customers.fax') }}</label>
                                            <input type="text" class="form-control" id="fax" name="fax" placeholder="{{ __('customers/customers.fax') }}" required="">
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
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="{{ __('customers/customers.zipcode') }}" required="">

                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" id="country" class="form-control" onchange="region('country')" required>
                                                <option value="">Select Country</option>
                                                @if(isset($sortnames) && count($sortnames) > 0)
                                                    @foreach($sortnames as $key => $sortname)
                                                        <optgroup label="{{$sortname->sortname}}">
                                                            @foreach($countries as $key => $country)
                                                                @if($sortname->sortname == $country->sortname)
                                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                @endif
                                            </select>  
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Province</label>
                                            <select name="province" id="province" class="form-control" onchange="region('province')" required>
                                                <option value="">Select Province</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <select name="city" id="city" class="form-control" onchange="region('city')" required>
                                                <option value="">Select City</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="city">Street</label>
                                            <select name="street" id="street" class="form-control" onchange="region('street')" required>
                                                <option value="">Select Street</option>
                                            </select>

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
                                    <h3>Finish</h3>
                                    <section>
                                        <h4 class="font-22 mb-3">Let's Finished !!!</h4>
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="acceptTerms">
                                          <label class="custom-control-label" for="acceptTerms" onclick="enable()">I Agree with the Terms and Conditions.</label>
                                        </div>
                                    </section>
                                    <div class="col-lg-12 mt-4">
                                        <div class="form-group mb-0">
                                            <button type="submit" id="create" disabled
                                                    class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFour/quotations.add')}}</button>
                                        </div>
                                    </div>
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

        function region(area) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });

            $.ajax({
                url: "/dashboard/customers/region",
                headers: { 'csrftoken' : '{{ csrf_token() }}' },
                data: JSON.stringify({country:$("#country").val(),
                    province:$("#province").val(),
                    city:$("#city").val(),
                    area:area}),
                type: 'POST',
                datatype: 'JSON',
                contentType: 'application/json',
                success: function (response) {

                    var index;
                    var content = "";
                    for ( index = 0 ; index < response.length ; index ++ ) {

                        content += "<option";
                        content += " value=";
                        content += "'";
                        content += response[index].id;
                        content += "'";
                        content += ">";
                        content += response[index].name;
                        content += "</option>";

                    }

                    var preoption;

                    if (area === "country") {
                        preoption = "<option disabled selected value=\"\">select province</option>";
                        $("#province").html(preoption + content);
                        $("#city").html("");
                        $("#street").html("");
                    }
                    if (area === "province") {
                        preoption = "<option disabled selected value=\"\">select city</option>";
                        $("#city").html(preoption + content);
                        $("#street").html("");
                    }
                    if (area === "city") {
                        preoption = "<option disabled selected value=\"\">select street</option>";
                        $("#street").html(preoption + content);
                    }

                    // console.log(response);


                },
                error: function (response) {
                    $('#errormessage').html(response.message);
                }
            });
        }
</script>
@endsection 