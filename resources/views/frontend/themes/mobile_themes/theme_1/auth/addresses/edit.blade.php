@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('general.address')}}
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
    {{__('general.address')}}
@endsection
@section('content')
    <form id="delivery_to">
        <div class="app-main-wrp type-2">
            @CSRF
            <div class="viewport-wrap type-2">
                <div class="top-zone tabcontent" id="addNewAddress">

                    <div class="step-content-wrap">
                        <h4 class="tertiary-title">{{__('general.address')}}</h4>
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

                        url: "{{route('user.address.store')}}",

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

                            if (data.errors) {
                                swal(
                                    '{{__('general.error')}}!',
                                    '{{__('general.please_try_again')}}!',
                                    'error'
                                )
                            } else {
                                window.location = "{{route('user.addresses')}}"
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
