@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('general.orders')}}
@endsection
@section('style')
    .cart-icon {
    display: none;
    }

@endsection

@section('content')

    <div class="app-main-wrp flex-height">
        <div class="top-zone-wrap">
            <div class="app-main-top-info style-3">
                <span class="cart-blk"><img src="{{asset('assets/site/mobileView/assets/img/cart-icon.svg')}}"
                                            alt=""></span>
                <h1>{{__('general.orders')}}</h1>
            </div>

            <ul class="second-tier-menu">
                <li class="active"><a href="#">Ongoing</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Voucher</a></li>
                <li><a href="#">Card Management</a></li>
            </ul>

            <div class="addr-edit-scroll-wrap">

                @foreach($orders as $order)
                    <div class="single-addr-wrap style-2 box-shadow">
                        <div class="pack-wrap" data-toggle="collapse" data-target="#collapseEx1{{$order->id}}" aria-expanded="true"
                             aria-controls="collapseEx1">
                            <div class="pack-left">
                                <img src="{{asset('assets/site/mobileView/assets/img/pack-1.png')}}" alt="">
                                <p>{{__('general.order')}} #{{$order->id}} <span>{{count($order->products)}} {{__('general.items')}}</span></p>
                            </div>
                            <div class="pack-right">
                                <div class="article-span preparing">Preparing</div>
                            </div>
                        </div> <!-- ./pack-wrap -->

                        <div class="pack-expand-outer collapse " id="collapseEx1{{$order->id}}">
                            <div class="pack-expand-wrap">
                                <ul class="delivery-phase-list">
                                    <li class="active">
                                        <div class="delivery-phase">
                                            <span>Receive Order</span>
                                            <span>6 Nov. 2019</span>
                                        </div>
                                    </li>
                                    <li class="active">
                                        <div class="delivery-phase">
                                            <span>Preparing</span>
                                            <span>6 Nov. 2019</span>
                                        </div>
                                    </li>
                                    <li class="active">
                                        <div class="delivery-phase">
                                            <span>Shipping</span>
                                            <span>7 Nov. 2019</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="delivery-phase">
                                            <span>Receive</span>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- ./pack-expand-wrap -->
                        </div>
                    </div> <!-- ./sigle-addr-wrap.style-2 -->
                @endforeach

            </div> <!-- ./addr-edit-scroll-wrap -->
        </div>
        <div class="bottom-action-menu type-2">
            <div class="bottom-action-menu-inner">
                <ul>
                    @if(app()->getLocale() == "en")
                        <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico.jpg')}}" alt=""></a></li>
                        <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                        <li><a href="{{route('carts.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
                        <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}" alt=""></a></li>
                    @else
                        <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}" alt=""></a></li>
                        <li><a href="{{route('carts.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
                        <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                        <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico.jpg')}}" alt=""></a></li>
                    @endif     
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
    <script>
        var $grid = $('.portfolio-active').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: 1
            }
        })
        // filter items on button click
        $('.portfolio-menu').on('click', 'li', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        //for menu active class
        $('.portfolio-menu li').on('click', function (event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
        });

    </script>
@endsection
