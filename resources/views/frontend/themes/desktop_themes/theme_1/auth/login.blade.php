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
					<h1 class="page-heading__title">Login or <span class="highlight">Register</span></h1>
				</div>
				<div class="col align-self-end">
					<ol class="page-heading__breadcrumb breadcrumb font-italic">
						<li class="breadcrumb-item"><a href="_esports_index.html">Home</a></li>
						<li class="breadcrumb-item"><a href="_esports_shop-fullwidth.html">Shop</a></li>
						<li class="breadcrumb-item active" aria-current="page">Login or Register</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Heading / End -->
	
	
	<!-- Content
	================================================== -->
	<div class="site-content">
		<div class="container">
	
			<div class="row">
	
				<div class="col-lg-6">
	
					<!-- Login -->
					<div class="card">
						<div class="card__header">
							<h4>Login to your Account</h4>
						</div>
						<div class="card__content">
	
							<!-- Login Form -->
							<form action="#">
								<div class="form-group">
									<label for="login-name">Your Email</label>
									<input type="email" name="login-name" id="login-name" class="form-control" placeholder="Enter your email address...">
								</div>
								<div class="form-group">
									<label for="login-password">Your Password</label>
									<input type="password" name="login-password" id="login-password" class="form-control" placeholder="Enter your password...">
								</div>
								<div class="form-group form-group--password-forgot">
									<label class="checkbox checkbox-inline">
										<input type="checkbox" id="inlineCheckbox1" value="option1" checked> Remember Me
										<span class="checkbox-indicator"></span>
									</label>
									<span class="password-reminder">Forgot your password? <a href="#">Click Here</a></span>
								</div>
								<div class="form-group form-group--sm">
									<a href="_esports_shop-account.html" class="btn btn-primary-inverse btn-lg btn-block">Sign in to your account</a>
								</div>
								<div class="row">
									<div class="col-md-6">
										<button class="btn btn-facebook btn-icon btn-block"><i class="fab fa-facebook"></i> Sign In via Facebook</button>
									</div>
									<div class="col-md-6">
										<button class="btn btn-twitter btn-icon btn-block"><i class="fab fa-twitter"></i> Sign in via Twitter</button>
									</div>
								</div>
							</form>
							<!-- Login Form / End -->
	
						</div>
					</div>
					<!-- Login / End -->
				</div>
	
				<div class="col-lg-6">
	
					<!-- Register -->
					<div class="card">
						<div class="card__header">
							<h4>Register Now</h4>
						</div>
						<div class="card__content">
	
							<!-- Register Form -->
							<form action="#">
								<div class="form-group">
									<label for="register-name">Your Email</label>
									<input type="email" name="register-name" id="register-name" class="form-control" placeholder="Enter your email address...">
								</div>
								<div class="form-group">
									<label for="register-password">Your Password</label>
									<input type="password" name="register-password" id="register-password" class="form-control" placeholder="Enter your password...">
								</div>
								<div class="form-group">
									<label for="repeat-password">Repeat Password</label>
									<input type="password" name="repeat-password" id="repeat-password" class="form-control" placeholder="Repeat your password...">
								</div>
								<div class="form-group">
									<a href="_esports_shop-account.html" class="btn btn-default btn-lg btn-block">Create Your Account</a>
								</div>
							</form>
							<!-- Register Form / End -->
	
						</div>
					</div>
					<!-- Register / End -->
				</div>
	
			</div>
		</div>
	</div>
	
	<!-- Content / End -->
		
@endsection
