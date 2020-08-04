@if((new \Jenssegers\Agent\Agent())->isDesktop())
    @include('frontend.themes.desktop_themes.theme_1.checkout.cart')
@endif


<!--Mobile Theme 1-->
@if((new \Jenssegers\Agent\Agent())->isMobile())
    @include('frontend.themes.mobile_themes.theme_1.carts.index')
@endif