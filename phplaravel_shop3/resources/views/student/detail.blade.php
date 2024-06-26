<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title>Flipmart premium HTML5 & CSS3 Template</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="\assets\css\bootstrap.min.css">

	<!-- Customizable CSS -->
	<link rel="stylesheet" href="\assets\css\main.css">
	<link rel="stylesheet" href="\assets\css\blue.css">
	<link rel="stylesheet" href="\assets\css\owl.carousel.css">
	<link rel="stylesheet" href="\assets\css\owl.transitions.css">
	<link rel="stylesheet" href="\assets\css\animate.min.css">
	<link rel="stylesheet" href="\assets\css\rateit.css">
	<link rel="stylesheet" href="\assets\css\bootstrap-select.min.css">
	<link href="\assets\css\lightbox.css" rel="stylesheet">



	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="\assets\css\font-awesome.css">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>

<body class="cnt-home">
	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">

		<!-- ============================================== TOP MENU ============================================== -->
		<div class="top-bar animate-dropdown">
			<div class="container">
				<div class="header-top-inner">
					<div class="cnt-account">
						<ul class="list-unstyled">
							@auth
							@if(Auth::user()->UserType === 2)
							<li><a href="{{ route('profile.student') }}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a></li>
							@elseif(Auth::user()->UserType === 3)
							<li><a href="{{ route('profile.external') }}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a></li>
							@elseif(Auth::user()->TypeID === null)
							<li><a href="#"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a></li>
							@else
							<li><a href="#"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a></li>
							@endif
							<li><a href="{{ route('logout') }}"><i class="icon fa fa-lock"></i>Logout</a></li>
							@else
							<li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
							<li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
							@endauth

							<div class="cnt-block">
								<ul class="list-unstyled list-inline">
									<li class="dropdown dropdown-small">
										<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="#">USD</a></li>
											<li><a href="#">INR</a></li>
											<li><a href="#">GBP</a></li>
										</ul>
									</li>

									<li class="dropdown dropdown-small">
										<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="#">English</a></li>
											<li><a href="#">French</a></li>
											<li><a href="#">German</a></li>
										</ul>
									</li>
								</ul><!-- /.list-unstyled -->
							</div><!-- /.cnt-cart -->
							<div class="clearfix"></div>
					</div><!-- /.header-top-inner -->
				</div><!-- /.container -->
			</div><!-- /.header-top -->
			<!-- ============================================== TOP MENU : END ============================================== -->
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
							<!-- ============================================================= LOGO ============================================================= -->
							<div class="logo">
								<a href="home.html">

									<img src="\assets\images\logo.png" alt="">

								</a>
							</div><!-- /.logo -->
							<!-- ============================================================= LOGO : END ============================================================= -->
						</div><!-- /.logo-holder -->

						<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
							<!-- /.contact-row -->
							<!-- ============================================================= SEARCH AREA ============================================================= -->
							<div class="search-area">
								<form>
									<div class="control-group">

										<ul class="categories-filter animate-dropdown">
											<li class="dropdown">

												<a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

												<ul class="dropdown-menu" role="menu">
													<li class="menu-header">Computer</li>
													<li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
													<li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
													<li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
													<li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>

												</ul>
											</li>
										</ul>

										<input class="search-field" placeholder="Search here...">

										<a class="search-button" href="#"></a>

									</div>
								</form>
							</div><!-- /.search-area -->
							<!-- ============================================================= SEARCH AREA : END ============================================================= -->
						</div><!-- /.top-search-holder -->

						<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
							<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

							<div class="dropdown dropdown-cart">
								<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
									<div class="items-cart-inner">
										<div class="basket">
											<i class="glyphicon glyphicon-shopping-cart"></i>
										</div>
										<div class="basket-item-count"><span class="count"></span></div>
										<div class="total-price-basket">
											<span class="lbl">cart -</span>
											<span class="total-price">
												<span class="sign">$</span><span class="value"></span>
											</span>
										</div>


									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="cart-item product-summary">
											<div class="row">
												<div class="col-xs-4">
													<div class="image">
														<a href="detail.html"><img src="\assets\images\cart.jpg" alt=""></a>
													</div>
												</div>
												<div class="col-xs-7">

													<h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
													<div class="price"></div>
												</div>
												<div class="col-xs-1 action">
													<a href="#"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</div><!-- /.cart-item -->
										<div class="clearfix"></div>
										<hr>

										<div class="clearfix cart-total">
											<div class="pull-right">

												<span class="text">Sub Total :</span><span class='price'></span>

											</div>
											<div class="clearfix"></div>

											<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
										</div><!-- /.cart-total-->


									</li>
								</ul><!-- /.dropdown-menu-->
							</div><!-- /.dropdown-cart -->

							<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
						</div><!-- /.top-cart-row -->
					</div><!-- /.row -->

				</div><!-- /.container -->

			</div><!-- /.main-header -->

			<!-- ============================================== NAVBAR ============================================== -->
			@include('Trangchu.layout.headerpage')
		</div>
		</div>

		</div><!-- /.navbar-collapse -->


		</div><!-- /.nav-bg-class -->
		</div><!-- /.navbar-default -->
		</div><!-- /.container-class -->

		</div><!-- /.header-nav -->
		<!-- ============================================== NAVBAR : END ============================================== -->

	</header>

	<!-- ============================================== HEADER : END ============================================== -->
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="/">Home</a></li>
					<li><a href="#">Products</a></li>
					<li class='active'>{{ $product->name }}</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row single-product'>
				<div class='col-md-3 sidebar'>
					<div class="sidebar-module-container">
						<div class="home-banner outer-top-n">
							<img src="\assets\images\banners\LHS-banner.jpg" alt="Image">
						</div>
						<!-- ============================================== HOT DEALS ============================================== -->
						<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
							<h3 class="section-title">hot deals</h3>
							<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

								<div class="item">
									<div class="products">
										<div class="hot-deal-wrapper">
											<div class="image">
												<img src="\assets\images\hot-deals\p5.jpg" alt="">
											</div>
											<div class="sale-offer-tag"><span>35%<br>off</span></div>
											<div class="timing-wrapper">
												<div class="box-wrapper">
													<div class="date box">
														<span class="key">120</span>
														<span class="value">Days</span>
													</div>
												</div>

												<div class="box-wrapper">
													<div class="hour box">
														<span class="key">20</span>
														<span class="value">HRS</span>
													</div>
												</div>

												<div class="box-wrapper">
													<div class="minutes box">
														<span class="key">36</span>
														<span class="value">MINS</span>
													</div>
												</div>

												<div class="box-wrapper hidden-md">
													<div class="seconds box">
														<span class="key">60</span>
														<span class="value">SEC</span>
													</div>
												</div>
											</div>
										</div><!-- /.hot-deal-wrapper -->

										<div class="product-info text-left m-t-20">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>

											<div class="product-price">
												<span class="price">
													$600.00
												</span>

												<span class="price-before-discount">$800.00</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->

										<div class="cart clearfix animate-effect">
											<div class="action">

												<div class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
														<i class="fa fa-shopping-cart"></i>
													</button>
													<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

												</div>

											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div>
								</div>
								<div class="item">
									<div class="products">
										<div class="hot-deal-wrapper">
											<div class="image">
												<img src="\assets\images\products\p6.jpg" alt="">
											</div>
											<div class="sale-offer-tag"><span>35%<br>off</span></div>
											<div class="timing-wrapper">
												<div class="box-wrapper">
													<div class="date box">
														<span class="key">120</span>
														<span class="value">Days</span>
													</div>
												</div>

												<div class="box-wrapper">
													<div class="hour box">
														<span class="key">20</span>
														<span class="value">HRS</span>
													</div>
												</div>

												<div class="box-wrapper">
													<div class="minutes box">
														<span class="key">36</span>
														<span class="value">MINS</span>
													</div>
												</div>

												<div class="box-wrapper hidden-md">
													<div class="seconds box">
														<span class="key">60</span>
														<span class="value">SEC</span>
													</div>
												</div>
											</div>
										</div><!-- /.hot-deal-wrapper -->

										<div class="product-info text-left m-t-20">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>

											<div class="product-price">
												<span class="price">
													$600.00
												</span>

												<span class="price-before-discount">$800.00</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->

										<div class="cart clearfix animate-effect">
											<div class="action">

												<div class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
														<i class="fa fa-shopping-cart"></i>
													</button>
													<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

												</div>

											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div>
								</div>
								<div class="item">
									<div class="products">
										<div class="hot-deal-wrapper">
											<div class="image">
												<img src="\assets\images\products\p7.jpg" alt="">
											</div>
											<div class="sale-offer-tag"><span>35%<br>off</span></div>
											<div class="timing-wrapper">
												<div class="box-wrapper">
													<div class="date box">
														<span class="key">120</span>
														<span class="value">Days</span>
													</div>
												</div>

												<div class="box-wrapper">
													<div class="hour box">
														<span class="key">20</span>
														<span class="value">HRS</span>
													</div>
												</div>

												<div class="box-wrapper">
													<div class="minutes box">
														<span class="key">36</span>
														<span class="value">MINS</span>
													</div>
												</div>

												<div class="box-wrapper hidden-md">
													<div class="seconds box">
														<span class="key">60</span>
														<span class="value">SEC</span>
													</div>
												</div>
											</div>
										</div><!-- /.hot-deal-wrapper -->

										<div class="product-info text-left m-t-20">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>

											<div class="product-price">
												<span class="price">
													$600.00
												</span>

												<span class="price-before-discount">$800.00</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->

										<div class="cart clearfix animate-effect">
											<div class="action">

												<div class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
														<i class="fa fa-shopping-cart"></i>
													</button>
													<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

												</div>

											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div>
								</div>


							</div><!-- /.sidebar-widget -->
						</div>
						<!-- ============================================== HOT DEALS: END ============================================== -->

						<!-- ============================================== NEWSLETTER ============================================== -->
						<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
							<h3 class="section-title">Newsletters</h3>
							<div class="sidebar-widget-body outer-top-xs">
								<p>Sign Up for Our Newsletter!</p>
								<form>
									<div class="form-group">
										<label class="sr-only" for="exampleInputEmail1">Email address</label>
										<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
									</div>
									<button class="btn btn-primary">Subscribe</button>
								</form>
							</div><!-- /.sidebar-widget-body -->
						</div><!-- /.sidebar-widget -->
						<!-- ============================================== NEWSLETTER: END ============================================== -->

						<!-- ============================================== Testimonials============================================== -->
						<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
							<div id="advertisement" class="advertisement">
								<div class="item">
									<div class="avatar"><img src="\assets\images\testimonials\member1.png" alt="Image"></div>
									<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
									<div class="clients_author">John Doe <span>Abc Company</span> </div><!-- /.container-fluid -->
								</div><!-- /.item -->

								<div class="item">
									<div class="avatar"><img src="\assets\images\testimonials\member3.png" alt="Image"></div>
									<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
									<div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
								</div><!-- /.item -->

								<div class="item">
									<div class="avatar"><img src="\assets\images\testimonials\member2.png" alt="Image"></div>
									<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
									<div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div><!-- /.container-fluid -->
								</div><!-- /.item -->

							</div><!-- /.owl-carousel -->
						</div>

						<!-- ============================================== Testimonials: END ============================================== -->



					</div>
				</div><!-- /.sidebar -->
				<div class='col-md-9'>
					<div class="detail-block">
						<div class="row  wow fadeInUp">

							<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
								<div class="product-item-holder size-big single-product-gallery small-gallery">

									<div id="owl-single-product">
										<div class="single-product-gallery-item" id="slide1">
											<a data-lightbox="image-1" data-title="Gallery">
												<img src="{{ asset($product->image_path) }}" alt="Product Image" width="100%">
											</a>
										</div>
									</div>
									<div class="single-product-gallery-thumbs gallery-thumbs">


									</div>

								</div>
							</div>
							<div class='col-sm-6 col-md-7 product-info-block'>
								<div class="product-info">
									<h1 class="name">{{ $product->name }}</h1>

									<div class="rating-reviews m-t-20">
										<div class="row">
											<div class="col-sm-3">
												<div class="rating rateit-small"></div>
											</div>
											<div class="col-sm-8">
												<div class="reviews">
													<a href="#" class="lnk">(13 Reviews)</a>
												</div>
											</div>
										</div>
									</div>
									<div class="stock-container info-container m-t-10">
										<div class="row">
											<div class="col-sm-9">
												<div class="stock-box">
													<p>Type :{{ $product->product_type }}</p>
													<p>Description:{{$product->description }}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="description-container m-t-20">
									</div>
									<div class="price-container info-container m-t-20">
										<div class="row">
											<div class="col-sm-6">
												<div class="price-box">
													<span class="price">Price: ${{ $product->price }}</span>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="favorite-button m-t-10">
													<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
														<i class="fa fa-heart"></i>
													</a>
													<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
														<i class="fa fa-signal"></i>
													</a>
													<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
														<i class="fa fa-envelope"></i>
													</a>
												</div>
											</div>

										</div><!-- /.row -->
									</div><!-- /.price-container -->

									<div class="quantity-container info-container">
										<div class="row">


											<div class="col-sm-7">
												<a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
											</div>


										</div><!-- /.row -->
									</div><!-- /.quantity-container -->
									<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img class="img-profile rounded-circle" src="/img/undraw_profile.svg" width="15%">
										<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $product->user->name }}</span>
									</a>






								</div><!-- /.product-info -->
							</div><!-- /.col-sm-7 -->
						</div><!-- /.row -->
					</div>

					<div class="product-tabs inner-bottom-xs  wow fadeInUp">
						<div class="row">
							<div class="col-sm-3">
								<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
									<li><a data-toggle="tab" href="#review">REVIEW</a></li>
									<li><a data-toggle="tab" href="#tags">TAGS</a></li>
								</ul><!-- /.nav-tabs #product-tabs -->
							</div>
							<div class="col-sm-9">

								<div class="tab-content">


									<div id="review" class="tab-pane">
										<div class="product-tab">

											<div class="product-reviews">
												<h4 class="title">Customer Reviews</h4>

												<div class="reviews">
													<div class="review">
														<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
														<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
													</div>

												</div><!-- /.reviews -->
											</div><!-- /.product-reviews -->



											<div class="product-add-review">
												<h4 class="title">Write your own review</h4>
												<div class="review-table">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th class="cell-label">&nbsp;</th>
																	<th>1 star</th>
																	<th>2 stars</th>
																	<th>3 stars</th>
																	<th>4 stars</th>
																	<th>5 stars</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="cell-label">Quality</td>
																	<td><input type="radio" name="quality" class="radio" value="1"></td>
																	<td><input type="radio" name="quality" class="radio" value="2"></td>
																	<td><input type="radio" name="quality" class="radio" value="3"></td>
																	<td><input type="radio" name="quality" class="radio" value="4"></td>
																	<td><input type="radio" name="quality" class="radio" value="5"></td>
																</tr>
																<tr>
																	<td class="cell-label">Price</td>
																	<td><input type="radio" name="quality" class="radio" value="1"></td>
																	<td><input type="radio" name="quality" class="radio" value="2"></td>
																	<td><input type="radio" name="quality" class="radio" value="3"></td>
																	<td><input type="radio" name="quality" class="radio" value="4"></td>
																	<td><input type="radio" name="quality" class="radio" value="5"></td>
																</tr>
																<tr>
																	<td class="cell-label">Value</td>
																	<td><input type="radio" name="quality" class="radio" value="1"></td>
																	<td><input type="radio" name="quality" class="radio" value="2"></td>
																	<td><input type="radio" name="quality" class="radio" value="3"></td>
																	<td><input type="radio" name="quality" class="radio" value="4"></td>
																	<td><input type="radio" name="quality" class="radio" value="5"></td>
																</tr>
															</tbody>
														</table><!-- /.table .table-bordered -->
													</div><!-- /.table-responsive -->
												</div><!-- /.review-table -->

												<div class="review-form">
													<div class="form-container">
														<form role="form" class="cnt-form">

															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																		<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																	</div><!-- /.form-group -->
																	<div class="form-group">
																		<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																		<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																	</div><!-- /.form-group -->
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputReview">Review <span class="astk">*</span></label>
																		<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																	</div><!-- /.form-group -->
																</div>
															</div><!-- /.row -->

															<div class="action text-right">
																<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
															</div><!-- /.action -->

														</form><!-- /.cnt-form -->
													</div><!-- /.form-container -->
												</div><!-- /.review-form -->

											</div><!-- /.product-add-review -->

										</div><!-- /.product-tab -->
									</div><!-- /.tab-pane -->

									<div id="tags" class="tab-pane">
										<div class="product-tag">

											<h4 class="title">Product Tags</h4>
											<form role="form" class="form-inline form-cnt">
												<div class="form-container">

													<div class="form-group">
														<label for="exampleInputTag">Add Your Tags: </label>
														<input type="email" id="exampleInputTag" class="form-control txt">


													</div>

													<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
												</div><!-- /.form-container -->
											</form><!-- /.form-cnt -->

											<form role="form" class="form-inline form-cnt">
												<div class="form-group">
													<label>&nbsp;</label>
													<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
												</div>
											</form><!-- /.form-cnt -->

										</div><!-- /.product-tab -->
									</div><!-- /.tab-pane -->

								</div><!-- /.tab-content -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.product-tabs -->

					<!-- ============================================== UPSELL PRODUCTS ============================================== -->
					<section class="section featured-product wow fadeInUp">
						<h3 class="section-title">upsell products</h3>
						<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

							<div class="item item-carousel">
								<div class="products">

									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img src="\assets\images\products\p1.jpg" alt=""></a>
											</div><!-- /.image -->

											<div class="tag sale"><span>sale</span></div>
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">
												<span class="price">
													$650.99 </span>
												<span class="price-before-discount">$ 800</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

													</li>

													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->

							<div class="item item-carousel">
								<div class="products">

									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img src="\assets\images\products\p2.jpg" alt=""></a>
											</div><!-- /.image -->

											<div class="tag sale"><span>sale</span></div>
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">
												<span class="price">
													$650.99 </span>
												<span class="price-before-discount">$ 800</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

													</li>

													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->

							<div class="item item-carousel">
								<div class="products">

									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img src="\assets\images\products\p3.jpg" alt=""></a>
											</div><!-- /.image -->

											<div class="tag hot"><span>hot</span></div>
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">
												<span class="price">
													$650.99 </span>
												<span class="price-before-discount">$ 800</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

													</li>

													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->

							<div class="item item-carousel">
								<div class="products">

									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img src="\assets\images\products\p4.jpg" alt=""></a>
											</div><!-- /.image -->

											<div class="tag new"><span>new</span></div>
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">
												<span class="price">
													$650.99 </span>
												<span class="price-before-discount">$ 800</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

													</li>

													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->

							<div class="item item-carousel">
								<div class="products">

									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img src="assets\images\blank.gif" data-echo="assets/images/products/p5.jpg" alt=""></a>
											</div><!-- /.image -->

											<div class="tag hot"><span>hot</span></div>
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">
												<span class="price">
													$650.99 </span>
												<span class="price-before-discount">$ 800</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

													</li>

													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->

							<div class="item item-carousel">
								<div class="products">

									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.html"><img src="assets\images\blank.gif" data-echo="assets/images/products/p6.jpg" alt=""></a>
											</div><!-- /.image -->

											<div class="tag new"><span>new</span></div>
										</div><!-- /.product-image -->


										<div class="product-info text-left">
											<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>

											<div class="product-price">
												<span class="price">
													$650.99 </span>
												<span class="price-before-discount">$ 800</span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

													</li>

													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>

													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div><!-- /.item -->
						</div><!-- /.home-owl-carousel -->
					</section><!-- /.section -->
					<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

				</div><!-- /.col -->
				<div class="clearfix"></div>
			</div><!-- /.row -->
			<!-- ============================================== BRANDS CAROUSEL ============================================== -->
			<div id="brands-carousel" class="logo-slider wow fadeInUp">

				<div class="logo-slider-inner">
					<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
						<div class="item m-t-15">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item m-t-10">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand3.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand6.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#" class="image">
								<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
							</a>
						</div><!--/.item-->
					</div><!-- /.owl-carousel #logo-slider -->
				</div><!-- /.logo-slider-inner -->

			</div><!-- /.logo-slider -->
			<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
		</div><!-- /.container -->
	</div><!-- /.body-content -->

	<!-- ============================================================= FOOTER ============================================================= -->
	<footer id="footer" class="footer color-bg">


		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="module-heading">
							<h4 class="module-title">Contact Us</h4>
						</div><!-- /.module-heading -->

						<div class="module-body">
							<ul class="toggle-footer" style="">
								<li class="media">
									<div class="pull-left">
										<span class="icon fa-stack fa-lg">
											<i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<div class="media-body">
										<p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
									</div>
								</li>

								<li class="media">
									<div class="pull-left">
										<span class="icon fa-stack fa-lg">
											<i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<div class="media-body">
										<p>+(888) 123-4567<br>+(888) 456-7890</p>
									</div>
								</li>

								<li class="media">
									<div class="pull-left">
										<span class="icon fa-stack fa-lg">
											<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
										</span>
									</div>
									<div class="media-body">
										<span><a href="#">flipmart@themesground.com</a></span>
									</div>
								</li>

							</ul>
						</div><!-- /.module-body -->
					</div><!-- /.col -->

					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="module-heading">
							<h4 class="module-title">Customer Service</h4>
						</div><!-- /.module-heading -->

						<div class="module-body">
							<ul class='list-unstyled'>
								<li class="first"><a href="#" title="Contact us">My Account</a></li>
								<li><a href="#" title="About us">Order History</a></li>
								<li><a href="#" title="faq">FAQ</a></li>
								<li><a href="#" title="Popular Searches">Specials</a></li>
								<li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
							</ul>
						</div><!-- /.module-body -->
					</div><!-- /.col -->

					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="module-heading">
							<h4 class="module-title">Corporation</h4>
						</div><!-- /.module-heading -->

						<div class="module-body">
							<ul class='list-unstyled'>
								<li class="first"><a title="Your Account" href="#">About us</a></li>
								<li><a title="Information" href="#">Customer Service</a></li>
								<li><a title="Addresses" href="#">Company</a></li>
								<li><a title="Addresses" href="#">Investor Relations</a></li>
								<li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
							</ul>
						</div><!-- /.module-body -->
					</div><!-- /.col -->

					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="module-heading">
							<h4 class="module-title">Why Choose Us</h4>
						</div><!-- /.module-heading -->

						<div class="module-body">
							<ul class='list-unstyled'>
								<li class="first"><a href="#" title="About us">Shopping Guide</a></li>
								<li><a href="#" title="Blog">Blog</a></li>
								<li><a href="#" title="Company">Company</a></li>
								<li><a href="#" title="Investor Relations">Investor Relations</a></li>
								<li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
							</ul>
						</div><!-- /.module-body -->
					</div>
				</div>
			</div>
		</div>

		<div class="copyright-bar">
			<div class="container">
				<div class="col-xs-12 col-sm-6 no-padding social">
					<ul class="link">
						<li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
						<li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
						<li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
						<li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
						<li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
						<li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
						<li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 no-padding">
					<div class="clearfix payment-methods">
						<ul>
							<li><img src="assets\images\payments\1.png" alt=""></li>
							<li><img src="assets\images\payments\2.png" alt=""></li>
							<li><img src="assets\images\payments\3.png" alt=""></li>
							<li><img src="assets\images\payments\4.png" alt=""></li>
							<li><img src="assets\images\payments\5.png" alt=""></li>
						</ul>
					</div><!-- /.payment-methods -->
				</div>
			</div>
		</div>
	</footer>
	<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->


	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="\assets\js\jquery-1.11.1.min.js"></script>

	<script src="\assets\js\bootstrap.min.js"></script>

	<script src="\assets\js\bootstrap-hover-dropdown.min.js"></script>
	<script src="\assets\js\owl.carousel.min.js"></script>

	<script src="\assets\js\echo.min.js"></script>
	<script src="\assets\js\jquery.easing-1.3.min.js"></script>
	<script src="\assets\js\bootstrap-slider.min.js"></script>
	<script src="\assets\js\jquery.rateit.min.js"></script>
	<script type="\text/javascript" src="assets\js\lightbox.min.js"></script>
	<script src="\assets\js\bootstrap-select.min.js"></script>
	<script src="\assets\js\wow.min.js"></script>
	<script src="\assets\js\scripts.js"></script>





</body>

</html>