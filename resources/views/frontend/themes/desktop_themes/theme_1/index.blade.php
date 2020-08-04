@extends('frontend.themes.desktop_themes.theme_1.layouts.layout')
@section('title')
    Al Qannas Store
@endsection
@section('style')

@endsection

@section('content')
		
        <!-- Home Slider -->
        @include('frontend.themes.desktop_themes.theme_1.parts.homePage.Slider')
        <!-- Home Slider / End -->
        
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">

				<div class="row">
					<!-- Content -->
					<div class="content col-lg-12">
                        
                        <!-- Samll Wide Banners -->
                        @include('frontend.themes.desktop_themes.theme_1.parts.banners.threeBanners')
                        <!-- Samll Wide Banners 1/4 / End -->
                        
                        <!-- New Arrived -->
                        @include('frontend.themes.desktop_themes.theme_1.parts.homePage.NewArrived')
						<!-- New Arrived Ends -->

                        <!-- Samll Wide Banners -->
                        @include('frontend.themes.desktop_themes.theme_1.parts.banners.wideBanner')
                        @include('frontend.themes.desktop_themes.theme_1.parts.banners.wideBanner')
                        <!-- Samll Wide Banners / End -->
    
                        <!-- Best Selling -->
                        @include('frontend.themes.desktop_themes.theme_1.parts.homePage.BestSelling')
						<!-- Best Selling Ends -->
	
                        <!-- Samll Wide Banners -->
                        @include('frontend.themes.desktop_themes.theme_1.parts.banners.wideBanner')
                        @include('frontend.themes.desktop_themes.theme_1.parts.banners.threeBanners')
                        <!-- Samll Wide Banners 1/4 / End -->

					</div>
					<!-- Content / End -->
				</div>

			</div>
		</div>
		<!-- Content / End -->
@endsection
