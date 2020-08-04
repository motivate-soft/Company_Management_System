<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/meanmenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/default.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/time-picker.css')}}" rel="stylesheet">
    
    
    @if(app()->getLocale() == "en")
        <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/responsive.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/style-rtl.css')}}" rel="stylesheet">
        <link href="{{asset('assets/frontend/mobile_themes/theme_1/css/responsive-rtl.css')}}" rel="stylesheet">
    @endif
    <style>
        @yield('style')
    </style>
        @yield('css')
</head>

<body>


<div class="app-main-wrp">
    <div class="app-main-top-info cart-icon">
        <span class="cart-blk ">
            <a href="{{route('carts.index')}}">
                <img src="{{asset('assets/frontend/mobile_themes/theme_1/img/cart-icon.svg')}}" alt="">
            </a>
        </span>
        <h1>@yield('head_title')</h1>
    </div>

    @yield('content')



</div>




<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/Popper.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/jquery.meanmenu.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/jquery.nice-number.js')}}"></script>
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
<script>
    $('.select-sl').niceSelect();
</script>
<script src="{{asset('assets/frontend/mobile_themes/theme_1/js/main-rtl.js')}}"></script>

<script>
    var $htmlOrBody = $('html, body'), // scrollTop works on <body> for some browsers, <html> for others
        scrollTopPadding = 8;
    
    $('input').focus(function() {
        // get input tag's offset top position
        var textareaTop = $(this).offset().top;
        // scroll to the textarea
        $htmlOrBody.scrollTop(textareaTop - scrollTopPadding);
    
        // OR  To add animation for smooth scrolling, use this. 
        //$htmlOrBody.animate({ scrollTop: textareaTop - scrollTopPadding }, 200);
    
    });
</script>

@yield('script')

</body>

</html>
