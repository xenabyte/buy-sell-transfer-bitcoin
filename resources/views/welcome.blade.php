<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>BitPro || Exchanger</title>

	<!-- mobile responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="frontpage_assets/css/style.css">
	<link rel="stylesheet" href="frontpage_assets/css/responsive.css">
	<link rel="stylesheet" href="frontpage_assets/fonts/flaticon.css" />
	<link rel="stylesheet" href="frontpage_assets/style.css">
	<!--favicon-->
	<link rel="apple-touch-icon" sizes="180x180" href="frontpage_assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="frontpage_assets/images/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="frontpage_assets/images/favicon/favicon-16x16.png" sizes="16x16">
</head>

<body>
	<div class="boxed_wrapper">
		<div class="header-top">
			<div class="container clearfix">
				<!--Top Left-->
				<div class="top-left pull-left">
					<ul class="links-nav clearfix">
						<li><a href="#"><span class="fa fa-phone"></span> Call:  123 4561 5523 </a></li>
						<li><a href="#"><span class="fa fa-envelope"></span>Email:  info@yourdomain.com</a></li>
					</ul>
				</div>
				<!--Top Right-->
                    <div class="top-right pull-right">
					<div class="social-links clearfix">
						<a href="#"><span class="fa fa-facebook-f"></span></a>
						<a href="#"><span class="fa fa-twitter"></span></a>
						<a href="#"><span class="fa fa-linkedin"></span></a>
						<a href="#"><span class="fa fa-instagram"></span></a>
						<a href="#"><span class="fa fa-pinterest-p"></span></a>
					</div>
				</div>
			</div>
		</div><!-- Header Top End -->

		<div class="mainmenu-area stricky">
		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-5">
						<div class="main-logo">
							<a href="index.html"><img  src="frontpage_assets/images/logo/logo.png" alt=""></a>
						</div>
					</div>
					<div class="col-md-5 menu-column">
						<nav class="main-menu">
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				            </div>
				            <div class="navbar-collapse collapse clearfix">
				                <ul class="navigation clearfix">
				                    <li class="current"><a href="{{ url('/') }}">home</a> </li>
				                    <li><a href="about.html">about</a></li>
				                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
				                </ul>

				                <ul class="mobile-menu clearfix">

				                    <li class="current"><a href="#">home</a></li>
				                    <li><a href="about.html">about</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
				                </ul>
				            </div>
				        </nav>
					</div>
					<div class="col-md-2">
						<div class="right-area">
                            <div class="link_btn float_right">
                                <a class="thm-btn" href="{{ route('register') }}">Register</a>
                            </div>
						</div>
					</div>
		    	</div>

		    </div>
		</div>


		<!--Start rev slider wrapper-->
		<section class="rev_slider_wrapper">
			<div id="slider1" class="rev_slider"  data-version="5.0">
				<ul>

					<li data-transition="fade">
						<img  src="frontpage_assets/images/slider/3.jpg"  alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >

						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="190"
							data-transform_idle="o:1;"
							data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h1>Invest in Bitcoin</h1>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="280"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h2>Easy Way to Trade Bitcoin</h2>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="340"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<p>Excepteur sint occaecat cupidatat non proident, culpa qui officia deserunt mollit<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti cum consectetur odit.</p>
							</div>
						</div>
						<div class="tp-caption tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="430"
							data-transform_idle="o:1;"
							data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-splitin="none"
							data-splitout="none"
							data-responsive_offset="on"
							data-start="2300">
							<div class="slide-content-box">
								<div class="button">
									<a class="thm-btn yellow-bg" href="contact.html">Contact us</a>
                                    <a class="thm-btn yellow-bg" href="contact.html">About us</a>
								</div>
							</div>
						</div>

					</li>
					<li data-transition="fade">
						<img  src="frontpage_assets/images/slider/2.jpg"  alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >

						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="190"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h1>Bitcoin Mining & Trade </h1>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="280"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h2>Easy Way to Trade Bitcoin</h2>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="340"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<p>Excepteur sint occaecat cupidatat non proident, culpa qui officia deserunt mollit<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti cum consectetur odit.</p>
							</div>
						</div>
						<div class="tp-caption tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="430"
							data-transform_idle="o:1;"
							data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-splitin="none"
							data-splitout="none"
							data-responsive_offset="on"
							data-start="2300">
							<div class="slide-content-box">
								<div class="button">
									<a class="thm-btn yellow-bg"  href="{{ route('login') }}">Login</a>
                                    <a class="thm-btn yellow-bg"  href="{{ route('register') }}">Register</a>
								</div>
							</div>
						</div>

					</li>
					<li data-transition="fade">
						<img  src="frontpage_assets/images/slider/1.jpg"  alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >

						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="190"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h1>Invest in Cryptocurrency</h1>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="280"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<h2>Easy Way to Trade Bitcoin</h2>
							</div>
						</div>
						<div class="tp-caption  tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="340"
							data-transform_idle="o:1;"
							data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
							data-splitin="none"
							data-splitout="none"
							data-start="700">
							<div class="slide-content-box">
								<p>Excepteur sint occaecat cupidatat non proident, culpa qui officia deserunt mollit<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti cum consectetur odit.</p>
							</div>
						</div>
						<div class="tp-caption tp-resizeme"
							data-x="center" data-hoffset="55"
							data-y="top" data-voffset="430"
							data-transform_idle="o:1;"
							data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
							data-splitin="none"
							data-splitout="none"
							data-responsive_offset="on"
							data-start="2300">
							<div class="slide-content-box">
								<div class="button">
                                    <a class="thm-btn yellow-bg"  href="{{ route('login') }}">Login</a>
                                    <a class="thm-btn yellow-bg"  href="{{ route('register') }}">Register</a>
								</div>
							</div>
						</div>

					</li>
				</ul>
			</div>
		</section>
		<!--End rev slider wrapper-->

		<section class="about">
			<div class="container">
				<div class="item-list">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<!--Fact Counter-->
							<div class="fact-counter">
								<div class="row">
									<!--Column-->
									<div class="column counter-column col-md-3 col-xs-6 wow fadeIn" data-wow-duration="600ms">
										<div class="item">
											<div class="inner-box">
												<div class="icon-box">
													<i class="fa fa-globe" aria-hidden="true"></i>
												</div>
												<div class="count-outer">
													<span class="count-text" data-speed="3000" data-stop="950">0</span>
													<p>Support Countries</p>
												</div>
											</div>
										</div>
									</div>

									<!--Column-->
									<div class="column counter-column col-md-3 col-xs-6 wow fadeIn" data-wow-duration="900ms">
										<div class="item">
											<div class="inner-box">
												<div class="icon-box">
													<i class="fa fa-pie-chart" aria-hidden="true"></i>
												</div>
												<div class="count-outer">
													<span class="count-text" data-speed="3000" data-stop="1650">0</span>
													<p>Operators</p>
												</div>
											</div>
										</div>
									</div>
									<div class="column counter-column col-md-3 col-xs-6  wow fadeIn" data-wow-duration="900ms">
										<div class="item">
											<div class="inner-box">
												<div class="icon-box">
													<i class="fa fa-btc" aria-hidden="true"></i>
												</div>
												<div class="count-outer">
													<span class="count-text" data-speed="3000" data-stop="1650">0</span>
													<p>BitCoin ATMs</p>
												</div>
											</div>
										</div>
									</div>

									<!--Column-->
									<div class="column counter-column col-md-3 col-xs-6 wow fadeIn" data-wow-duration="300ms">
										<div class="item">
											<div class="inner-box">
												<div class="icon-box">
													<i class="fa fa-stack-exchange" aria-hidden="true"></i>
												</div>
												<div class="count-outer">
													<span class="count-text" data-speed="3000" data-stop="2500">0</span>
													<p>Producers</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="about next_about about-2">
			<div class="about_overlay">
			<div class="container">
				<div class="item-list">
					<div class="row">
						<div class="col-md-7 col-xs-12 ask-question">
							 <div class="row">
							   <div class="col-md-12 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
								 <!--ask item -->
								 <div class="ask-box active">
									<div class="ask-circle">
									  <span class="fa fa-search"></span>
									</div>
									<div class="ask-info">
									    <h3 class="text-white">ARE YOU LOOKING FOR A CONSALTING?</h3>
									</div>
									<div class="ask-arrow">
									  <a href="#"><span class="fa fa-angle-right"></span></a>
									</div>
								 </div>
							   </div>

							 </div>
							 <div class="row">
								<div class="col-md-12 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
								 <!--ask item -->
								 <div class="ask-box active mt-30">
									<div class="ask-circle">
									  <span class="fa fa-usd"></span>
									</div>
									<div class="ask-info">
									    <h3 class="text-white">LOOKING FOR EARNING MORE MONEY ?</h3>
									</div>
									<div class="ask-arrow">
									  <a href="#"><span class="fa fa-angle-right"></span></a>
									</div>
								 </div>
							   </div>
							 </div>
						</div>
						<div class="col-md-5 col-xs-12">
							<div class="item">
								<div class="sec-title">
									<h2 class="left">WHAT IS BITCOIN</h2>
								</div>
								<div class="content-box">
									<h4>A New Kind of Money</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam earum, provident ad, porro aperiam dolore, blanditiis, nihil pariatur eius adipisci consequuntur officiis. Excepturi, nostrum? Id incidunt nesciunt officia hic distinctio nihil pariatur.</p>
									<a href="#" class="thm-btn">Join Us Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>


		<section id="how-it-work" class="how-it-work">
          	<div class="container text-center">
            	<div class="sec-title">
					<h2 class="center">Our Process</h2>
				</div>
	            <div class="how-one-container">
	                <!--how it work Box-->
	                <div class="how-box-one col-md-4 col-sm-6 col-xs-12">
	                   <div class="inner-box">
	                      <div class="icon-box">
	                         <i class="fa fa-male" aria-hidden="true"></i>
	                      </div>
	                      <h4><a href="#">create your wallet</a></h4>
	                      <div class="text">Capitalise on low hanging fruit to identify a ballpark value added activity to beta test.</div>
	                   </div>
	                </div>

	                <!--how it work Box-->
	                <div class="how-box-one active col-md-4 col-sm-6 col-xs-12">
	                   <div class="inner-box">
	                      <div class="icon-box">
	                         <i class="fa fa-usd" aria-hidden="true"></i>
	                      </div>
	                      <h4><a href="#">make payments</a></h4>
	                      <div class="text">Capitalise on low hanging fruit to identify a ballpark value added activity to beta test.</div>
	                   </div>
	                </div>

	                <!--how it work Box-->
	                <div class="how-box-one col-md-4 col-sm-6 col-xs-12">
	                   <div class="inner-box">
	                      <div class="icon-box">
	                         <i class="fa fa-globe" aria-hidden="true"></i>
	                      </div>
	                      <h4><a href="#">Buy or Sell Orders</a></h4>
	                      <div class="text">Capitalise on low hanging fruit to identify a ballpark value added activity to beta test.</div>
	                   </div>
	                </div>

	            </div>
            </div>
        </section>

		<section class="our-services rotated-bg">
			<div class="container">
				<div class="sec-title">
					<h2 class="center choose_color">WHY CHOOSE US?</h2>
				</div>



				<div class="row clearfix">
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">

							<div class="service-left-bg"></div>
							<div class="service-icon">
								<i class="fa fa-user-secret" aria-hidden="true"></i>
							</div>
							<div class="service-text">
								<h4><a href="service-single.html">Safe and Secure</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolorem dicta libero veritatis reiciendis quis pariatur magni.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">

							<div class="service-left-bg"></div>
							<div class="service-icon">
								<i class="fa fa-mobile" aria-hidden="true"></i>
							</div>
							<div class="service-text">
								<h4><a href="service-single.html">Mobile App</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolorem dicta libero veritatis reiciendis quis pariatur magni.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">

							<div class="service-left-bg"></div>
							<div class="service-icon">
								<i class="fa fa-google-wallet" aria-hidden="true"></i>
							</div>
							<div class="service-text">
								<h4><a href="service-single.html">Secure Wallet</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolorem dicta libero veritatis reiciendis quis pariatur magni.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">

							<div class="service-left-bg"></div>
							<div class="service-icon">
								<i class="fa fa-life-ring" aria-hidden="true"></i>
							</div>
							<div class="service-text">
								<h4><a href="service-single.html">Covered By Insurance</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolorem dicta libero veritatis reiciendis quis pariatur magni.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">

							<div class="service-left-bg"></div>
							<div class="service-icon">
								<i class="fa fa-exchange" aria-hidden="true"></i>
							</div>
							<div class="service-text">
								<h4><a href="service-single.html">Recurring Buying</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolorem dicta libero veritatis reiciendis quis pariatur magni.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
					<!--Start single service icon-->
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="single-service-item">

							<div class="service-left-bg"></div>
							<div class="service-icon">
								<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
							</div>
							<div class="service-text">
								<h4><a href="service-single.html">Instant Exchange</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolorem dicta libero veritatis reiciendis quis pariatur magni.</p>
							</div>
						</div>
					</div>
					<!--End single service icon-->
				</div>
			</div>
		</section>

		<section class="call-to-action subscribe-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h3>Open account for free and start trading Bitcoins now!</h3>
					</div>
					<div class="col-md-3">
						<a href="contact.html" class="thm-btn inverse pull-right">START NOW</a>
					</div>
				</div>
			</div>
		</section>

		<section class="latest-news">
			<div class="container">
				<div class="sec-title">
					<h2 class="left">News & Events</h2>
				</div>
				<div class="latest-news-carousel owl-carousel owl-theme">

					<div class="item">
						<figure class="image-box">
							<img  src="frontpage_assets/images/news/3.jpg" alt="Awesome Image">
						</figure>
						<div class="date">
							<h5>15</h5>
							<p>sep</p>
						</div>
						<ul class="admin-comments">
							<li><i class="icon flaticon-black">by Admin</i></li>
							<li><i class="icon flaticon-comments">Comments 67</i></li>
						</ul>
						<div class="post-content">
							<h4><a href="blog-details.html">This is a standard post with thumbnail</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
						</div>
					</div>
					<div class="item">
						<figure class="image-box">
							<img  src="frontpage_assets/images/news/2.jpg" alt="Awesome Image">
						</figure>
						<div class="date">
							<h5>15</h5>
							<p>sep</p>
						</div>
						<ul class="admin-comments">
							<li><i class="icon flaticon-black">by Admin</i></li>
							<li><i class="icon flaticon-comments">Comments 23</i></li>
						</ul>
						<div class="post-content">
							<h4><a href="blog-details.html">This is a standard post with thumbnail</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
						</div>
					</div>
					<div class="item">
						<figure class="image-box">
							<img  src="frontpage_assets/images/news/1.jpg" alt="Awesome Image">
						</figure>
						<div class="date">
							<h5>15</h5>
							<p>sep</p>
						</div>
						<ul class="admin-comments">
							<li><i class="icon flaticon-black">by Admin</i></li>
							<li><i class="icon flaticon-comments">Comments 32</i></li>
						</ul>
						<div class="post-content">
							<h4><a href="blog-details.html">This is a standard post with thumbnail</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
						</div>
					</div>
				</div>
			</div>
		</section>

        <section class="contact_us get-quote-section" style=" background-image:url(images/home1.jpg);">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Get In Touch</h2>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Perspiciatis unde omnis iste natus error sit.</p>
                </div>
                <div class="default-form-area">
					<form id='contact-form' name='contact_form' class='col-md-10 col-md-offset-1 default-form' action='#' method='post'><input type='hidden' name='form-name' value='contact_form' />
						<div class="row clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12">

								<div class="form-group style-two">
									<input type="text" name="form_name" class="form-control" value="" placeholder="Name" required="">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<input type="email" name="form_email" class="form-control required email" value="" placeholder="Email" required="">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<input type="text" name="form_phone" class="form-control" value="" placeholder="Phone">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group style-two">
									<input type="text" name="form_phone" class="form-control" value="" placeholder="Subject">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group style-two">
									<textarea name="form_message" class="form-control textarea required" placeholder="Your Message"></textarea>
								</div>
							</div>
						</div>
						<div class="contact-section-btn text-center">
							<div class="form-group style-two">
								<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
								<button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">send message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </section>





		<footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 footer-colmun">
                    <div class="footer-wideget logo-wideget">
                        <div class="logo-top">
                            <img  src="frontpage_assets/images/logo/logo.png" alt="">
                        </div>
                        <div class="footer-social">
                            <div class="footer-title"><h5>Our socials</h5></div>
                            <ul class="social-list">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-colmun">
                    <div class="footer-wideget service-widget">
                        <div class="footer-title"><h5>our services</h5></div>
                        <ul class="list">
                            <li><a href="service-details.html"><p>Crypto Investments</p></a></li>
                            <li><a href="service-details.html"><p>Customer Insights</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Analytics</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Exchange</p></a></li>
                            <li><a href="service-details.html"><p>Business Consulting</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Mining</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Shopping</p></a></li>
                            <li><a href="service-details.html"><p>Escrow Services</p></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-colmun">
                    <div class="footer-wideget service-widget">
                        <div class="footer-title"><h5>our INFORMATION</h5></div>
                        <ul class="list">
                            <li><a href="service-details.html"><p>Crypto Investments</p></a></li>
                            <li><a href="service-details.html"><p>Customer Insights</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Analytics</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Exchange</p></a></li>
                            <li><a href="service-details.html"><p>Business Consulting</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Mining</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Shopping</p></a></li>
                            <li><a href="service-details.html"><p>Escrow Services</p></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 footer-colmun">
                    <div class="footer-wideget service-widget">
                        <div class="footer-title"><h5>our TOOLS</h5></div>
                        <ul class="list">
                            <li><a href="service-details.html"><p>Crypto Investments</p></a></li>
                            <li><a href="service-details.html"><p>Customer Insights</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Analytics</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Exchange</p></a></li>
                            <li><a href="service-details.html"><p>Business Consulting</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Mining</p></a></li>
                            <li><a href="service-details.html"><p>Bitcoin Shopping</p></a></li>
                            <li><a href="service-details.html"><p>Escrow Services</p></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="copyright">Copyright © 2017 <a href="#">NEXT THEME.</a> All rights reserved.</div>
        </div>
    </div>



	<!-- Scroll Top Button -->
	<button class="scroll-top tran3s color2_bg">
		<span class="fa fa-angle-up"></span>
	</button>
	<!-- pre loader  -->
	<div class="preloader"></div>

		<!-- jQuery js -->
		<script  src="frontpage_assets/js/jquery.js"></script>
		<!-- bootstrap js -->
		<script  src="frontpage_assets/js/bootstrap.min.js"></script>
		<!-- jQuery ui js -->
		<script  src="frontpage_assets/js/jquery-ui.js"></script>
		<!-- owl carousel js -->
		<script  src="frontpage_assets/js/owl.carousel.min.js"></script>
		<!-- jQuery validation -->
		<script  src="frontpage_assets/js/jquery.validate.min.js"></script>
		<!-- google map -->
		<script src="../maps.googleapis.com/maps/api/jsa56a?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
		<script  src="frontpage_assets/js/gmap.js"></script>
		<!-- mixit up -->
		<script  src="frontpage_assets/js/wow.js"></script>
		<script  src="frontpage_assets/js/jquery.mixitup.min.js"></script>
		<script  src="frontpage_assets/js/jquery.fitvids.js"></script>
		<script  src="frontpage_assets/js/bootstrap-select.min.js"></script>

		<!-- revolution slider js -->
		<script  src="frontpage_assets/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script  src="frontpage_assets/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

		<!-- fancy box -->
		<script  src="frontpage_assets/js/jquery.fancybox.pack.js"></script>
		<script  src="frontpage_assets/js/jquery.polyglot.language.switcher.js"></script>
		<script  src="frontpage_assets/js/nouislider.js"></script>
		<script  src="frontpage_assets/js/jquery.bootstrap-touchspin.js"></script>
		<script  src="frontpage_assets/js/SmoothScroll.js"></script>
		<script  src="frontpage_assets/js/jquery.appear.js"></script>
		<script  src="frontpage_assets/js/jquery.countTo.js"></script>
		<script  src="frontpage_assets/js/jquery.flexslider.js"></script>
		<script  src="frontpage_assets/js/imagezoom.js"></script>
		<script  src="frontpage_assets/js/validation.js"></script>
		<script id="map-script"  src="frontpage_assets/js/default-map.js"></script>
		<script  src="frontpage_assets/js/custom.js"></script>
		<script>
			 $('.panel-collapse').on('show.bs.collapse', function () {
				$(this).siblings('.panel-heading').addClass('active');
			  });

			  $('.panel-collapse').on('hide.bs.collapse', function () {
				$(this).siblings('.panel-heading').removeClass('active');
			  });
		</script>


	</div>

</body>
</html>




