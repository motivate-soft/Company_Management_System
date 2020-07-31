<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.themes.desktop_themes.theme_1.layouts.layout')
</head>

<body data-template="template-esports">

	<div class="site-wrapper clearfix">
		<div class="site-overlay"></div>

		<!-- Header
		================================================== -->

		<!-- Header Mobile -->
		<div class="header-mobile clearfix" id="header-mobile">
			<div class="header-mobile__logo">
				<a href="_esports_index.html"><img src="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/logo.png')}}"
						srcset="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/logo@2x.png 2x')}}" alt="Alchemists"
						class="header-mobile__logo-img"></a>
			</div>
			<div class="header-mobile__inner">
				<a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
				<span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
			</div>
		</div>
		<!-- Header Mobile / End -->

		<!-- Header Desktop -->
		<header class="header header--layout-3">

			<!-- Header Top Bar -->
			<div class="header__top-bar clearfix">
				<div class="container">
					<div class="header__top-bar-inner">

						<!-- Social Links -->
						<ul class="social-links social-links--inline social-links--main-nav social-links--top-bar">
							<li class="social-links__item">
								<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
									title="Facebook"><i class="fab fa-facebook"></i></a>
							</li>
							<li class="social-links__item">
								<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
									title="Twitter"><i class="fab fa-twitter"></i></a>
							</li>
							<li class="social-links__item">
								<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
									title="Twitch"><i class="fab fa-twitch"></i></a>
							</li>
							<li class="social-links__item">
								<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
									title="YouTube"><i class="fab fa-youtube"></i></a>
							</li>
							<li class="social-links__item">
								<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
									title="Google+"><i class="fab fa-google-plus-g"></i></a>
							</li>
							<li class="social-links__item">
								<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
									title="Instagram"><i class="fab fa-instagram"></i></a>
							</li>
						</ul>
						<!-- Social Links / End -->

						<!-- Account Navigation -->
						<ul class="nav-account">
							<li class="nav-account__item nav-account__item--wishlist"><a
									href="_esports_shop-wishlist.html">Wishlist <span class="highlight">8</span></a>
							</li>
							<li class="nav-account__item"><a href="#">Currency: <span class="highlight">USD</span></a>
								<ul class="main-nav__sub">
									<li><a href="#">USD</a></li>
									<li><a href="#">EUR</a></li>
									<li><a href="#">GBP</a></li>
								</ul>
							</li>
							<li class="nav-account__item"><a href="#">Language: <span class="highlight">EN</span></a>
								<ul class="main-nav__sub">
									<li><a href="#">English</a></li>
									<li><a href="#">Spanish</a></li>
									<li><a href="#">French</a></li>
									<li><a href="#">German</a></li>
								</ul>
							</li>
							<li class="nav-account__item"><a href="_esports_shop-account.html">Your Account</a></li>
							<li class="nav-account__item nav-account__item--logout"><a
									href="_esports_shop-login.html">Logout</a></li>
						</ul>
						<!-- Account Navigation / End -->
					</div>
				</div>
			</div>
			<!-- Header Top Bar / End -->

			<!-- Header Primary -->
			<div class="header__primary">
				<div class="container">
					<div class="header__primary-inner">

						<!-- Header Logo -->
						<div class="header-logo">
							<a href="_esports_index.html"><img src="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/logo.png')}}"
									srcset="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/logo@2x.png 2x')}}" alt="Alchemists"
									class="header-logo__img"></a>
						</div>
						<!-- Header Logo / End -->

						<!-- Main Navigation -->
						<nav class="main-nav">
							<ul class="main-nav__list">
								<li class="active"><a href="_esports_index.html">Home</a>

								</li>
								<li class=""><a href="#">Contact Us</a>

								</li>
								<li class=""><a href="_esports_team-overview.html">Categories</a>
									<!-- Mega Menu -->
									<div class="main-nav__megamenu main-nav__megamenu--no-paddings ">
										<div class="row">
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-1">
													<a href="#" class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Sony</span>
														<span class="main-nav-banner__title">PlayStation</span>
													</a>
												</li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
											</ul>
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-2">
													<a href="#" class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">MicroSoft</span>
														<span class="main-nav-banner__title">XBox</span>
													</a>
												</li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
											</ul>
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-3">
													<a href="#" class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Others</span>
														<span class="main-nav-banner__title">Accessories</span>
													</a>
												</li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
												<li><a href="#">Dummy List</a></li>
											</ul>
										</div>
									</div>
									<!-- Mega Menu / End -->
								</li>
								<li class="">
									<a href="_esports_shop-fullwidth.html">Shop All</a>

								</li>


							</ul>
						</nav>
						<!-- Main Navigation / End -->

						<div class="header__primary-spacer"></div>

						<!-- Header Search Form -->
						<div class="header-search-form ">
							<form action="#" id="mobile-search-form" class="search-form">
								<input type="text" class="form-control header-mobile__search-control" value=""
									placeholder="Enter your search here...">
								<button type="submit" class="header-mobile__search-submit"><i
										class="fas fa-search"></i></button>
							</form>
						</div>
						<!-- Header Search Form / End -->

						<!-- Header Info Block -->
						<ul class="info-block info-block--header">

							<li class="info-block__item info-block__item--shopping-cart js-info-block__item--onclick">
								<a href="_esports_shop-cart.html" class="info-block__link-wrapper">
									<svg role="img" class="df-icon df-icon--shopping-cart">
										<use xlink:href="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/icons-esports.svg#cart')}}" />
									</svg>
									<h6 class="info-block__heading">Your Bag (8 items)</h6>
									<span class="info-block__cart-sum">$256,30</span>
								</a>

								<!-- Dropdown Shopping Cart -->
								<ul class="header-cart header-cart--inventory">

									<li class="header-cart__item header-cart__item--title">
										<h5>Bag Inventory</h5>
									</li>

									<li class="header-cart__item">
										<figure class="header-cart__product-thumb">
											<a href="_esports_shop-product.html">
												<img src="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/samples/cart-sm-1.jpg')}}"
													alt="Jaxxy Framed Art Print">
											</a>
										</figure>
										<div class="header-cart__badges">
											<span class="badge badge-primary">2</span>
											<span class="badge badge-default badge-close"><i
													class="fas fa-times"></i></span>
										</div>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb">
											<a href="_esports_shop-product.html">
												<img src="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/samples/cart-sm-2.jpg')}}"
													alt="Tech Warrior Framed Art Print">
											</a>
										</figure>
										<div class="header-cart__badges">
											<span class="badge badge-primary">4</span>
											<span class="badge badge-default badge-close"><i
													class="fas fa-times"></i></span>
										</div>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb">
											<a href="_esports_shop-product.html">
												<img src="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/samples/cart-sm-3.jpg')}}"
													alt="Alchemists White Mug">
											</a>
										</figure>
										<div class="header-cart__badges">
											<span class="badge badge-default badge-close"><i
													class="fas fa-times"></i></span>
										</div>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb">
											<a href="_esports_shop-product.html">
												<img src="{{asset('assets/frontend/desktop_themes/theme_1/images/esports/samples/cart-sm-4.jpg')}}"
													alt="Mercenaries Framed Art Print">
											</a>
										</figure>
										<div class="header-cart__badges">
											<span class="badge badge-default badge-close"><i
													class="fas fa-times"></i></span>
										</div>
									</li>

									<li class="header-cart__item">
										<figure class="header-cart__product-thumb"></figure>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb"></figure>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb"></figure>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb"></figure>
									</li>
									<li class="header-cart__item">
										<figure class="header-cart__product-thumb"></figure>
									</li>

									<li class="header-cart__item header-cart__item--subtotal">
										<span class="header-cart__subtotal">Inventory Subtotal</span>
										<span class="header-cart__subtotal-sum">$256.30</span>
									</li>
									<li class="header-cart__item header-cart__item--action">
										<a href="_esports_shop-cart.html" class="btn btn-primary-inverse btn-block">Go
											to Shopping Cart</a>
										<a href="_esports_shop-checkout.html" class="btn btn-primary btn-block">Proceed
											to Checkout</a>
									</li>
								</ul>
								<!-- Dropdown Shopping Cart / End -->

							</li>
						</ul>
						<!-- Header Info Block / End -->

					</div>
				</div>
			</div>
			<!-- Header Primary / End -->

		</header>
		<!-- Header / End -->

		@yield('content')


		<!-- Footer
		================================================== -->
		<footer id="footer" class="footer">


			<!-- Footer Social Links -->
			<div class="footer-social">
				<div class="container">
					<p style="text-align: center; padding: 10px 0 10px 0; margin-bottom: 0 !important;">Powered By
						Development Here</p>
				</div>
			</div>
			<!-- Footer Social Links / End -->
		</footer>
		<!-- Footer / End -->

	</div>

	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/jquery/jquery-migrate.min.js')}}"></script>
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/js/core.js')}}"></script>

	<!-- Vendor JS -->
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/twitter/jquery.twitter.js')}}"></script>

	<!-- REVEAL ADD-ON FILES -->
	<script type="text/javascript"
		src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/reveal/js/revolution.addon.revealer.min.js?ver=1.0.0')}}"></script>

	<!-- TYPEWRITER ADD-ON FILES -->
	<script type="text/javascript"
		src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js')}}"></script>

	<!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
	<script type="text/javascript"
		src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
	<script type="text/javascript"
		src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
	<script type="text/javascript"
		src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
	<script type="text/javascript"
		src="{{asset('assets/frontend/desktop_themes/theme_1/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>

	<script type="text/javascript">
		var revapi, tpj;
		(function () {
			if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad); else onLoad();

			function onLoad() {
				if (tpj === undefined) {
					tpj = jQuery;
					if ("off" == "on") {
						tpj.noConflict();
					}
				}
				if (tpj("#hero-revslider").revolution == undefined) {
					revslider_showDoubleJqueryError("#hero-revslider");
				} else {
					revapi = tpj("#hero-revslider").show().revolution({
						sliderType: "standard",
						jsFileLocation: "revolution/js/",
						sliderLayout: "auto",
						dottedOverlay: "fourxfour",
						delay: 9000,
						revealer: {
							direction: "tlbr_skew",
							color: "#1d1429",
							duration: "1500",
							delay: "0",
							easing: "Power3.easeOut",
							spinner: "2",
							spinnerColor: "rgba(0,0,0,",
						},
						navigation: {
							keyboardNavigation: "off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation: "off",
							mouseScrollReverse: "default",
							onHoverStop: "off",
							arrows: {
								style: "metis",
								enable: true,
								hide_onmobile: false,
								hide_onleave: false,
								tmp: '',
								left: {
									container: "layergrid",
									h_align: "right",
									v_align: "bottom",
									h_offset: 72,
									v_offset: 0
								},
								right: {
									container: "layergrid",
									h_align: "right",
									v_align: "bottom",
									h_offset: 12,
									v_offset: 0
								}
							}
						},
						responsiveLevels: [1200, 992, 768, 576],
						visibilityLevels: [1200, 992, 768, 576],
						gridwidth: [1420, 992, 768, 576],
						gridheight: [620, 580, 460, 400],
						lazyType: "none",
						parallax: {
							type: "scroll",
							origo: "slidercenter",
							speed: 400,
							speedbg: 0,
							speedls: 0,
							levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, -10, -15, -20, -25, 50, 51, 55],
						},
						shadow: 0,
						spinner: "spinner5",
						stopLoop: "off",
						stopAfterLoops: -1,
						stopAtSlide: -1,
						shuffle: "off",
						autoHeight: "off",
						hideThumbsOnMobile: "off",
						hideSliderAtLimit: 0,
						hideCaptionAtLimit: 0,
						hideAllCaptionAtLilmit: 0,
						debugMode: false,
						fallbacks: {
							simplifyAll: "off",
							nextSlideOnWindowFocus: "off",
							disableFocusListener: false,
						}
					});
				}; /* END OF revapi call */

				RsRevealerAddOn(tpj, revapi, "<div class='rsaddon-revealer-spinner rsaddon-revealer-spinner-2'><div class='rsaddon-revealer-2' style='border-top-color: 0.65); border-bottom-color: 0.15); border-left-color: 0.65); border-right-color: 0.15)'><\/div><\/div>");
				RsTypewriterAddOn(tpj, revapi);

			}; /* END OF ON LOAD FUNCTION */
		}()); /* END OF WRAPPING FUNCTION */
	</script>

	<!-- Template JS -->
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/js/init.js')}}"></script>
	<script src="{{asset('assets/frontend/desktop_themes/theme_1/js/custom.js')}}"></script>

</body>

</html>