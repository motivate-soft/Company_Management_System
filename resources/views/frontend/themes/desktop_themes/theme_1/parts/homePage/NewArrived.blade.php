<!-- New Arrived Starts -->
<div class="card__content">
	<header class="card__header card__header--shop-filter" style="margin-bottom: 25px;">

		<div class="shop-filter">
			<h5 class="shop-filter__result" style="font-size: 24px;">New Arrived</h5>

		</div>

	</header>
</div>
<div class="row">
	<!-- Products -->
	<ul class="products products--grid products--grid-4 products--grid-simple">
        @foreach($products as $product)
        @php
            $images = explode(',', $product->image);
        @endphp
		<!-- Product #0 -->
		<li class="product__item">

			<div class="product__img">
				<div class="product__thumb">
					<img src="{{asset('uploads/product_images/'.$images[0])}}" alt="@if(app()->getLocale() == "en") {{$product->name}} @else {{$product->name_ar}} @endif">
				</div>
				<div class="product__overlay">
					<div class="product__btns">
						<a href="{{route('product',$product->id)}}" class="btn btn-primary-inverse btn-block btn-icon"><i class="icon-bag"></i> Add to your bag</a>
						<a href="_esports_shop-wishlist.html" class="btn btn-primary btn-block btn-icon"><i class="icon-heart"></i> Add to wishlist</a>
					</div>
				</div>
			</div>

			<div class="product__content card__content">
				<div class="product__header">
					<div class="product__header-inner">
						<h2 class="product__title">
						    <a href="{{route('product',$product->id)}}">
						        @if(app()->getLocale() == "en")
						            {{$product->name}}
						        @else
						            {{$product->name_ar}}
						        @endif
					        </a>
						</h2>
						<div class="product__ratings">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="product__price">
							${{$product->price}}
						</div>
					</div>
				</div>
			</div>
		</li>
		<!-- Product #0 / End -->
		@endforeach
		
	</ul>
	<!-- Products / End -->
</div>
<!-- New Arrived Ends -->