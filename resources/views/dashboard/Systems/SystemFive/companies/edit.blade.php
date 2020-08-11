@section('title')
    {{__('Systems/SystemFive/companies.company_add')}}
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

    {{--dropify--}}
    <link rel="stylesheet" href="{{asset('assets/dropify/dropify/dropify.css')}}"/>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemFive/companies.add_company')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('companies.index')}}">{{__('Systems/SystemFive/companies.companies')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/companies.add_company')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('companies.index') }}">Back</a>
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
                <form method="post" action="{{ route('companies.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="company_id" value="{{$company->id}}">

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="name">{{__('Systems/SystemFive/companies.name')}}</label>
                                        <input type="text" class="form-control" id="code" name="name"
                                               placeholder="name" required="" value="@if(isset($company->name)){{$company->name}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="field">{{__('Systems/SystemFive/companies.field')}}</label>
                                        <select class="form-control" id="field" name="field" required>
                                            @if(isset($fields))
                                                @foreach($fields as $key => $field)
                                                    <option @if($company->name == $field->name) selected="" @endif value="{{$field->name}}">{{$field->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="country">{{__('Systems/SystemFive/companies.country')}}</label>
                                        <select class="form-control" id="country" name="country" onchange="onChanged('country')" required>
                                            @if(isset($sortnames) && count($sortnames) > 0)
                                                @foreach($sortnames as $key => $sortname)
                                                    <optgroup label="{{$sortname->sortname}}">
                                                        @foreach($countries as $key => $country)
                                                            @if($sortname->sortname == $country->sortname)
                                                                <option @if($country->id == $company->country) selected @endif value="{{$country->id}}">@if(app()->getLocale() == "en"){{$country->name}} @else {{$country->ar_name}} @endif</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach

                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="region">{{__('Systems/SystemFive/companies.region')}}</label>
                                        <select class="form-control" id="region" name="region" onchange="onChanged('province')" required>
                                            @if(isset($company->region))
                                                @foreach($regions as $key => $region)
                                                    <option @if($region->id == $company->region) selected @endif value="{{$region->id}}">{{$region->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="city">{{__('Systems/SystemFive/companies.city')}}</label>
                                        <select class="form-control" id="city" name="city" onchange="onChanged('city')" required>
                                            @if(isset($company->city))
                                                @foreach($cities as $key => $city)
                                                    <option @if($city->id == $company->region) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="neighborhood">{{__('Systems/SystemFive/companies.neighborhood')}}</label>
                                        <select class="form-control" id="neighborhood" name="neighborhood" required>
                                            @if(isset($company->neighborhood))
                                                @foreach($neighborhoods as $key => $neighborhood)
                                                    <option @if($neighborhood->id == $company->neighborhood) selected @endif value="{{$neighborhood->id}}">{{$neighborhood->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="mobile">{{__('Systems/SystemFive/companies.mobile')}}</label>
                                        <input type="number" class="form-control" id="mobile" name="mobile"
                                               placeholder="mobile" required="" value="@if(isset($company->mobile)){{$company->mobile}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="telephone">{{__('Systems/SystemFive/companies.telephone')}}</label>
                                        <input type="number" class="form-control" id="telephone" name="telephone"
                                               placeholder="telephone" required="" value="@if(isset($company->telephone)){{$company->telephone}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="email">{{__('Systems/SystemFive/companies.email')}}</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="email" required="" value="@if(isset($company->email)){{$company->email}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="address">{{__('Systems/SystemFive/companies.address')}}</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="address" required="" value="@if(isset($company->address)){{$company->address}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="bankname">{{__('Systems/SystemFive/companies.bankname')}}</label>
                                        <input type="text" class="form-control" id="bankname" name="bankname"
                                               placeholder="bankname" required="" value="@if(isset($company->bankname)){{$company->bankname}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="accountname">{{__('Systems/SystemFive/companies.accountname')}}</label>
                                        <input type="text" class="form-control" id="accountname" name="accountname"
                                               placeholder="accountname" required="" value="@if(isset($company->accountname)){{$company->accountname}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="accountnumber">{{__('Systems/SystemFive/companies.accountnumber')}}</label>
                                        <input type="number" class="form-control" id="accountnumber" name="accountnumber"
                                               placeholder="accountnumber" required="" value="@if(isset($company->accountnumber)){{$company->accountnumber}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="accountiban">{{__('Systems/SystemFive/companies.accountiban')}}</label>
                                        <input type="text" class="form-control" id="accountiban" name="accountiban"
                                               placeholder="accountiban" required="" value="@if(isset($company->accountiban)){{$company->accountiban}}@endif">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="swiftcode">{{__('Systems/SystemFive/companies.swiftcode')}}</label>
                                        <input type="text" class="form-control" id="swiftcode" name="swiftcode"
                                               placeholder="swiftcode" required="" value="@if(isset($company->swiftcode)){{$company->swiftcode}}@endif">
                                    </div>
                                </div>

                                {{--<div class="col-lg-3 mb-4">--}}
                                    {{--<div class="form-group mb-0">--}}
                                        {{--<label for="cardimage">{{__('Systems/SystemFive/companies.cardimage')}}</label>--}}
                                        {{--<input type="text" class="form-control" id="cardimage" name="cardimage"--}}
                                               {{--placeholder="cardimage" value="@if(isset($company->cardimage)){{$company->cardiamge}}@endif">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="col-xl-12 col-md-12">
                                    <label for="swiftcode">{{__('Systems/SystemFive/companies.cardimage')}}</label>
                                    <!-- Example Default Value -->
                                    <div class="example-wrap">
                                        <div class="example">
                                            <input type="file" id="input-file-now-custom-1" name="cardimage" data-plugin="dropify" data-default-file="{{asset($company->cardimage)}}"/>
                                        </div>
                                    </div>
                                    <!-- End Example Default Value -->
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFive/companies.add_company')}}</button>
                                    </div>
                                </div>
                </form>

            </div>

            <p id="locale" style="display: none;"><?php echo app()->getLocale()?></p>


        </div>
    </div>
    </div>
    <!-- End col -->
    </div>
    <!-- End row -->
    </div>

    <script>
        function onChanged(area) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });

            $.ajax({
                url: "/dashboard/region",
                headers: { 'csrftoken' : '{{ csrf_token() }}' },
                data: JSON.stringify({country:$("#country").val(),
                    province:$("#region").val(),
                    city:$("#city").val(),
                    neighborhood:$("#neighborhood").val(),
                    area:area}),
                type: 'POST',
                datatype: 'JSON',
                contentType: 'application/json',
                success: function (response) {

                    console.log(response[0]);
                    var index;
                    var content = "";
                    for ( index = 0 ; index < response.length ; index ++ ) {

                        content += "<option";
                        content += " value=";
                        content += "'";
                        content += response[index].id;
                        content += "'";
                        content += ">";
                        if($("#locale") === "en")
                            content += response[index].name;
                        else
                            content += response[index].ar_name;
                        content += "</option>";

                    }

                    var preoption;

                    if (area === "country") {
                        preoption = "<option disabled selected value=\"\">select region</option>";
                        $("#region").html(preoption + content);
                        $("#city").html("");
                        $("#neighborhood").html("");
                    }
                    if (area === "province") {
                        preoption = "<option disabled selected value=\"\">select city</option>";
                        $("#city").html(preoption + content);
                        $("#neighborhood").html("");
                    }
                    if (area === "city") {
                        preoption = "<option disabled selected value=\"\">select neighborhood</option>";
                        $("#neighborhood").html(preoption + content);
                    }

                    // console.log(response);


                },
                error: function (response) {
                    $('#errormessage').html(response.message);
                }
            });
        }

    </script>


    <!-- End Contentbar -->
@endsection
@section('script')


    <script src="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard//plugins/datepicker/i18n/datepicker.en.js') }}"></script>


    <script src="{{ asset('assets/dashboard//js/custom/custom-toasts.js') }}"></script>

    {{--dropify--}}
    <script src="{{ asset('assets/dropify/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('assets/dropify/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/dropify/js/Component.js') }}"></script>
    <script src="{{ asset('assets/dropify/js/Plugin.js') }}"></script>
    <script src="{{ asset('assets/dropify/js/Base.js') }}"></script>
    <script src="{{ asset('assets/dropify/Site.js') }}"></script>
    <script src="{{ asset('assets/dropify/forms/uploads.js') }}"></script>



@endsection 
