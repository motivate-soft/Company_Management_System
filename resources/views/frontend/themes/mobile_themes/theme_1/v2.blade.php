
@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('frontend/mobileViews/theme_1.home')}}
@endsection
@section('style')

@endsection
@section('head_title')
    {{__('frontend/mobileViews/theme_1.home')}}
@endsection
@section('content')

    <div class="product-slider-wrp owl-carousel">
        @foreach($sliders as $slider)
            <div class="product-sigle-slider">
                    @if(app()->getLocale() == "ar")
                        <div class="product-sigle-slider-inner" style="background-image: url({{asset('uploads/sliders/'.$slider->image_ar)}});">
                    @else
                        <div class="product-sigle-slider-inner" style="background-image: url({{asset('uploads/sliders/'.$slider->image_en)}});">
                    @endif
                    <div class="pr-content">
                        <!--<h3>All Chair Discount <br> Up To</h3>-->
                        <!--<h2>50%</h2>-->
                    </div>
                    <div class="prodcut-img">
                    <!--<img src="{{asset('assets/site/mobileView/assets/img/pro-1.png')}}" alt="">-->
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container app-main-wrp">
        <div class="row">
            @foreach($products as $product)
                @php
                $images = explode(',', $product->image);
                @endphp
                <div class="col-6 grid-style">
                    <div class="protthum-img">
                        <a href="{{route('product',$product->id)}}"><img
                                src="{{asset('uploads/product_images/'.$images[0])}}" alt="{{$product->name}}"></a>
                    </div>
                    @if(app()->getLocale() == "en")
                        <a href="{{route('product',$product->id)}}"><p>{{$product->name}}</p></a>
                    @else
                        <a href="{{route('product',$product->id)}}"><p>{{$product->name_ar}}</p></a>
                    @endif
                    <a href="{{route('product',$product->id)}}"><h3>{{$product->price}} ريال</h3></a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="bottom-action-menu">
        <div class="bottom-action-menu-inner">
            <ul>
                @if(app()->getLocale() == "en")
                    <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/profiles-ico.jpg')}}" alt=""></a></li>
                    <!--<li><a href=""><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                    <li><a href=""><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/cart.png')}}" alt=""></a></li>
                    <li><a href="{{ url('/') }}"><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/home-active.png')}}" alt="">Home</a></li>
                @else
                    <li><a href="{{ url('/') }}"><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/home-active.png')}}" alt="">الرئيسية</a></li>
                    <li><a href=""><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/cart.png')}}" alt=""></a></li>
                    <!--<li><a href=""><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                    <li lass="profile-blk"><a href="{{route('profile.index')}}"><img src="{{asset('assets/frontend/mobile_themes/theme_1/img/profiles-ico.jpg')}}" alt=""></a></li>
                @endif            
            </ul>
        </div>
    </div>


@endsection
