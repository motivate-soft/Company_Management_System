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
                                <form id="basic-form-wizard" action="{{ route('customers.update',$customer->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <h3>Basic</h3>
                                        <section>
                                            <h4 class="font-22 mb-3">Add New Customer !!!</h4>
                                            <div class="form-group">
                                                <label for="employee">{{ __('customers/customers.customerSalesEmployee') }}</label>
                                                <select type="text" class="form-control" id="employee" name="salesemployee"
                                                        required="">
                                                    <option value="">Select Employee</option>
                                                    @foreach($employees as $key => $employee)
                                                        <option value="{{$employee->id}}" @if($employee->id == $customer->employee_id) selected @endif>{{$employee->firstname}} {{$employee->second_name}} {{$employee->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('customers/customers.customerNickname') }}</label>
                                                <input type="text" class="form-control" name="nickname" value={{$customer->nickname}} required>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('customers/customers.customerName') }}</label>
                                                <input type="text" class="form-control" name="name" value={{$customer->customer_name}} required="">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('customers/customers.entryType') }}</label>
                                                <input type="text" class="form-control" name="entrytype" value={{$customer->entry_type}} required="">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('customers/customers.entryName') }}</label>
                                                <input type="text" class="form-control" name="entryname" value={{$customer->entry_name}} required="">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('customers/customers.position') }}</label>
                                                <input type="text" class="form-control" name="position" value={{$customer->position}} required="">
                                            </div>
                                        </section>
                                        <h3>Contact</h3>
                                        <section>
                                            <h4 class="font-22 mb-3">Contact Information</h4>
                                            <div class="form-group">
                                                <label for="mobilenumber">{{ __('customers/customers.mobileNumber') }}</label>
                                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" value={{$customer->mobile_number}} required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="landlinenumber">{{ __('customers/customers.landlineNumber') }}</label>
                                                <input type="text" class="form-control" name="landlinenumber" id="landlinenumber" value={{$customer->landline_number}} required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="fax">{{ __('customers/customers.fax') }}</label>
                                                <input type="text" class="form-control" id="fax" name="fax" value={{$customer->fax}} required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">{{ __('customers/customers.customerEmail') }}</label>
                                                <input type="email" class="form-control" id="email" name="email" value={{$customer->email}} required="">
                                            </div>
                                        </section>
                                        <h3>Address</h3>
                                        <section>
                                            <h4 class="font-22 mb-3">Address !!!</h4>
                                            <div class="form-group">
                                                <label for="zipcode">{{ __('customers/customers.zipcode') }}</label>
                                                <input type="text" class="form-control" name="zipcode" id="zipcode" value={{$customer->zipcode}} required="">

                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select name="country_id" id="country" class="form-control" onchange="region('country')">
                                                    <option value="">Select Country</option>
                                                    @if(isset($sortnames) && count($sortnames) > 0)
                                                        @foreach($sortnames as $key => $sortname)
                                                            <optgroup label="{{$sortname->sortname}}">
                                                                @foreach($countries as $key => $country)
                                                                    @if($sortname->sortname == $country->sortname)
                                                                        <option value="{{$country->id}}" @if($country->name == $customer->country->name) selected @endif>{{$country->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <select name="province_id" id="province" class="form-control" onchange="region('province')">
                                                    @if(isset($provinces) && count($provinces) > 0)
                                                        @foreach($provinces as $key => $province)
                                                            <option @if(isset($customer->province_id) && $customer->province->name == $province->name) selected @endif value="{{$province->id}}">{{$province->name}}</option>
                                                        @endforeach
                                                    @endif                                       
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <select name="city_id" id="city" class="form-control" onchange="region('city')">
                                                    @if(isset($cities) && count($cities) > 0)
                                                        @foreach($cities as $key => $city)
                                                            <option @if(isset($customer->city) && $customer->city->name == $city->name) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    @endif                                         
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="street_id">Street</label>
                                                <select name="street_id" id="street" class="form-control" onchange="region('street')">
                                                    @if(isset($streets) && count($streets) > 0)
                                                        @foreach($streets as $key => $street)
                                                            <option @if(isset($customer->street) && $customer->street->name == $street->name) selected @endif value="{{$street->id}}">{{$street->name}}</option>
                                                        @endforeach
                                                    @endif                                          
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" id="address" value={{$customer->address}} required="">
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
                                                <input type="checkbox" class="custom-control-input" id="acceptTerms" onclick="enable()">
                                                <label class="custom-control-label" for="acceptTerms">I Agree with the Terms and Conditions.</label>
                                            </div>
                                        </section>
                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group mb-0">
                                                <button type="submit" id="update" disabled
                                                        class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemOne/customers.update')}}</button>
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
            if ($("#update").attr('disabled') === 'disabled'){
                $("#update").removeAttr('disabled');
            } else {
                $("#update").attr('disabled', 'disabled');
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