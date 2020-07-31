@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('general.help')}}
@endsection
@section('style')

@endsection
@section('head_title')
    {{__('general.help')}}
@endsection
@section('content')
    <div class="app-main-wrp flex-height">
        <div class="top-zone-wrap">
            <div class="details-content-wrp">
                <div class="details-maintexts">
            <p class="text-justify" >هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
        </div>
        </div>
        </div>
        <div class="bottom-action-menu type-2">
            <div class="bottom-action-menu-inner">
                <ul>
                    @if(app()->getLocale() == "en")
                        <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}"
                                                          alt=""></a></li>
                        <li><a href="{{ route('carts.index') }}"><img
                                    src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
                    <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                        <li class="profile-blk"><a href=""><img
                                    src="{{asset('assets/site/mobileView/assets/img/profiles-ico-active.jpg')}}" alt="">Profile</a>
                        </li>
                    @else
                        <li><a href="{{ url('/') }}"><img src="{{asset('assets/site/mobileView/assets/img/home.png')}}"
                                                          alt=""></a></li>
                        <li><a href="{{ route('carts.index') }}"><img
                                    src="{{asset('assets/site/mobileView/assets/img/cart.png')}}" alt=""></a></li>
                    <!--<li><a href=""><img src="{{asset('assets/site/mobileView/assets/img/bottom-ico-3.svg')}}" alt=""></a></li>-->
                        <li class="profile-blk"><a href=""><img
                                    src="{{asset('assets/site/mobileView/assets/img/profiles-ico-active.jpg')}}" alt="">حسابي</a>
                        </li>
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
