@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('frontend/mobileViews/theme_1.profile')}}
@endsection
@section('style')

@endsection
@section('head_title')
    {{__('frontend/mobileViews/theme_1.profile')}}
@endsection
@section('content')
    <div class="app-main-wrp flex-height">
        <div class="top-zone-wrap">
            <div class="action-btn-blk">
                @if(!Auth::check())
                    <a href="{{route('user.login')}}"><span>{{__('frontend/mobileViews/theme_1.login')}}</span></a>
                    <a href="{{route('register')}}"><span>{{__('frontend/mobileViews/theme_1.sign_up')}}</span></a>
                @endif
            </div>
            <div class="st-info-blk-ex-action">

            </div>
            <div class="st-info-blk">
                @if(Auth::check())
                    <a href="{{route('user.account')}}" class="mb-2"><span>{{__('general.my_account')}}</span></a>
                    <a href="{{route('user.addresses')}}" class="mb-2"><span>{{__('general.addresses')}}</span></a>
                    <a href="{{route('user.orders')}}" class="mb-2"><span>{{__('general.orders')}}</span></a>
                @endif
                <h4>{{__('frontend/mobileViews/theme_1.settings')}}</h4>
                @if(app()->getLocale() == "en")
                    <a href="{{ url('locale/ar') }}" class="lan"><span>العربية</span> {{__('frontend/mobileViews/theme_1.language')}} </a>
                @else
                    <a href="{{ url('locale/en') }}" class="lan">{{__('frontend/mobileViews/theme_1.language')}} <span>English</span></a>
                @endif
            </div>
            <div class="st-info-blk-ex-action">
                <h4>{{__('general.reachOutToUs')}}</h4>
                <a href="{{$WhatsApp->_value}}" class="lan"><span><img src="{{asset('assets/site/mobileView/assets/img/whats-app.svg')}}"alt=""></span>{{__('general.whatsApp')}} <i class="fal @if(app()->getLocale() == "en") fa-angle-right @else fa-angle-left @endif"></i></a>
                <a href="{{$WhatsApp->_value}}" class="lan"><span><img src="{{asset('assets/site/mobileView/assets/img/email.png')}}" alt=""></span>{{__('general.emailUs')}} <i class="fal @if(app()->getLocale() == "en") fa-angle-right @else fa-angle-left @endif"></i></a>
                <a href="{{route('help')}}" class="lan"><span><img src="{{asset('assets/site/mobileView/assets/img/qs.svg')}}" alt=""></span>{{__('general.help')}} <i class="fal @if(app()->getLocale() == "en") fa-angle-right @else fa-angle-left @endif"></i></a>

            </div>
            @if(Auth::check())
            <div class="st-info-blk">
                <a href="{{ route('logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold btn-signout " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('general.logout')}}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endif
            <ul class="social-lnks">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><img src="{{asset('assets/site/mobileView/assets/img/youtube.svg')}}" alt=""></a></li>
            </ul>


            <div class="copyright-text">
                <p>{{__('general.copyRights')}}</p>
            </div>
        </div>
        <div class="bottom-action-menu type-2">
            <div class="bottom-action-menu-inner">
                <ul>
                    @if(app()->getLocale() == "en")
                        <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico-active.jpg')}}" alt="">Profile</a></li>
                        <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                        <li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
                        <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}" alt=""></a></li>
                    @else
                        <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}" alt=""></a></li>
                        <li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
                        <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                        <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico-active.jpg')}}" alt="">حسابي</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
