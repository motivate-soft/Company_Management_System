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
    				<h1 class="page-heading__title">Shopping <span class="highlight">Cart</span></h1>
    			</div>
    			<div class="col align-self-end">
    				<ol class="page-heading__breadcrumb breadcrumb font-italic">
    					<li class="breadcrumb-item"><a href="_esports_index.html">Home</a></li>
    					<li class="breadcrumb-item"><a href="_esports_shop-fullwidth.html">Shop</a></li>
    					<li class="breadcrumb-item active" aria-current="page">Cart</li>
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
    
    		<!-- Inventory -->
    		<div class="card card--no-paddings alc">
    			<div class="card__header card__header--has-btn">
    				<h4>Your Inventory</h4>
    				<a class="btn btn-default btn-xs card-header__button" href="#">Update Shopping Cart</a>
    			</div>
    			<div class="card__content pt-0">
    				<!-- Items -->
    				<div class="card__subheader card__subheader--sm card__subheader--nomargins card__subheader--side">
    					<h5>Your Items (4)</h5>
    				</div>
    				<div class="alc-inventory row">
    					<div class="alc-inventory__side col-lg-4">
    						<div class="card__content-inner">
    							<ul class="alc-inventory__list list-unstyled">
    
    								<li class="alc-inventory__item alc-inventory__item--active">
    									<figure class="alc-inventory__item-thumb">
    										<a href="_esports_shop-product.html">
    											<img src="assets/images/esports/samples/cart-sm-1.jpg" alt="Jaxxy Framed Art Print">
    										</a>
    									</figure>
    									<div class="alc-inventory__item-badges">
    										<span class="badge badge-primary">2</span>
    										<span class="badge badge-default badge-close"><i class="fas fa-times"></i></span>
    									</div>
    								</li>
    								<li class="alc-inventory__item ">
    									<figure class="alc-inventory__item-thumb">
    										<a href="_esports_shop-product.html">
    											<img src="assets/images/esports/samples/cart-sm-2.jpg" alt="Tech Warrior Framed Art Print">
    										</a>
    									</figure>
    									<div class="alc-inventory__item-badges">
    										<span class="badge badge-primary">4</span>
    										<span class="badge badge-default badge-close"><i class="fas fa-times"></i></span>
    									</div>
    								</li>
    								<li class="alc-inventory__item ">
    									<figure class="alc-inventory__item-thumb">
    										<a href="_esports_shop-product.html">
    											<img src="assets/images/esports/samples/cart-sm-3.jpg" alt="Alchemists White Mug">
    										</a>
    									</figure>
    									<div class="alc-inventory__item-badges">
    										<span class="badge badge-default badge-close"><i class="fas fa-times"></i></span>
    									</div>
    								</li>
    								<li class="alc-inventory__item ">
    									<figure class="alc-inventory__item-thumb">
    										<a href="_esports_shop-product.html">
    											<img src="assets/images/esports/samples/cart-sm-4.jpg" alt="Mercenaries Framed Art Print">
    										</a>
    									</figure>
    									<div class="alc-inventory__item-badges">
    										<span class="badge badge-default badge-close"><i class="fas fa-times"></i></span>
    									</div>
    								</li>
    
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    								<li class="alc-inventory__item">
    									<figure class="alc-inventory__item-thumb"></figure>
    								</li>
    
    							</ul>
    						</div>
    					</div>
    					<div class="alc-inventory__main col-lg-8">
    						<div class="card__content-inner">
    							<div class="row">
    								<div class="col-lg-6 alc-inventory__main-thumb">
    									<img src="assets/images/esports/samples/cart-1-lg.jpg" alt="">
    								</div>
    								<div class="col-lg-6 alc-inventory__main-body">
    									<div class="alc-inventory__main-header">
    										<h2 class="alc-inventory__main-title">Jaxxy Framed Art Print</h2>
    										<div class="alc-inventory__main-info">
    											<div class="alc-inventory__main-ratings">
    												<i class="fas fa-star"></i>
    												<i class="fas fa-star"></i>
    												<i class="fas fa-star"></i>
    												<i class="fas fa-star"></i>
    												<i class="fas fa-star empty"></i>
    											</div>
    											<div class="alc-inventory__main-price">$48.00</div>
    										</div>
    									</div>
    									<div class="alc-inventory__main-excerpt">
    										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea modo sequat. Duis aute irure dolorem in reprehenderit in voluriatur.
    									</div>
    									<div class="alc-inventory__main-quantity">
    										<input type="number" class="form-control product-quantity-control" step="1" value="4">
    									</div>
    									<div class="alc-inventory__main-meta">
    										<div class="alc-inventory__main-meta-item">
    											<span class="alc-inventory__main-meta-label">Frame Color:</span>
    											<span class="alc-inventory__main-meta-value">Black</span>
    										</div>
    										<div class="alc-inventory__main-meta-item">
    											<span class="alc-inventory__main-meta-label">Size:</span>
    											<span class="alc-inventory__main-meta-value">36x18 inches</span>
    										</div>
    										<div class="alc-inventory__main-meta-item">
    											<span class="alc-inventory__main-meta-label">Subtotal:</span>
    											<span class="alc-inventory__main-meta-value">$96.00</span>
    										</div>
    									</div>
    									<footer class="alc-inventory__main-footer">
    										<a href="#" class="btn btn-default btn-icon"><i class="fas fa-times"></i> Remove From Bag</a>
    									</footer>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!-- Items / End -->
    
    				<!-- Cart Subtotal -->
    				<div class="card__subheader card__subheader--sm card__subheader--nomargins card__subheader--side card__subheader--flex">
    					<h5>Inventory Subtotal:</h5>
    					<h5>$256.30</h5>
    				</div>
    				<!-- Cart Subtotal / End -->
    
    				<!-- Calculation -->
    				<div class="card__content-inner">
    					<div class="row">
    						<div class="col-lg-4">
    							<form action="#" class="coupon-code-form coupon-code-form--inline">
    								<div class="row">
    									<div class="col-md-8">
    										<div class="coupon-code-form-inner">
    											<input type="text" class="form-control input-sm" placeholder="Enter your Coupon Code">
    										</div>
    									</div>
    									<div class="col-md-4">
    										<button class="btn btn-sm btn-primary-inverse btn-block">Redeem Coupon</button>
    									</div>
    								</div>
    							</form>
    						</div>
    						<div class="col-lg-8">
    							<form action="#" class="shipping-calculation-form">
    								<div class="row">
    									<div class="col-md-3">
    										<select name="account-country" id="account-country" class="form-control input-sm">
    											<option value="0">Select your country</option>
    											<option value="Canada">Canada</option>
    											<option value="Italy">Italy</option>
    											<option value="Spain">Spain</option>
    											<option value="Greece">Greece</option>
    										</select>
    									</div>
    									<div class="col-md-3">
    										<select name="account-city" id="account-city" class="form-control input-sm">
    											<option value="0">Select your city</option>
    											<option value="1">New York</option>
    											<option value="2">Barcelona</option>
    											<option value="3">Paris</option>
    											<option value="4">London</option>
    										</select>
    									</div>
    									<div class="col-md-3">
    										<input type="text" class="form-control input-sm" placeholder="Your ZIP Code...">
    									</div>
    									<div class="col-md-3">
    										<button type="submit" class="btn btn-primary btn-sm btn-block">Calculate Shipping</button>
    									</div>
    								</div>
    							</form>
    						</div>
    					</div>
    				</div>
    				<!-- Calculation / End -->
    
    			</div>
    		</div>
    		<!-- Inventory / End -->
    
    		<!-- Cart Totals -->
    		<div class="card card--has-table">
    			<div class="card__header">
    				<h4>Inventory Totals</h4>
    			</div>
    			<div class="card__content">
    
    				<!-- Checkout Review Order -->
    				<div class="df-checkout-review-order">
    					<div class="table-responsive">
    						<table class="df-checkout-review-order-table table">
    							<tfoot>
    								<tr class="cart-subtotal">
    									<th>Inventory Subtotal:</th>
    									<td>
    										<span class="amount">
    											<span class="df-Price-currencySymbol">$</span>256.30
    										</span>
    									</td>
    								</tr>
    								<tr class="coupon">
    									<th>Coupon Discount:</th>
    									<td>
    										<span class="amount">
    											-<span class="df-Price-currencySymbol">$</span>10.00
    										</span>
    									</td>
    								</tr>
    								<tr class="shipping">
    									<th>Shipping &amp; Handlings</th>
    									<td>
    										<span class="amount">
    											<span class="df-Price-currencySymbol">$</span>30.00
    										</span>
    									</td>
    								</tr>
    								<tr class="order-total">
    									<th>Inventory Total:</th>
    									<td>
    										<span class="amount">
    											<span class="df-Price-currencySymbol">$</span>276.30
    										</span>
    									</td>
    								</tr>
    							</tfoot>
    						</table>
    					</div>
    				</div>
    				<!-- Checkout Review Order / End -->
    
    			</div>
    		</div>
    		<!-- Cart Totals / End -->
    
    		<!-- Checkout Payment -->
    		<div class="df-checkout-payment">
    			<div class="place-order text-center">
    				<input type="submit" class="btn btn-primary" name="df_checkout_place_order" id="place_order" value="Proceed to Checkout">
    			</div>
    		</div>
    		<!-- Checkout Payment / End -->
    
    	</div>
    </div>
    
    <!-- Content / End -->
    
@endsection

