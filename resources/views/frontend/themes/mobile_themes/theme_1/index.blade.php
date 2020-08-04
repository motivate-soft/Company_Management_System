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
        <div class="product-sigle-slider">
            <div class="product-sigle-slider-inner"
                 style="background-image: url({{asset('assets/site/mobileView/assets/img/pr-bg.png')}});">
                <div class="pr-content">
                    <h3>All Chair Discount <br> Up To</h3>
                    <h2>50%</h2>
                </div>
                <div class="prodcut-img">
                    <img src="{{asset('assets/site/mobileView/assets/img/pro-1.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="product-sigle-slider">
            <div class="product-sigle-slider-inner"
                 style="background-image: url({{asset('assets/site/mobileView/assets/img/pr-bg.png')}});">
                <div class="pr-content">
                    <h3>All Chair Discount <br> Up To</h3>
                    <h2>50%</h2>
                </div>
                <div class="prodcut-img">
                    <img src="{{asset('assets/site/mobileView/assets/img/pro-1.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="product-sigle-slider">
            <div class="product-sigle-slider-inner"
                 style="background-image: url({{asset('assets/site/mobileView/assets/img/pr-bg.png')}});">
                <div class="pr-content">
                    <h3>All Chair Discount <br> Up To</h3>
                    <h2>50%</h2>
                </div>
                <div class="prodcut-img">
                    <img src="{{asset('assets/site/mobileView/assets/img/pro-1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="category-blk">
        <div class="section-title">
            <h2>{{__('frontend/mobileViews/theme_1.BestSellers')}}</h2>

        </div>
        <div class="category-all-wrp">
            @foreach($products as $product)
                <div class="product-single-blk">
                    @if(app()->getLocale() == "en")}
                    <div class="protthum-img">
                        <a href="{{route('product',$product->id)}}"><img src="{{asset('uploads/product_images/'.$product->image)}}" alt="{{$product->name}}"></a>
                    </div>
                    <h3>{{$product->name_ar}}</h3>
                    <p>
                        <a href="{{route('product',$product->id)}}">{{$product->price}} ريال</a>
                    </p>
                    @else
                    <div class="protthum-img">
                        <a href="{{route('product',$product->id)}}"><img src="{{asset('uploads/product_images/'.$product->image)}}" alt="{{$product->name_ar}}"></a>
                    </div>
                    <h3>{{$product->name_ar}}</h3>
                    <p>
                        <a href="{{route('product',$product->id)}}">{{$product->price}} ريال</a>
                    </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="category-blk">
        <div class="section-title">
            <h2>{{__('frontend/mobileViews/theme_1.New_Arrived')}}</h2>

        </div>
        <div class="category-all-wrp">
            @foreach($products as $product)
                <div class="product-single-blk">
                    <div class="protthum-img">
                        <a href="{{route('product',$product->id)}}"><img src="{{asset('uploads/product_images/'.$product->image)}}" alt="{{$product->name_ar}}"></a>
                    </div>
                    <h3>{{$product->name_ar}}</h3>
                    <p>
                        <a href="{{route('product',$product->id)}}">{{$product->price}} ريال</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="bottom-action-menu">
        <div class="bottom-action-menu-inner">
            <ul>
                <li class="profile-blk"><a><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-1.svg')}}" alt="">{{__('frontend/mobileViews/theme_1.home')}}</a></li>
                <li><a href="{{route('carts.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
            <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                <li ><a href="{{route('profile.index')}}"><img src="{{asset('assets/site/mobileView/assets/img/profiles-ico.jpg')}}" alt=""></a></li>
            </ul>
        </div>
    </div>
    {{--    <div class="category-blk">--}}
    {{--        <div class="section-title">--}}
    {{--            <h2>Best Rating</h2>--}}

    {{--        </div>--}}
    {{--        <div class="category-all-wrp">--}}
    {{--            <div class="product-single-blk">--}}
    {{--                <div class="protthum-img">--}}
    {{--                    <img src="{{asset('assets/site/mobileView/assets/img/thum-1.jpg')}}" alt="">--}}
    {{--                </div>--}}
    {{--                <h3>$ 70.00</h3>--}}
    {{--                <p>Classic gilding table--}}
    {{--                    lamp</p>--}}
    {{--            </div>--}}
    {{--            <div class="product-single-blk">--}}
    {{--                <div class="protthum-img">--}}
    {{--                    <img src="{{asset('assets/site/mobileView/assets/img/thum-1.jpg')}}" alt="">--}}
    {{--                </div>--}}
    {{--                <h3>$ 70.00</h3>--}}
    {{--                <p>Classic gilding table--}}
    {{--                    lamp</p>--}}
    {{--            </div>--}}
    {{--            <div class="product-single-blk">--}}
    {{--                <div class="protthum-img">--}}
    {{--                    <img src="{{asset('assets/site/mobileView/assets/img/thum-1.jpg')}}" alt="">--}}
    {{--                </div>--}}
    {{--                <h3>$ 70.00</h3>--}}
    {{--                <p>Classic gilding table--}}
    {{--                    lamp</p>--}}
    {{--            </div>--}}
    {{--            <div class="product-single-blk">--}}
    {{--                <div class="protthum-img">--}}
    {{--                    <img src="{{asset('assets/site/mobileView/assets/img/thum-1.jpg')}}" alt="">--}}
    {{--                </div>--}}
    {{--                <h3>$ 70.00</h3>--}}
    {{--                <p>Classic gilding table--}}
    {{--                    lamp</p>--}}
    {{--            </div>--}}
    {{--            <div class="product-single-blk">--}}
    {{--                <div class="protthum-img">--}}
    {{--                    <img src="{{asset('assets/site/mobileView/assets/img/thum-1.jpg')}}" alt="">--}}
    {{--                </div>--}}
    {{--                <h3>$ 70.00</h3>--}}
    {{--                <p>Classic gilding table--}}
    {{--                    lamp</p>--}}
    {{--            </div>--}}
    {{--            <div class="product-single-blk">--}}
    {{--                <div class="protthum-img">--}}
    {{--                    <img src="{{asset('assets/site/mobileView/assets/img/thum-1.jpg')}}" alt="">--}}
    {{--                </div>--}}
    {{--                <h3>$ 70.00</h3>--}}
    {{--                <p>Classic gilding table--}}
    {{--                    lamp</p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
