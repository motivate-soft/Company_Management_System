	<!-- Basic Page Needs
	================================================== -->
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sports Club, League and News HTML Template">
	<meta name="author" content="Dan Fisher">
	<meta name="keywords" content="sports club news HTML template">

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/favicons/favicon.ico')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/favicons/favicon-120.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/favicons/favicon-152.png')}}">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

	<!-- Google Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Roboto+Condensed:400,400i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet"> 

	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/fonts/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/slick/slick.css')}}" rel="stylesheet">

	<!-- REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/css/settings.css')}}">

	<!-- REVOLUTION LAYERS STYLES -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/css/layers.css')}}">

	<!-- REVOLUTION NAVIGATION STYLES -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/css/navigation.css')}}">

	<!-- REVEAL ADD-ON FILES -->
	<link rel="stylesheet" href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/reveal/css/revolution.addon.revealer.css?ver=1.0.0')}}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/reveal/css/revolution.addon.revealer.preloaders.css?ver=1.0.0')}}" type="text/css" media="all" />

	<!-- TYPEWRITER ADD-ON FILES -->
	<link rel="stylesheet" href="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/typewriter/css/typewriter.css')}}" type="text/css" media="all" />

	<!-- Template CSS-->
	@if(app()->getLocale() != "ar")
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/css/style.css')}}" rel="stylesheet">
	@else
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/css/style-rtl.css')}}" rel="stylesheet">
	@endif

	<!-- Custom CSS-->
	<link href="{{asset('assets/frontend/desktop_themes/theme_1/css/custom.css')}}" rel="stylesheet">
	
	@yield('style')