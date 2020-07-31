@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('general.address')}}
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
                <a href="{{route('user.address.create')}}">
                <span class="cart-blk"><img src="{{asset('assets/site/mobileView/assets/img/round-plus.svg')}}" alt=""></span>
                </a>
                <h1>{{__('general.addresses')}}</h1>
            </div>

            <div class="addr-edit-scroll-wrap">
                @foreach($addresses as $address)
                    <div class="single-addr-wrap box-shadow">
                        <h5>{{__('general.Detailed_Address')}}</h5>
                        <p>{{$address->phone}} <br>{{$address->country .' / '.$address->state .' / '.$address->city .' / '.$address->neighborhood}}</p>
                        <div class="adr-edit-rw">
                            <a href="#"><img src="{{asset('assets/site/mobileView/assets/img/green-ok.svg')}}" alt=""></a>
                            <a href="#" class="edit-btn">{{__('general.edit')}}</a>
                        </div>
                    </div> <!-- ./sigle-addr-wrap -->
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
