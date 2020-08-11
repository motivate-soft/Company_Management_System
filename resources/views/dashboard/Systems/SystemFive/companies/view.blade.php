@section('title')
    {{__('Systems/SystemFive/companies.detail')}}
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
        .textcolor-black {
            color: black;
        }
    </style>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemFive/companies.detail')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{route('companies.index')}}">{{__('Systems/SystemFive/companies.companies')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/companies.detail')}}</li>
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
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="name">{{__('Systems/SystemFive/companies.name')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->name)){{$company->name}}@endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="field">{{__('Systems/SystemFive/companies.field')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->field)){{$company->field}}@endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="country">{{__('Systems/SystemFive/companies.country')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->country))
                                                @foreach($countries as $key => $country)
                                                    @if($company->country == $country->id)
                                                        {{$country->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="region">{{__('Systems/SystemFive/companies.region')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->region))
                                                @foreach($regions as $key => $region)
                                                    @if($company->region == $region->id)
                                                        {{$region->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="city">{{__('Systems/SystemFive/companies.city')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->city))
                                                @foreach($cities as $key => $city)
                                                    @if($company->city == $city->id)
                                                        {{$city->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="neighborhood">{{__('Systems/SystemFive/companies.neighborhood')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->neighborhood))
                                                @foreach($neighborhoods as $key => $neighborhood)
                                                    @if($company->neighborhood == $neighborhood->id)
                                                        {{$neighborhood->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="mobile">{{__('Systems/SystemFive/companies.mobile')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->mobile)) {{$company->mobile}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="telephone">{{__('Systems/SystemFive/companies.telephone')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->telephone)) {{$company->telephone}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="email">{{__('Systems/SystemFive/companies.email')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->email)) {{$company->email}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="address">{{__('Systems/SystemFive/companies.address')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->address)) {{$company->address}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="bankname">{{__('Systems/SystemFive/companies.bankname')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->bankname)) {{$company->bankname}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="accountname">{{__('Systems/SystemFive/companies.accountname')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->accountname)) {{$company->accountname}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="accountnumber">{{__('Systems/SystemFive/companies.accountnumber')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->accountnumber)) {{$company->accountnumber}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="accountiban">{{__('Systems/SystemFive/companies.accountiban')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->accountiban)) {{$company->accountiban}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="swiftcode">{{__('Systems/SystemFive/companies.swiftcode')}}</label>
                                        <p class="textcolor-black">
                                            @if(isset($company->swiftcode)) {{$company->swiftcode}} @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="cardimage">{{__('Systems/SystemFive/companies.cardimage')}}</label><br/>
                                        @if(isset($company->cardimage))
                                            <img style="width:300px;" alt="cardimage" src="{{asset($company->cardimage)}}"/>
                                        @endif
                                    </div>
                                </div>

            </div>

            <p id="locale" style="display: none;"><?php echo app()->getLocale()?></p>


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
