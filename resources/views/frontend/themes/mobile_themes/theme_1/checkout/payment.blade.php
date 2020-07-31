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
            <input type="hidden" id="payment" name="payment" value="cash">
            <div class="secondary-title">
                <a class="back-arrow"><img
                        src="{{asset('assets/site/mobileView/assets/img/left-long-arrow.svg')}}" alt=""></a>
                <h3>{{__('general.checkout')}}</h3>
            </div>

            <ul class="checkout-step">
                <li class="active">{{__('general.PERSONAL_INFO')}}</li>
                <li class="active">{{__('general.PAYMENT')}}</li>
                <li>{{__('general.CONFIRMATION')}}</li>
            </ul>


            <div class="step-content-wrap">
                <div class="pole-flex">
                    <h4 class="tertiary-title">{{__('general.Payment_Method')}}</h4>
                </div>

                <ul class="payment-method-selection">
                    <li id="cash" class="active" onclick="return show('bank_accounts','none','cash','bank');"><a
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="22" viewBox="0 0 38 22">
                                <g id="Group_665" data-name="Group 665" transform="translate(-30 -12)">
                                    <rect id="Rectangle" width="36" height="20" rx="1" stroke-width="2" fill="#fff"
                                          stroke="#6e768a" stroke-miterlimit="10" transform="translate(31 13)"/>
                                    <path id="Path"
                                          d="M6,2.5A2.784,2.784,0,0,1,3,5V17a2.784,2.784,0,0,1,3,2.5A2.784,2.784,0,0,1,3,22,3.228,3.228,0,0,1,.6,21H0V1H.6A3.228,3.228,0,0,1,3,0,2.784,2.784,0,0,1,6,2.5Z"
                                          transform="translate(31 12)" fill="#6e768a"/>
                                    <path id="Path-2" data-name="Path"
                                          d="M3,5A2.784,2.784,0,0,1,0,2.5,2.784,2.784,0,0,1,3,0,3.228,3.228,0,0,1,5.4,1H6V21H5.4A3.228,3.228,0,0,1,3,22a2.784,2.784,0,0,1-3-2.5A2.784,2.784,0,0,1,3,17Z"
                                          transform="translate(61 12)" fill="#6e768a"/>
                                    <circle id="Oval" cx="6" cy="6" r="6" transform="translate(43 17)"
                                            fill="#6e768a"/>
                                    <path id="Path-3" data-name="Path"
                                          d="M2.283,3.292c-.946-.246-1.25-.5-1.25-.9,0-.454.421-.771,1.125-.771.742,0,1.017.354,1.042.875h.921A1.66,1.66,0,0,0,2.783.913V0H1.533V.9A1.626,1.626,0,0,0,.075,2.4c0,.963.8,1.442,1.958,1.721,1.042.25,1.25.617,1.25,1,0,.288-.2.746-1.125.746C1.3,5.875.962,5.492.917,5H0A1.746,1.746,0,0,0,1.533,6.6v.9h1.25V6.6C3.6,6.45,4.242,5.979,4.242,5.125,4.242,3.942,3.229,3.537,2.283,3.292Z"
                                          transform="translate(46.875 19.25)" fill="#fff"/>
                                </g>
                            </svg>
                            <span>{{__('general.cash')}}</span>
                        </a>
                    </li>
                    <li id="bank" onclick="return show('bank_accounts','block','bank','cash');">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="71.802" height="22.438"
                                 viewBox="0 0 71.802 22.438">
                                <path id="Icon_payment-bank-transfer" data-name="Icon payment-bank-transfer"
                                      d="M8.6,42.524H6.371l1.854-7.19H5.656l.4-1.541h7.375l-.4,1.541H10.453L8.6,42.525Zm7.625-3.35-.87,3.35H13.126l2.255-8.731H18a4.537,4.537,0,0,1,2.6.609,2.045,2.045,0,0,1,.869,1.785,2.354,2.354,0,0,1-.606,1.622,3.621,3.621,0,0,1-1.746,1.005l1.905,3.709H18.6l-1.511-3.35h-.868Zm.386-1.505h.57a2.762,2.762,0,0,0,1.49-.34,1.148,1.148,0,0,0,.533-1.039.838.838,0,0,0-.347-.734,1.916,1.916,0,0,0-1.091-.245h-.54l-.614,2.359Zm11.756,2.777H24.911l-1.256,2.078H21.319l5.592-8.767h2.724l1.072,8.767H28.54l-.176-2.078Zm-.109-1.552-.188-2.09q-.072-.753-.074-1.511v-.215a15.162,15.162,0,0,1-.8,1.516l-1.372,2.3h2.43Zm12.829,3.63h-2.5l-2.6-6.6h-.045l-.03.191q-.234,1.29-.481,2.3l-1.059,4.109H32.366l2.255-8.731h2.606l2.483,6.432h.03c.058-.3.153-.734.285-1.3s.57-2.273,1.314-5.136h2l-2.256,8.73Zm9.464-2.58a2.261,2.261,0,0,1-1.081,1.974,5.189,5.189,0,0,1-2.928.725,5.42,5.42,0,0,1-2.6-.538V40.47a6.322,6.322,0,0,0,2.613.645,2.666,2.666,0,0,0,1.278-.254.771.771,0,0,0,.46-.695.979.979,0,0,0-.1-.451,1.289,1.289,0,0,0-.28-.361,7.854,7.854,0,0,0-.906-.61,4.49,4.49,0,0,1-1.417-1.17,2.116,2.116,0,0,1-.409-1.248,2.24,2.24,0,0,1,.453-1.377,2.927,2.927,0,0,1,1.288-.943,5.125,5.125,0,0,1,1.924-.337,6.987,6.987,0,0,1,2.9.591l-.8,1.392a5.859,5.859,0,0,0-2.1-.442,1.7,1.7,0,0,0-.993.269.825.825,0,0,0-.388.71.925.925,0,0,0,.241.636,4.3,4.3,0,0,0,1.081.72A4.05,4.05,0,0,1,50.108,38.6a2.141,2.141,0,0,1,.44,1.345Zm4,2.58H52.324l2.255-8.731h5.943l-.394,1.517H56.42l-.577,2.252H59.3l-.409,1.511H55.434l-.883,3.452Zm12.048,0H60.634l2.255-8.731h5.972l-.394,1.517H64.73l-.49,1.917h3.483l-.4,1.516H63.839L63.254,41h3.738L66.6,42.524Zm5.61-3.35-.87,3.35H69.112l2.255-8.731h2.622a4.537,4.537,0,0,1,2.6.609,2.043,2.043,0,0,1,.869,1.785,2.354,2.354,0,0,1-.606,1.622,3.621,3.621,0,0,1-1.746,1.005l1.905,3.709H74.587l-1.511-3.35h-.868Zm.386-1.505h.57a2.762,2.762,0,0,0,1.49-.34,1.148,1.148,0,0,0,.533-1.039.838.838,0,0,0-.347-.734,1.916,1.916,0,0,0-1.091-.245h-.54l-.614,2.359ZM38.852,20.243a5.127,5.127,0,0,1,2.53.5,1.618,1.618,0,0,1,.855,1.488,2.034,2.034,0,0,1-.607,1.514,3.179,3.179,0,0,1-1.726.792v.037a2.3,2.3,0,0,1,1.166.591,1.483,1.483,0,0,1,.434,1.1,2.453,2.453,0,0,1-1.118,2.159,5.46,5.46,0,0,1-3.094.758H33.479l2.259-8.938h3.114ZM36.1,27.616h1.316a2.241,2.241,0,0,0,1.342-.355,1.148,1.148,0,0,0,.486-.984q0-.991-1.338-.991H36.7l-.6,2.329Zm.973-3.833h1.089a2.4,2.4,0,0,0,1.327-.3.964.964,0,0,0,.442-.853q0-.837-1.243-.838H37.58l-.5,1.988Zm11.831,3.271H45.449l-1.257,2.128h-2.34l5.6-8.975h2.728l1.074,8.975H49.082l-.175-2.128Zm-.109-1.59-.189-2.14q-.074-.8-.074-1.546v-.22a15.424,15.424,0,0,1-.8,1.552l-1.375,2.354H48.8Zm12.848,3.718h-2.5l-2.6-6.762H56.5l-.03.2q-.234,1.321-.482,2.36l-1.06,4.207h-2.01l2.259-8.938h2.61l2.486,6.584h.03c.058-.309.154-.751.285-1.327s.57-2.327,1.316-5.258h2l-2.26,8.938Zm10.9,0H70.077l-1.542-3.62-.915.428-.8,3.192H64.6l2.259-8.938h2.238l-1.111,4.292,1.155-1.254,2.99-3.038h2.64l-4.343,4.279,2.128,4.659ZM28.991,21.1a.9.9,0,0,0-.9-.9H8.348a.9.9,0,0,0,0,1.8H28.094A.9.9,0,0,0,28.991,21.1Zm-5.385,3.59a.9.9,0,0,0-.9-.9H8.348a.9.9,0,1,0,0,1.8h14.36A.9.9,0,0,0,23.606,24.693Zm-5.385,3.59a.9.9,0,0,0-.9-.9H8.348a.9.9,0,1,0,0,1.8h8.975A.9.9,0,0,0,18.221,28.284Z"
                                      transform="translate(-5.656 -20.206)" fill="#6e768a"/>
                            </svg>

                            <span>{{__('general.Bank_Transfer')}}</span></a></li>
                </ul>
                <div class="content-under-payment-method" id="bank_accounts" style="display: none">
                    <div class="tertiary-wrap">
                        <h4 class="tertiary-title">{{__('general.select_your_bank')}}</h4>

                        <form action="">

                            <div class="bank-selection">
                                <select name="bank" id="banks" class="select-sl">
                                    <option value="">{{__('general.select_your_bank')}}</option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{ app()->getLocale() == "ar" ? $bank->ar_name : $bank->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="credit-card-details box-shadow">
                                <div class="input-inside style-3">
                                    <label for="">{{__('general.Bank_Account_Name')}}</label>
                                    <input type="text" class="bank_name">
                                </div>
                                <div class="input-inside style-3">
                                    <label for="">{{__('general.account_number')}}</label>
                                    <input type="text" class="account_number">
                                </div>
                                <div class="input-inside style-3">
                                    <label for="">{{__('general.account_iban')}}</label>
                                    <input type="text" class="account_iban">
                                </div>
                            </div>
                        </form>
                    </div> <!-- ./tertiary-wrap -->


                </div>
                <div class="content-under-payment-method">
                    <h4 class="tertiary-title">{{__('general.Detail')}}</h4>
                    <?php $total = 0 ?>
                    @if(session('cart'))
                        @foreach(session('cart') as $SessionId => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
                    @endif
                    <div class="twin-table">
                        <div class="tw-table-row">
                            <span>{{__('general.subtotal')}}</span>
                            <span>{{$total}} ريال </span>
                        </div>
                        <div class="tw-table-row">
                            <span>{{__('general.delivery')}}</span>
                            <span>
                                 @if(session('checkout'))
                                    @foreach(session('checkout') as $item)
                                        {{$item['delivery_fee']}} ريال
                                    @endforeach
                                @endif
                            </span>
                        </div>
                        <div class="tw-table-row">
                            <span>{{__('general.VAT_TAX')}}</span>
                            <span>{{$tax->_value}} % </span>
                        </div>
                        <div class="tw-table-row total-rw">
                            <span>{{__('general.Total')}}</span>
                            <span>{{(($item['delivery_fee'] + $total) / 100) * ($tax->_value) + ($item['delivery_fee'] + $total)  }} ريال </span>
                        </div>
                    </div> <!-- ./twin-table -->
                </div>
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
        function show(shown, style, active, deactive) {
            document.getElementById(shown).style.display = style;
            document.getElementById(shown).style.display = style;
            document.getElementById(active).classList.add("active");
            document.getElementById(deactive).classList.remove("active");
            document.getElementById('payment').setAttribute('value', active);
            return false;
        }

        $(document).ready(function () {

            var bank = function () {
                $('#banks').on("change", function () {
                    var id = $(this).val();
                    $.ajax({
                        method: "post",
                        url: "{{route('getBankInfo')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: {
                            id: id,
                        },
                        async: true,
                        success: function (data) {
                            if (data.errors) {

                            } else {

                                $('.bank_name').val(@if(app()->getLocale() == "ar") data.bank.ar_name @else data.bank.name @endif);
                                $('.account_number').val(data.bank.acc_number);
                                $('.account_iban').val(data.bank.iban);


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
                        url: "{{route('checkoutSelectPayment')}}",

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
                                window.location = "{{route('confirmation')}}"
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
           bank();
        });
    </script>
@endsection
