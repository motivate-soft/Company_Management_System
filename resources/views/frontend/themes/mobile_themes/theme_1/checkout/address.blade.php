@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('frontend/mobileViews/theme_1.cart')}}
@endsection
@section('style')

    .nice-number button {
    display: none;

    }

    .nice-number input {
    width: 100% !important;
    }

    .nice-number {
    margin-left: 20px;
    position: relative;
    /* display: inline; */
    width: 100%;
    }

    .nice-number input {
    text-align: right;
    letter-spacing: 5px;
    }
@endsection
@section('css')
    <link href="{{asset('assets/site/mobileView/assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('head_title')
    {{__('frontend/mobileViews/theme_1.your_cart')}}
@endsection
@section('content')
    <form id="delivery_to">
        <div class="app-main-wrp type-2">
            @CSRF
            <input type="hidden" id="type" name="type" value="{{count($addresses) > 0 ? 'choose' : 'add_address'}}">
            <div class="secondary-title">
                <a onclick="return show('addressesList','addNewAddress', 'choose');" class="back-arrow"><img
                        src="{{asset('assets/site/mobileView/assets/img/left-long-arrow.svg')}}" alt=""></a>
                <h3>{{__('general.checkout')}}</h3>
            </div>

            <ul class="checkout-step">
                <li class="active">{{__('general.PERSONAL_INFO')}}</li>
                <li>{{__('general.PAYMENT')}}</li>
                <li>{{__('general.CONFIRMATION')}}</li>
            </ul>
            <div class="viewport-wrap type-2"
                 id="addressesList" {{count($addresses) > 0 ? 'style=display:block' : 'style=display:none'}}>
                <div class="top-zone" class="list">

                    <div class="step-content-wrap">
                        <div class="pole-flex">
                            <h4 class="tertiary-title">{{__('general.Deliver_To')}}</h4>
                            <a href="#" onclick="return show('addNewAddress','addressesList','add_address');">
                                {{__('general.add_new')}}</a>

                        </div>

                        <ul class="address-list">
                            @foreach($addresses as $address)
                                <li>
                                    <label class="radioBtn used-for-address">{{$address->country .', '. $address->state .', '. $address->city .', '.$address->neighborhood}} <br> {{$address->address}} <br> {{$address->first_name .' '. $address->last_name}}
                                     |   {{$address->phone}}
                                        <input type="radio" name="address_id" value="{{$address->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div> <!-- ./top-zone -->

            </div> <!-- ./viewport-wrap -->

            <div class="viewport-wrap type-2">
                <div class="top-zone" class="tabcontent"
                     id="addNewAddress" {{count($addresses) == 0 ? 'style=display:block' : 'style=display:none'}}>

                    <div class="step-content-wrap">
                        <h4 class="tertiary-title">{{__('general.Deliver_To')}}</h4>

                        <div class="address-box box-shadow">


                            <div class="twin-input-g-wrap-three">
                                <div class="input-inside style-2 with-select">
                                    <select name="country" id="country" class="select-sl">
                                        <option selected disabled>{{__('general.country')}}</option>
                                        @foreach($countries as $country)
                                            <option data-id="{{$country->id}}"
                                                    value="{{app()->getLocale() == "ar" ? $country->ar_name : $country->sortname}}">
                                                {{app()->getLocale() == "ar" ? $country->ar_name : $country->sortname}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="twin-input-g-wrap-three">
                                <div class="input-inside style-2 with-select">
                                    <select name="state" id="state" class="select-sl">
                                        <option selected disabled>{{__('general.state')}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="twin-input-g-wrap-three">
                                <div class="input-inside style-2 with-select">
                                    <select name="city" id="city" class="select-sl">
                                        <option selected disabled>{{__('general.city')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="twin-input-g-wrap-three">
                                <div class="input-inside style-2 with-select">
                                    <select name="neighborhood" id="neighborhood" class="select-sl">
                                        <option selected disabled>{{__('general.neighborhood')}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="input-inside style-2">
                                <span class="required-text">* Required</span>
                                <input type="text" name="address" placeholder="{{__('general.Detailed_Address')}}">
                            </div>
                        </div> <!-- ./address-box -->
                        <div class="address-box box-shadow">
                            <div class="input-inside style-2">
                                <span class="required-text">* Required</span>
                                <input type="text" name="first_name" placeholder="{{__('general.First_Name')}}">
                            </div>

                            <div class="input-inside style-2">
                                <span class="required-text">* Required</span>
                                <input type="text" name="last_name" placeholder="{{__('general.last_Name')}}">
                            </div>
                            <div class="twin-input-g-wrap two">
                                <div class="input-inside style-2">
                                    <span class="like-input">966</span>
                                </div>
                                <div class="input-inside style-2">
                                    <input type="number" name="phone" maxlength="9" placeholder="555555555">
                                </div>
                            </div>
                        </div> <!-- ./address-box -->
                    </div>
                </div> <!-- ./top-zone -->

            </div>
            <div class="bottom-zone type-2">
                <button type="button" class="continue-btn">{{__('general.Continue')}}</button>
            </div> <!-- ./bottom-zone -->
        </div>
    </form>

@endsection
@section('script')
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
    <script>
        function show(shown, hidden, type) {
            document.getElementById(shown).style.display = 'block';
            document.getElementById(hidden).style.display = 'none';
            document.getElementById('type').setAttribute('value', type);
            return false;
        }

        $(document).ready(function () {

            var states = function () {
                $('#country').on("change", function () {
                    var id = $(this).find(':selected').attr('data-id');
                    $.ajax({
                        method: "post",
                        url: "{{route('getStates')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: {
                            id: id,
                        },
                        async: true,
                        success: function (data) {
                            if (data.errors) {
                                $('#state option').remove();
                                $('#state').append(`
                               <option selected disabled>{{__('general.state')}}</option>
                                `);
                            } else {
                                console.log(data.states);
                                $('#state option').remove();
                                $('#state').append(`
                                 <option selected disabled>{{__('general.state')}}</option>
                                `);
                                jQuery.each(data.states, function (key, value) {

                                    $('#state').append(`
                                <option  value="` + value['id'] + `">` + value['ar_name'] + `</option>
                                `);
                                    $('#state').niceSelect('update');
                                });
                            }

                        },
                        error: function () {
                            alert("Error!,Please try again");
                        }
                    });

                });
            };
            var city = function () {
                $('#state').on("change", function () {
                    var id = $(this).val();
                    $.ajax({
                        method: "post",
                        url: "{{route('getCities')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: {
                            id: id,
                        },
                        async: true,
                        success: function (data) {
                            if (data.errors) {
                                $('#city option').remove();
                                $('#city').append(`
                               <option selected disabled>{{__('general.city')}}</option>
                                `);
                            } else {
                                console.log(data.cities);
                                $('#city option').remove();
                                $('#city').append(`
                                 <option selected disabled>{{__('general.city')}}</option>
                                `);
                                jQuery.each(data.cities, function (key, value) {

                                    $('#city').append(`
                                <option  value="` + value['id'] + `">` + value['ar_name'] + `</option>
                                `);
                                    $('#city').niceSelect('update');
                                });
                            }

                        },
                        error: function () {
                            alert("Error!,Please try again");
                        }
                    });

                });
            };
            var neighborhood = function () {
                $('#city').on("change", function () {
                    var id = $(this).val();
                    $.ajax({
                        method: "post",
                        url: "{{route('getNeighborhoods')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: {
                            id: id,
                        },
                        async: true,
                        success: function (data) {
                            if (data.errors) {
                                $('#neighborhood option').remove();
                                $('#neighborhood').append(`
                               <option selected disabled>{{__('general.neighborhood')}}</option>
                                `);
                            } else {
                                console.log(data.neighborhoods);
                                $('#neighborhood option').remove();
                                $('#neighborhood').append(`
                                 <option selected disabled>{{__('general.neighborhood')}}</option>
                                `);
                                jQuery.each(data.neighborhoods, function (key, value) {

                                    $('#neighborhood').append(`
                                <option  value="` + value['id'] + `">` + value['ar_name'] + `</option>
                                `);
                                    $('#neighborhood').niceSelect('update');
                                });
                            }

                        },
                        error: function () {
                            alert("Error!,Please try again");
                        }
                    });

                });
            };

            var save = function () {
                $('.continue-btn').on("click", function () {
                    $.ajax({
                        method: "post",
                        beforeSend: function () {
                            $(".loadingMask").css('display', 'inline-block');
                        },
                        url: "{{route('checkoutSelectAddress')}}",

                        data:
                            new FormData($("#delivery_to")[0])
                        ,
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        async: true,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            //  wait.resolve();
                            $(".loadingMask").css('display', 'none');
                            if (data.errors) {
                                swal(
                                    '{{__('general.error')}}!',
                                    '{{__('general.please_try_again')}}!',
                                    'error'
                                )
                            } else {
                                 window.location = "{{route('checkoutPayment')}}"
                            }
                        },
                        error: function () {
                            swal(
                                '{{__('general.error')}}!',
                                '{{__('general.please_try_again')}}!',
                                'error'
                            )
                        }
                    });


                });
            };

            save();
            states();
            city();
            neighborhood();
        });
    </script>
@endsection
