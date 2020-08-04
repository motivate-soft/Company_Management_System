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
				<h1 class="page-heading__title">Single <span class="highlight">Product</span></h1>
			</div>
			<div class="col align-self-end">
				<ol class="page-heading__breadcrumb breadcrumb font-italic">
					<li class="breadcrumb-item"><a href="_esports_index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="_esports_shop-fullwidth.html">Shop</a></li>
					<li class="breadcrumb-item active" aria-current="page">Product</li>
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

		<!-- Single Product -->
		<div class="products products--list products--list-lg products--list-alt">

			<div class="product__item card">

				<div class="product__img">
					<div class="product__img-holder">

						<div class="product__slider">
							<div class="product__slide">
								<div class="product__slide-img">
									<img src="assets/images/esports/samples/product-1-lg.jpg" alt="">
								</div>
							</div>
							<div class="product__slide">
								<div class="product__slide-img">
									<img src="assets/images/esports/samples/product-8-lg.jpg" alt="">
								</div>
							</div>
							<div class="product__slide">
								<div class="product__slide-img">
									<img src="assets/images/esports/samples/product-10-lg.jpg" alt="">
								</div>
							</div>
						</div>

						<div class="product__slider-nav">
							<div class="product__slider-paging js-product__slider-paging"></div>
							<div class="product__slider-arrows js-product__slider-arrows"></div>
						</div>

					</div>
				</div>

				<div class="product__content card__content">

					<header class="product__header product__header--block">
						<div class="product__header-inner">
							<h2 class="product__title">Jaxxy Framed Art Print</h2>
							<div class="product__ratings product__ratings--sm">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star empty"></i>

								<span class="product__ratings-label">Based on <span class="product__ratings-value">2 Reviews</span></span>
							</div>
						</div>
						<div class="product__price">$48.00</div>
					</header>

					<div class="product__excerpt">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea modo sequat. Duis aute irure dolorem in reprehenderit in voluriatur.
					</div>

					<form action="#" class="product__params product__params--alt">
						<div class="product__param-item product__param-item--color">
							<label>Frame Color</label>
							<ul class="filter-color">
								<li class="filter-color__item">
									<label class="radio">
										<input type="radio" id="product_color_1" name="product-color" value="1" class="color-violet">
										<span class="radio-indicator"></span>
									</label>
								</li>
								<li class="filter-color__item">
									<label class="radio">
										<input type="radio" id="product_color_2" name="product-color" value="2" class="color-blue" checked>
										<span class="radio-indicator"></span>
									</label>
								</li>
								<li class="filter-color__item">
									<label class="radio">
										<input type="radio" id="product_color_8" name="product-color" value="8" class="color-black" checked>
										<span class="radio-indicator"></span>
									</label>
								</li>
								<li class="filter-color__item">
									<label class="radio">
										<input type="radio" id="product_color_7" name="product-color" value="7" class="color-white">
										<span class="radio-indicator"></span>
									</label>
								</li>
							</ul>
						</div>
						<div class="product__param-item product__param-item--size">
							<label class="control-label" for="select-size">Choose Size</label>
							<select name="select-size" id="select-size" class="form-control">
								<option value="1">36x18 inches</option>
								<option value="2">32x16 inches</option>
								<option value="3">24x12 inches</option>
							</select>
						</div>
						<div class="product__param-item product__param-item--quantity">
							<label>Quantity</label>
							<input type="number" class="form-control product-quantity-control" step="1" value="4">
						</div>
					</form>

					<footer class="product__footer">
						<a href="_esports_shop-cart.html" class="btn btn-primary-inverse btn-icon product__add-to-cart"><i class="icon-bag"></i> Add to Your Bag</a>
						<a href="_esports_shop-wishlist.html" class="btn btn-primary btn-icon product__add-to-cart"><i class="icon-heart"></i> Add to Wishlist</a>
					</footer>
				</div>
			</div>

		</div>
		<!-- Single Product / End -->

		<!-- Single Product Tabbed Content -->
		<div class="product-tabs card card--lg">
		
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
				<li class="nav-item"><a class="nav-link active" href="#tab-desciption" role="tab" data-toggle="tab"><small>Product</small>Full Description</a></li>
				<li class="nav-item"><a class="nav-link" href="#tab-info" role="tab" data-toggle="tab"><small>Product</small>Additional Information</a></li>
				<li class="nav-item"><a class="nav-link" href="#tab-reviews" role="tab" data-toggle="tab"><small>Product</small>Customer Reviews (3)</a></li>
			</ul>
		
			<!-- Tab panes -->
			<div class="tab-content card__content">
		
				<!-- Tab: Description -->
				<div role="tabpanel" class="tab-pane fade show active" id="tab-desciption">
		
					<header class="product-tabs__header">
						<h2>Full Description</h2>
					</header>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis eder nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					
					<div class="spacer"></div>
					
					<h4>Our Warranty</h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					
					<div class="spacer"></div>
					
					<div class="row">
						<div class="col-md-4">
							<!-- Icobox -->
							<div class="icobox icobox--center">
								<div class="icobox__icon icobox__icon--border icobox__icon--lg icobox__icon--circle">
									<i class="icon-badge"></i>
								</div>
								<div class="icobox__content">
									<h4 class="icobox__title icobox__title--lg">Quality Assurance</h4>
									<div class="icobox__description">
										Lorem ipsum dolor sit amet, consectetur enrume adipisicing elit, sed eiusmod tempor incididun labore dolore magna aliqua en lorem.
									</div>
								</div>
							</div>
							<!-- Icobox / End -->
						</div>
						<div class="col-md-4">
							<!-- Icobox -->
							<div class="icobox icobox--center">
								<div class="icobox__icon icobox__icon--border icobox__icon--lg icobox__icon--circle">
									<i class="icon-energy"></i>
								</div>
								<div class="icobox__content">
									<h4 class="icobox__title icobox__title--lg">Ultra Durability</h4>
									<div class="icobox__description">
										Lorem ipsum dolor sit amet, consectetur enrume adipisicing elit, sed eiusmod tempor incididun labore dolore magna aliqua en lorem.
									</div>
								</div>
							</div>
							<!-- Icobox / End -->
						</div>
						<div class="col-md-4">
							<!-- Icobox -->
							<div class="icobox icobox--center">
								<div class="icobox__icon icobox__icon--border icobox__icon--lg icobox__icon--circle">
									<i class="icon-like"></i>
								</div>
								<div class="icobox__content">
									<h4 class="icobox__title icobox__title--lg">Super Comfort</h4>
									<div class="icobox__description">
										Lorem ipsum dolor sit amet, consectetur enrume adipisicing elit, sed eiusmod tempor incididun labore dolore magna aliqua en lorem.
									</div>
								</div>
							</div>
							<!-- Icobox / End -->
						</div>
					</div>
		
				</div>
				<!-- Tab: Description / End -->
		
				<!-- Tab: Shipping -->
				<div role="tabpanel" class="tab-pane fade" id="tab-info">
		
					<header class="product-tabs__header">
						<h2>Additional Information</h2>
					</header>
					
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
					
					<div class="spacer"></div>
					
					<h4>Delivery System</h4>
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis eder nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					
					<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
				</div>
				<!-- Tab: Shipping / End -->
		
				<!-- Tab: Reviews -->
				<div role="tabpanel" class="tab-pane fade" id="tab-reviews">
		
					<section class="product-tabs__section">
					
						<header class="product-tabs__header product-tabs__header--sm">
							<h2>
								<span class="product-tabs__ratings"><span class="highlight">4.33</span> Item Rating</span>
								<span class="product-tabs__reviews">3 Reviews</span>
							</h2>
						</header>
						
						<!-- Product Reviews -->
						<ul class="comments comments--thumb-top">
							<li class="comments__item">
								<div class="comments__inner">
									<header class="comment__header">
										<div class="comment__author">
											<figure class="comment__author-avatar">
												<img src="assets/images/esports/samples/avatar-2-sm.jpg" alt="">
											</figure>
											<div class="comment__author-info">
												<h5 class="comment__author-name">Jennifer Stevens</h5>
												<time class="comment__post-date" datetime="2016-08-23">5 minutes ago</time>
												<div class="comment__ratings ratings">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star empty"></i>
												</div>
											</div>
										</div>
									</header>
									<div class="comment__body">
										<h4 class="comment__title">The Best Quality!</h4>
										Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam tatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur ratione.
									</div>
								</div>
							</li>
							<li class="comments__item">
								<div class="comments__inner">
									<header class="comment__header">
										<div class="comment__author">
											<figure class="comment__author-avatar">
												<img src="assets/images/esports/samples/avatar-8-sm.jpg" alt="">
											</figure>
											<div class="comment__author-info">
												<h5 class="comment__author-name">Jake Casspon</h5>
												<time class="comment__post-date" datetime="2016-08-23">28 minutes ago</time>
												<div class="comment__ratings ratings">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
												</div>
											</div>
										</div>
									</header>
									<div class="comment__body">
										<h4 class="comment__title">The Best Designs I’ve ever Seen</h4>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
									</div>
								</div>
							</li>
							<li class="comments__item">
								<div class="comments__inner">
									<header class="comment__header">
										<div class="comment__author">
											<figure class="comment__author-avatar">
												<img src="assets/images/esports/samples/avatar-14-sm.jpg" alt="">
											</figure>
											<div class="comment__author-info">
												<h5 class="comment__author-name">The Speedtester</h5>
												<time class="comment__post-date" datetime="2016-08-23">18 hours ago</time>
												<div class="comment__ratings ratings">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star empty"></i>
												</div>
											</div>
										</div>
									</header>
									<div class="comment__body">
										<h4 class="comment__title">Shipping Issues!</h4>
										Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam tatem quia voluptas sit aspernatur aut odit aut fugit, sed quia ratione.
									</div>
								</div>
							</li>
						</ul>
						<!-- Product Reviews / End -->
					
					</section>
					
					<section class="product-tabs__section">
					
						<header class="product-tabs__header">
							<h2>Write a Review</h2>
						</header>
						
						<!-- Reviews Form -->
						<form action="#" class="reviews-form">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="review-stars">Review Stars</label>
										<select name="review-stars" id="review-stars" class="form-control">
											<option value="5">5 Stars Rating</option>
											<option value="4">4 Stars Rating</option>
											<option value="3">3 Stars Rating</option>
											<option value="2">2 Stars Rating</option>
											<option value="1">1 Star Rating</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="review-title">Review Title</label>
										<input type="text" id="review-title" name="review-title" class="form-control">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label" for="textarea-review">Your Review</label>
										<textarea name="textarea-review" id="textarea-review" rows="5" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="form-group form-group--submit">
								<button type="submit" class="btn btn-default btn-block btn-lg">Post Your Review</button>
							</div>
						</form>
						<!-- Reviews Form / End -->
					
					</section>
		
				</div>
				<!-- Tab: Reviews / End -->
			</div>
		
		</div>
		<!-- Single Product Tabbed Content / End -->

		<!-- Related Products -->
		<div class="card card--clean">
			<header class="card__header">
				<h4>Related Products</h4>
			</header>
			<div class="card__content">
		
				<!-- Products -->
				<ul class="products products--grid products--grid-4 products--grid-simple">
		
					<!-- Product #0 -->
					<li class="product__item">
		
						<div class="product__img">
							<div class="product__thumb">
								<img src="assets/images/esports/samples/product-4.jpg" alt="">
							</div>
							<div class="product__overlay">
								<div class="product__btns">
									<a href="_esports_shop-cart.html" class="btn btn-primary-inverse btn-block btn-icon"><i class="icon-bag"></i> Add to your bag</a>
									<a href="_esports_shop-wishlist.html" class="btn btn-primary btn-block btn-icon"><i class="icon-heart"></i> Add to wishlist</a>
								</div>
							</div>
						</div>
		
						<div class="product__content card__content">
							<div class="product__header">
								<div class="product__header-inner">
									<h2 class="product__title"><a href="_esports_shop-product.html">Alchemists Men T-Shirt</a></h2>
									<div class="product__ratings">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star empty"></i>
									</div>
									<div class="product__price">
											$19.00
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- Product #0 / End -->
					<!-- Product #1 -->
					<li class="product__item">
		
						<div class="product__img">
							<div class="product__thumb">
								<img src="assets/images/esports/samples/product-5.jpg" alt="">
							</div>
							<div class="product__overlay">
								<div class="product__btns">
									<a href="_esports_shop-cart.html" class="btn btn-primary-inverse btn-block btn-icon"><i class="icon-bag"></i> Add to your bag</a>
									<a href="_esports_shop-wishlist.html" class="btn btn-primary btn-block btn-icon"><i class="icon-heart"></i> Add to wishlist</a>
								</div>
							</div>
						</div>
		
						<div class="product__content card__content">
							<div class="product__header">
								<div class="product__header-inner">
									<h2 class="product__title"><a href="_esports_shop-product.html">Space Journey Notepad</a></h2>
									<div class="product__ratings">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star empty"></i>
										<i class="fas fa-star empty"></i>
										<i class="fas fa-star empty"></i>
									</div>
									<div class="product__price">
											$10.00
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- Product #1 / End -->
					<!-- Product #2 -->
					<li class="product__item">
		
						<div class="product__img">
							<div class="product__thumb">
								<img src="assets/images/esports/samples/product-6.jpg" alt="">
							</div>
							<div class="product__overlay">
								<div class="product__btns">
									<a href="_esports_shop-cart.html" class="btn btn-primary-inverse btn-block btn-icon"><i class="icon-bag"></i> Add to your bag</a>
									<a href="_esports_shop-wishlist.html" class="btn btn-primary btn-block btn-icon"><i class="icon-heart"></i> Add to wishlist</a>
								</div>
							</div>
						</div>
		
						<div class="product__content card__content">
							<div class="product__header">
								<div class="product__header-inner">
									<h2 class="product__title"><a href="_esports_shop-product.html">Alchemists Women T-Shirt</a></h2>
									<div class="product__ratings">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
									<div class="product__price">
											$19.00
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- Product #2 / End -->
					<!-- Product #3 -->
					<li class="product__item">
		
						<div class="product__img">
							<div class="product__thumb">
								<img src="assets/images/esports/samples/product-7.jpg" alt="">
							</div>
							<div class="product__overlay">
								<div class="product__btns">
									<a href="_esports_shop-cart.html" class="btn btn-primary-inverse btn-block btn-icon"><i class="icon-bag"></i> Add to your bag</a>
									<a href="_esports_shop-wishlist.html" class="btn btn-primary btn-block btn-icon"><i class="icon-heart"></i> Add to wishlist</a>
								</div>
							</div>
						</div>
		
						<div class="product__content card__content">
							<div class="product__header">
								<div class="product__header-inner">
									<h2 class="product__title"><a href="_esports_shop-product.html">Alchemists Black Mug</a></h2>
									<div class="product__ratings">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star empty"></i>
										<i class="fas fa-star empty"></i>
									</div>
									<div class="product__price">
											$16.00
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- Product #3 / End -->
		
				</ul>
				<!-- Products / End -->
		
			</div>
		</div>
		<!-- Related Products / End -->

	</div>
</div>

<!-- Content / End -->
@endsection
