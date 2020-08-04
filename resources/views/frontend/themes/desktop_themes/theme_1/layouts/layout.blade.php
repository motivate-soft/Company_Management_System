<!DOCTYPE html>
<html lang="en" @if(app()->getLocale() != "ar") dir="LTR" @else dir="RTL" @endif>

<head>
    @include('frontend.themes.desktop_themes.theme_1.layouts.head')
</head>

<body data-template="template-esports">

	<div class="site-wrapper clearfix">
		<div class="site-overlay"></div>

		@include('frontend.themes.desktop_themes.theme_1.layouts.header')
		
		@yield('content')
			
		@include('frontend.themes.desktop_themes.theme_1.layouts.footer')

	</div>

	@include('frontend.themes.desktop_themes.theme_1.layouts.script')

</body>

</html>