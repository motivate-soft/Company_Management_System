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
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('head_title')
    {{__('frontend/mobileViews/theme_1.your_cart')}}
@endsection
@section('content')
    <!-- Popup after placed order  -->
    <div class="modal fade" id="exampleModalOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog max-327" role="document">
            <div class="modal-content">
                <div class="account-created text-center">
                    <div class="ok"><img src="{{asset('assets/site/mobileView/assets/img/Check.png')}}" alt=""></div>
                    <h4>Order Placed Successfully</h4>
                    <p>The seller has been notified to ship
                        your item and we will only release the
                        payment after you have received it.</p>
                    <a href="{{route('home')}}" class="got-it" >Keep Browsing</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup after placed order  -->
    <form id="delivery_to">
        <div class="app-main-wrp type-2">
            @CSRF
            <input type="hidden" id="payment" name="payment">
            <div class="secondary-title">
                <a class="back-arrow"><img
                        src="{{asset('assets/site/mobileView/assets/img/left-long-arrow.svg')}}" alt=""></a>
                <h3>{{__('general.checkout')}}</h3>
            </div>

            <ul class="checkout-step">
                <li class="active">{{__('general.PERSONAL_INFO')}}</li>
                <li class="active">{{__('general.PAYMENT')}}</li>
                <li class="active">{{__('general.CONFIRMATION')}}</li>
            </ul>


            <div class="step-content-wrap">
                @if(session('checkout'))
                    @foreach(session('checkout') as $item)
                        <div class="change-wrap">
                            <div class="pole-flex">
                                <h4 class="tertiary-title">{{__('general.address')}}</h4>
                            </div>


                            <p>

                                {{$item['country'] .', '.$item['state'] .', '.$item['city'] .', '.$item['neighborhood']}}


                                <br> {{$item['address']}}</p>

                        </div>
                        <div class="change-wrap">
                            <div class="pole-flex">
                                <h4 class="tertiary-title">{{__('general.contact')}}</h4>
                            </div>
                            <p>{{$item['first_name'] .' '. $item['last_name']}}}}, 966{{$item['phone']}}</p>
                        </div>
                    @endforeach
                @endif
                <div class="change-wrap for-summary">
                    <div class="pole-flex">
                        <h4 class="tertiary-title">{{__('general.Order_Summary')}}</h4>
                    </div>

                    <div class="order-summary-wrap">
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="order-rw">
                                    <div class="product-img type-1"><img src="{{asset('uploads/product_images/'.$details['photo'])}}" alt=""></div>
                                    <h4>{{$details['name']}}</h4>
                                    <span class="pd-price">{{$details['price']}} ريال </span>
                                </div>
                            @endforeach
                        @endif
                    </div> <!-- ./order-summary-wrap -->
                    <?php $total = 0 ?>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
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
                        <div class="tw-table-row total place-2">
                            <span>{{__('general.Total')}}</span>
                            <span>{{(($item['delivery_fee'] + $total) / 100) * ($tax->_value) + ($item['delivery_fee'] + $total)  }} ريال </span>
                        </div>

                    </div> <!-- ./twin-table -->

                </div>
            </div>


            <div class="bottom-zone type-2">
                <button type="button" class="continue-btn">{{__('general.place_order')}}</button>
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



            var save = function () {
                $('.continue-btn').on("click", function () {
                    $.ajax({
                        method: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        url: '{{route('orders.store')}}',
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
                                $('#exampleModalOne').modal('show');
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
         });
    </script>
@endsection
