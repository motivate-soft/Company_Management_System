@extends('frontend.themes.desktop_themes.theme_1.layouts.layout')
@section('title')
    Al Qannas Store
@endsection
@section('style')

@endsection

@section('content')

    <!-- Page Heading
    	================================================== -->
    	<div class="page-heading page-heading--horizontal effect-duotone effect-duotone--primary">
    		<div class="container">
    			<div class="row">
    				<div class="col align-self-start">
    					<h1 class="page-heading__title">Your <span class="highlight">Account</span></h1>
    				</div>
    				<div class="col align-self-end">
    					<ol class="page-heading__breadcrumb breadcrumb font-italic">
    						<li class="breadcrumb-item"><a href="_esports_index.html">Home</a></li>
    						<li class="breadcrumb-item"><a href="_esports_shop-fullwidth.html">Shop</a></li>
    						<li class="breadcrumb-item active" aria-current="page">Your Account</li>
    					</ol>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Page Heading / End -->
    	
    	
    	<!-- Account Filter -->
    	<nav class="content-filter content-filter--boxed content-filter--highlight-side content-filter--label-left">
    		<div class="container">
    			<div class="content-filter__inner">
    				<a href="#" class="content-filter__toggle"></a>
    				<ul class="content-filter__list">
    					<li class="content-filter__item content-filter__item--active"><a href="_esports_shop-account.html" class="content-filter__link"><small>Your Account</small>Personal Information</a></li>
    					<li class="content-filter__item"><a href="#" class="content-filter__link"><small>Your Account</small>Billing Information</a></li>
    					<li class="content-filter__item"><a href="#" class="content-filter__link"><small>Your Account</small>Shipping Information</a></li>
    				</ul>
    			</div>
    		</div>
    	</nav>
    	<!-- Account Filter / End -->
    	
    	<!-- Content
    	================================================== -->
    	<div class="site-content">
    		<div class="container">
    	
    			<div class="row">
    	
    				<div class="col-lg-8">
    	
    					<!-- Personal Information -->
    					<div class="card">
    						<div class="card__header">
    							<h4>Personal Information</h4>
    						</div>
    						<div class="card__content">
    							<form action="#" class="df-personal-info">
    	
    								<div class="form-group form-group--upload">
    									<div class="form-group__avatar form-group__avatar--center">
    										<label class="form-group__avatar-wrapper">
    											<figure class="form-group__avatar-img">
    												<img src="assets/images/esports/avatar-placeholder-80x80.jpg" alt="">
    											</figure>
    											<div class="form-group__label">
    												<h6>Your Profile Photo</h6>
    												<span>Min size 80x80px</span>
    											</div>
    											<input type="file" style="display: none;">
    										</label>
    									</div>
    								</div>
    								<div class="row">
    									<div class="col-md-6">
    										<div class="form-group">
    											<label for="account-email">Email <abbr class="required" title="required">*</abbr></label>
    											<input type="email" class="form-control" value="" name="account-email" id="account-email" placeholder="lagerthadax@yourmail.com">
    										</div>
    									</div>
    									<div class="col-md-6">
    										<div class="form-group">
    											<label for="account-username">Username</label>
    											<input type="text" class="form-control" value="" name="account-username" id="account-username" placeholder="Lagertha Dax">
    										</div>
    									</div>
    								</div>
    	
    								<div class="row">
    									<div class="col-md-6">
    										<div class="form-group">
    											<label for="account-password">Change Password</label>
    											<input type="password" class="form-control" value="" name="account-password" id="account-password" placeholder="**********">
    										</div>
    									</div>
    									<div class="col-md-6">
    										<div class="form-group">
    											<label for="account-password-repeat">Repeat Password</label>
    											<input type="password" class="form-control" value="" name="account-password-repeat" id="account-password-repeat" placeholder="**********">
    										</div>
    									</div>
    								</div>
    	
    								<div class="row">
    									<div class="col-md-6">
    										<div class="form-group">
    											<label for="account-first-name">First Name</label>
    											<input type="text" class="form-control" value="" name="account-first-name" id="account-first-name" placeholder="Your first name...">
    										</div>
    									</div>
    									<div class="col-md-6">
    										<div class="form-group">
    											<label for="account-last-name">Last Name</label>
    											<input type="text" class="form-control" value="" name="account-last-name" id="account-last-name" placeholder="Your last name...">
    										</div>
    									</div>
    								</div>
    	
    								<div class="form-group--submit text-center">
    									<button type="submit" class="btn btn-primary-inverse">Save all changes</button>
    								</div>
    	
    							</form>
    						</div>
    					</div>
    					<!-- Personal Information / End -->
    				</div>
    	
    				<div class="col-lg-4">
    	
    					<!-- Widget: Latest News -->
    					<aside class="widget widget--sidebar card widget-popular-posts">
    						<div class="widget__title card__header">
    							<h4>Latest News</h4>
    						</div>
    						<div class="widget__content card__content">
    							<ul class="posts posts--simple-list">
    								<li class="posts__item posts__item--category-1 posts__item--category-4 ">
    									<figure class="posts__thumb posts__thumb--hover">
    										<a href="_esports_blog-post-1.html"><img src="assets/images/esports/samples/post-img1-sidebar-xs.jpg" alt=""></a>
    									</figure>
    									<div class="posts__inner">
    										<div class="posts__cat">
    											<span class="label posts__cat-label posts__cat-label--category-1">The Team</span><span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
    										</div>
    										<h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">The Alchemists reach to the Xenowatch finals</a></h6>
    										<time datetime="2018-09-27" class="posts__date">September 27th, 2018</time>
    									</div>
    									<div class="clearfix"></div>
    									<div class="posts__excerpt">
    										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore magna.
    									</div>
    								</li>
    								<li class="posts__item posts__item--category-3 ">
    									<figure class="posts__thumb posts__thumb--hover">
    										<a href="_esports_blog-post-1.html"><img src="assets/images/esports/samples/post-img8-sidebar-xs.jpg" alt=""></a>
    									</figure>
    									<div class="posts__inner">
    										<div class="posts__cat">
    											<span class="label posts__cat-label posts__cat-label--category-3">Striker GO</span>
    										</div>
    										<h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">New Tech vehicles will be added in July&#x27;s patch</a></h6>
    										<time datetime="2018-09-27" class="posts__date">August 5th, 2018</time>
    									</div>
    									<div class="clearfix"></div>
    									<div class="posts__excerpt">
    										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore magna.
    									</div>
    								</li>
    								<li class="posts__item posts__item--category-2 ">
    									<figure class="posts__thumb posts__thumb--hover">
    										<a href="_esports_blog-post-1.html"><img src="assets/images/esports/samples/post-img2-sidebar-xs.jpg" alt=""></a>
    									</figure>
    									<div class="posts__inner">
    										<div class="posts__cat">
    											<span class="label posts__cat-label posts__cat-label--category-2">L.O. Heroes</span>
    										</div>
    										<h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">A new mage character is coming to the League</a></h6>
    										<time datetime="2018-09-27" class="posts__date">September 5th, 2018</time>
    									</div>
    									<div class="clearfix"></div>
    									<div class="posts__excerpt">
    										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore magna.
    									</div>
    								</li>
    								<li class="posts__item posts__item--category-4 ">
    									<figure class="posts__thumb posts__thumb--hover">
    										<a href="_esports_blog-post-1.html"><img src="assets/images/esports/samples/post-img9-sidebar-xs.jpg" alt=""></a>
    									</figure>
    									<div class="posts__inner">
    										<div class="posts__cat">
    											<span class="label posts__cat-label posts__cat-label--category-4">Xenowatch</span>
    										</div>
    										<h6 class="posts__title posts__title--color-hover"><a href="_esports_blog-post-1.html">Destroy will stream the Mercenaries mission</a></h6>
    										<time datetime="2018-09-27" class="posts__date">August 14th, 2018</time>
    									</div>
    									<div class="clearfix"></div>
    									<div class="posts__excerpt">
    										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore magna.
    									</div>
    								</li>
    							</ul>
    						</div>
    					</aside>
    					<!-- Widget: Latest News / End -->
    	
    				</div>
    	
    			</div>
    		</div>
    	</div>
    	
    	<!-- Content / End -->
@endsection
