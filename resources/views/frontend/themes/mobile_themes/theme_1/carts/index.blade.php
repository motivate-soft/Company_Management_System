@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('frontend/mobileViews/theme_1.cart')}}
@endsection
@section('style')
    .app-main-top-info {
    top: 5px !important;
    }
    .cart-blk {
    display: none;
    }
@endsection
@section('head_title')
    {{__('frontend/mobileViews/theme_1.your_cart')}}
@endsection
@section('content')
    <div class="app-main-wrp type-2">
        <div class="viewport-wrap type-2">
            <div class="top-zone">

                <div class="step-content-wrap">
                    <div class="cart-pd-wrap">
                        <div class="cart-pd-scroll-wrap">
                            <?php $total = 0 ?>

                            @if(session('cart'))
                                @foreach(session('cart') as $SessionId => $details)

                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <div class="order-rw cart-item">
                                        <div class="del-pd">
                                            <span><i class="fal fa-plus"></i></span>
                                            <span><i class="fal fa-minus"></i></span>
                                        </div>
                                        <div class="product-img type-1"><img
                                                src="{{asset('uploads/product_images/'.$details['photo'])}}" alt="">
                                        </div>
                                        <h4>{{$details['name']}} <span>$ {{$details['price']}}</span></h4>
                                        @if($plugin->status == 1)
                                        <h4><span class="cart-meatApplication">الحجم: {{$details['size']}}	  </br>  التقطيع: {{$details['cutting']}}	</br>  التغليف: {{$details['packing']}}	</span></h4>
                                        @endif
                                        <span class="pd-amount">{{ $details['quantity'] }}</span>
                                        <span class="trash-icon " ><i class="far fa-trash-alt remove-from-cart" data-id="{{ $SessionId }}"></i></span>
                                    </div>

                                @endforeach
                            @endif


                        </div> 
                        <!-- ./cart-pd-scroll-wrap -->
                        <!--<div class="total-cart-warp">-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-6 cart-date-time">-->
                        <!--            <img src="{{asset('assets/site/mobileView/assets/img/tram.svg')}}" alt="">-->
                        <!--            <span>تاريخ التوصيل</span>-->
                        <!--        </div>-->
                        <!--        <div class="col-6 cart-date-time">-->
                        <!--            <img src="{{asset('assets/site/mobileView/assets/img/tram.svg')}}" alt="">-->
                        <!--            <span>وقت التوصيل</span>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<input type="text" class="form-control js-time-picker" value="02:56">-->

                        <div class="total-cart-wrap">
                            <div class="tram-rent">
                                <img src="{{asset('assets/site/mobileView/assets/img/tram.svg')}}" alt="">
                                <span>الإجمالي</span>
                            </div>
                            <div class="cart-total-cost">
                                <label for="">{{__('general.Total')}}:</label>
                                <div class="input-inside style-2">
                                    <input type="text" disabled style="background: none; color: #000 !important; font-weight: 500;" placeholder="{{ $total }}">
                                    <span class="input-transparent-icon doller">SAR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- ./top-zone -->
            <div class="bottom-zone type-2">
                <a href="{{route('address')}}" class="continue-btn" style="bottom: 80px !important; position: fixed !important;">{{__('general.checkout')}}</a>
            </div> <!-- ./bottom-zone -->
            <div class="bottom-action-menu type-2">
                <div class="bottom-action-menu-inner">
                    <ul>
                        @if(app()->getLocale() == "en")
                            <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico.jpg')}}" alt=""></a></li>
                            <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                            <li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/cart-active.png')}}" alt="">My Cart</a></li>
                            <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}" alt=""></a></li>
                        @else
                            <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/cart-active.png')}}" alt="">عربتي</a></li>
                            <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                            <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico.jpg')}}" alt=""></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div> <!-- ./viewport-wrap -->
        
    </div>
        
@endsection
@section('script')
    <script>

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ route('carts.remove') }}',
                    method: "post",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
        // new Picker(document.querySelector('.js-time-picker'), {
        //     format: 'HH:mm',
        //     headers: true,
        //     text: {
        //         title: 'Pick a time',
        //     },
        // });
    </script>
@endsection
