<!DOCTYPE html>
<!-- eTreeks - Education & Courses Landing Page Template design by Jthemes -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">




	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="author" content="Jthemes"/>	
		<meta name="description" content=""/>
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				
  		<!-- SITE TITLE -->
		<title>Ustadi</title>
							
		<!-- FAVICON AND TOUCH ICONS  -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">		
		<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800,900&display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="{{ asset('assets/land/css/bootstrap.min.css')}}" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="{{asset('assets/land/css/all.css')}}" rel="stylesheet" crossorigin="anonymous">		
		<link href="{{asset('assets/land/css/flaticon.css')}}" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="{{ asset('assets/land/css/menu.css')}}" rel="stylesheet">	
		<link id="effect" href="{{ asset('assets/land/css/dropdown-effects/fade-down.css')}}" media="all" rel="stylesheet">
		<link href="{{ asset('assets/land/css/magnific-popup.css')}}" rel="stylesheet">	
		<link href="{{ asset('assets/land/css/flexslider.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/land/css/owl.carousel.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/land/css/owl.theme.default.min.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/land/css/slick.css')}}" />
		<!-- <link href="css/font-awesome.css" rel="stylesheet"> -->

		<!-- ON SCROLL ANIMATION -->
		<link href="{{ asset('assets/land/css/animate.css')}}" rel="stylesheet">
	
		<!-- TEMPLATE CSS -->
		<link href="{{ asset('assets/land/css/style.css')}}" rel="stylesheet">

		<!-- RESPONSIVE CSS -->
		<link href="{{ asset('assets/land/css/responsive.css')}}" rel="stylesheet">
		<style>
      .slick-slider {
  position: relative;

  display: block;
  box-sizing: border-box;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;

  -webkit-touch-callout: none;
  -khtml-user-select: none;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  -webkit-tap-highlight-color: transparent;
}

.slick-list {
  position: relative;

  display: block;
  overflow: hidden;

  margin: 0;
  padding: 0;
}

.slick-list:focus {
  outline: none;
}

.slick-list.dragging {
  cursor: pointer;
  cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.slick-track {
  position: relative;
  top: 0;
  left: 0;

  display: block;
  margin-left: auto;
  margin-right: auto;
}

.slick-track:before,
.slick-track:after {
  display: table;

  content: '';
}

.slick-track:after {
  clear: both;
}

.slick-loading .slick-track {
  visibility: hidden;
}

.slick-slide {
  display: none;
  float: left;

  height: 100%;
  min-height: 1px;
}

[dir='rtl'] .slick-slide {
  float: right;
}

.slick-slide img {
  display: block;
}

.slick-slide.slick-loading img {
  display: none;
}

.slick-slide.dragging img {
  pointer-events: none;
}

.slick-initialized .slick-slide {
  display: block;
}

.slick-loading .slick-slide {
  visibility: hidden;
}

.slick-vertical .slick-slide {
  display: block;

  height: auto;

  border: 1px solid transparent;
}

.slick-arrow.slick-hidden {
  display: none;
}


			.btn-login {
				color: #FFFFFF;
				border-radius: 50px;
				padding: 8px 13px;
				text-align: center;
				font-weight: 600;
				font-size: 14px;
				min-width: 109px;
			}
			.wide-70 {
				padding-top: 70px!important;
				padding-bottom: 60px!important;
			}


			.st-section-heading.st-style1 {
				text-align: center;
			}
			.st-section-heading.st-style1 .st-section-heading-title {
				font-size: 36px;
				margin-bottom: 0;
				margin-top: -8px;
				font-weight: 500;
				line-height: 1.2em;
			}

			.st-section-heading-seperator {
				width: 70px;
				height: 1px;
				background-color: #222;
				margin: auto;
				margin-bottom: 10px;
				margin-top: 10px;
			}

			.footer__social a {
				background-color: aliceblue!important;
				width: 39px;
				height: 39px;
				font-size: 16px;
				line-height: 39px;
			}

			.social-media a {
				color: #007bff;
				font-size: 19px;
				background-color: #ffffff;
				width: 45px;
				height: 45px;
				display: inline-block;
				margin: 0 5px;
				text-align: center;
				line-height: 45px;
				border-radius: 50%;
			}

			.copy-right-area .copyright h5 {
				font-size: 16px;
				font-weight: 400;
				/* line-height: 1.4; */
			}
			.btn-seco{
				background-color: #fd7205;
                border-color: #fd7205;
            }

			.btn-rosie{
				background-color: #2b8723;
                border-color: #2b8723;
			}
			.widget-wrap{
				padding: 0px 30px 0px 15px;
			}

			.column-wrap{
				position: relative;
                display: flex;
			}

			.widget-container{
				padding: 0px 0px 10px 0px;
				border-style: solid;
				border-width: 0px 0px 1px 0px;
				border-color: #FFFFFF1A;
				transition: background .3s,border .3s,border-radius .3s,box-shadow .3s,-webkit-box-shadow .3s;
			}
			.icon-box{
				margin-right: var(--icon-box-icon-margin,15px);
				margin-left: 0;
				margin-bottom: unset;
				display: inline-flex;
				-webkit-box-flex: 0;
				-ms-flex: 0 0 auto;
				flex: 0 0 auto;
			}
			.icon-box-wrapper{
				text-align: left;
				-webkit-box-orient: horizontal;
				-webkit-box-direction: normal;
				-ms-flex-direction: row;
				flex-direction: row;
				display: flex;
			}

			.icon-title{
				font-size: 14px;
                font-weight: 400;
				color: #AEB2C2;
				margin: 0;
			}

			.icon-content{
				-webkit-box-flex: 1;
				-ms-flex-positive: 1;
				flex-grow: 1;
			}

			.icon-description{
				min-height: 0 !important;
				margin: 0;
			}
			@media screen and (min-width: 992px){
				.st-height-b40 {
					height: 40px;
				}
		    }
			
		</style>
	
	</head>




	<body>







		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- HEADER
			============================================= -->
			<header id="header" class="header white-menu navbar-dark">
				<div class="header-wrapper">


					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	    	
				    	<span class="smllogo smllogo-black"><img src="images/logo.png" width="172" height="40" alt="mobile-logo"/></span>
				    	<span class="smllogo smllogo-white"><img src="images/logo-white.png" width="172" height="40" alt="mobile-logo"/></span>
				 	</div>


				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">


	    					<!-- LOGO IMAGE -->
	    					<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
	    					<div class="desktoplogo"><a href="index.html" class="logo-black"><img src="images/logo.png" width="172" height="40" alt="header-logo"></a></div>
	    					<div class="desktoplogo"><a href="index.html" class="logo-white"><img src="images/logo-white.png" width="172" height="40" alt="header-logo"></a></div>


	      					<nav class="wsmenu clearfix">
	        					<ul class="wsmenu-list">
							    	<li class="nl-simple" aria-haspopup="true"><a href="#home">Home</a></li>

									<li class="nl-simple" aria-haspopup="true"><a href="#about">About Us</a></li>

									<li class="nl-simple" aria-haspopup="true"><a href="#mentor">Mentor</a></li>
							    	<li class="nl-simple" aria-haspopup="true"><a href="#matron">Matron</a></li>
									@php

										$schools = DB::table('schools')->take(10)->get();
										@endphp
										@if(count($schools) > 0)
										<li class="nl-simple" aria-haspopup="true"><a href="#school">Schools</a></li>
										@endif
							    	<li class="nl-simple" aria-haspopup="true"><a href="#contact">Contacts</a></li>
									<ul class="nav header-navbar-rht" style="padding-top: 15px;">
										<li class="nav-item" style="padding-right: 6px;">
											<a href="{{ route('login')}}" class="nav-link btn-login btn-rosie">
												<i class="fas fa-sign-in-alt"></i> Sign In
											</a>
										</li>
										<li class="nav-item"><a href="{{ route('register')}}" class="nav-link btn-login btn-seco"><i class="fas fa-lock"></i> Sign Up</a></li>
									</ul>
	        					</ul>

	        				</nav>	

	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->


				</div>     <!-- End header-wrapper -->
			</header>	<!-- END HEADER -->


			<!-- HERO-1
			============================================= -->	
			<section id="hero-1" class="hero-section division">

				
				<!-- SLIDER -->
				<div class="slider">
			    	<ul class="slides">
				      	<li id="slide-1">
				        	<img src="{{asset('assets/land/images/slider/slider-1.jpeg')}}" alt="slide-background">
		       				<div class="caption d-flex align-items-center left-align">
		       					<div class="container">
		       						<div class="row">
		       							<div class="col-md-8 col-lg-7">
		       								<div class="caption-txt white-color">
								         	 	<h2 class="h2-sm">A wide variety of schools</h2>
												<p class="p-lg">Covering all major clubs and activities in the world</p>
												</p>

												<!-- Button -->
												<!-- <a href="#categories-3" class="btn btn-md btn-rose tra-black-hover">View Popular Courses</a> -->

											</div>
										</div>
									</div>  
								</div>  
					        </div>	

					    </li>	


				      	<!-- SLIDE #2 -->
				      	<li id="slide-2">

				        	<!-- Background Image -->
				        	<img src="{{asset('assets/land/images/slider/slider-2.jpeg')}}" alt="slide-background">

							<!-- Image Caption -->
	        				<div class="caption d-flex align-items-center right-align">
	        					<div class="container">
		       						<div class="row">
		       							<div class="col-md-8 col-lg-7">
		       								<div class="caption-txt white-color">

								         	 	<h2 class="h2-sm">High quality mentors from the leading professionals</h2>

											</div>	
				         				</div>
									</div>  <!-- End row -->
								</div>  <!-- End container -->
					        </div>	<!-- End Image Caption -->

				     	</li>	<!-- END SLIDE #2 -->


				     	<!-- SLIDE #3 -->
				      	<li id="slide-3">

				      		<!-- Background Image -->
				        	<img src="{{asset('assets/land/images/slider/slider-3.jpg')}}" alt="slide-background">

				        	<!-- Image Caption -->
		       			 	<div class="caption d-flex align-items-center right-align">
	        					<div class="container">
		       						<div class="row">
		       							<div class="col-md-8 col-lg-7">
		       								<div class="caption-txt white-color">

						       			 		<!-- Title -->
								         	 	<h2 class="h2-sm">Clubs</h2>


				                              	<!-- Text -->
												<p class="p-lg"> Unique and innovative clubs for all ages and abilities.
												</p>

												<!-- Button -->
												<!-- <a href="#courses-4" class="btn btn-md btn-rose tra-black-hover">View Popular Courses</a> -->

											</div>
					        			</div>
									</div>  <!-- End row -->
								</div>  <!-- End container -->
					        </div>	<!-- End Image Caption -->

				     	</li>	<!-- END SLIDE #3 -->

				    </ul>
			  	</div>	

	

				
			</section>	<!-- END HERO-1 -->
			<section id="about-4" class="bg-lightgrey wide-70 about-section division">
				<!-- <div class="container"> -->

					<!-- ABOUT BOXES -->
					<div class="a4-boxes">
						<div class="row d-flex align-items-center">

							<!-- BOX #1 -->		
							<div class="col-md-4">
								<div class="abox-4 icon-sm">

									<!-- Icon --> 
									<span class="flaticon-004-computer"></span>

									<!-- Text -->
									<div class="abox-4-txt">
										<h5 class="h5-md">Valuable Clubs</h5>
										<!-- These clubs provide mentees with access to expert guidance, educational resources, and a supportive community to help them achieve their goals -->
										<p>Wide range of clubs that cater to the needs and interests of students. </p>
									</div>

								</div>
							</div>	<!-- END BOX #1 -->	


							<!-- BOX #2 -->		
							<div class="col-md-4">
								<div class="abox-4 icon-sm">

									<!-- Icon --> 
									<span class="flaticon-028-learning-1"></span>

									<!-- Text -->
									<div class="abox-4-txt">
										<h5 class="h5-md">Highly-experienced Mentors</h5>
										<p>Connects schools with professional mentors who are passionate about sharing their knowledge and expertise</p>
									</div>

								</div>
							</div>	<!-- END BOX #2 -->	


							<!-- BOX #3 -->		
							<div class="col-md-4">
								<div class="abox-4 icon-sm">

									<!-- Icon --> 
									<span class="flaticon-032-tablet"></span>

									<!-- Text -->
									<div class="abox-4-txt">
										<h5 class="h5-md">User-Friendly Interface</h5>
										<p>An User-friendly interface for schools to browse and choose mentors based on their locations and specializations.</p>
									</div>

								</div>
							</div>	<!-- END BOX #3 -->	


						</div>  <!-- End row --> 
					 </div>	  <!-- END ABOUT BOXES -->


				<!-- </div>	    -->
			</section>	
			


								<!-- ABOUT-2
				============================================= -->
				<section id="about" class="wide-60 about-section division">
					<div class="container">
						<div class="st-section-heading st-style1">
						  <h2 class="st-section-heading-title">Who We Are</h2>
						  <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
						  <!-- <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div> -->
						</div>
						<div class="st-height-b40 st-height-lg-b40"></div>
					</div>
					<div class="container">
						<div class="row d-flex align-items-center">


							<!-- ABOUT IMAGE -->
							<div class="col-md-5 col-lg-6">
								<div class="img-block pc-25 mb-40">
									<img class="img-fluid" src="{{asset('assets/land/images/viewer.jpg')}}" alt="about-image">
						 		</div>
							</div>


							<!-- ABOUT TEXT -->
						 	<div class="col-md-7 col-lg-6">
						 		<div class="txt-block pc-25 mb-40">

						 			<!-- Title -->	
									<h3 class="h3-sm">The Best Mentorship Platform</h3>
									<p>
										Ustadi, a mentorship website platform that connects experienced professionals with aspiring learners to help them achieve their personal and professional goals.
									</p>
									<p>
										Our platform provides a diverse range of mentors from various fields, including technology, business, creative arts, and more. Our mentors are highly experienced and have a passion for sharing their knowledge and expertise with the next generation of leaders.
									</p>
									<p>
										
										At Ustadi, we believe in the power of mentorship to drive personal and professional growth. Through one-on-one mentorship sessions, our mentors provide guidance, advice, and support to help learners overcome obstacles, develop new skills, and achieve their goals.
									</p>

									<!-- Text -->
									<!-- <p>A point of connection between mentors and schools. The mentorship role is based on guideship of students to become better leaders of tommorow.
									</p>

									<p>We have quite a variety of clubs for which mentors participate in order to give guidance to the students.</p>
									<p> Our focus is to  nurture students academically, mentallly, emotional wise and leadership wise. </p> -->

									<!-- List -->	
									<!-- <ul class="txt-list mb-15">

										<li>Nullam rutrum eget nunc varius etiam mollis risus undo</li>
														
										<li>Integer congue magna at pretium purus pretium ligula at rutrum risus luctus dolor auctor 
											ipsum blandit purus		
										</li>

										<li>Risus at congue etiam aliquam sapien egestas posuere</li>

									</ul> -->

									<!-- Button -->
									<!-- <a href="categories-list.html" class="btn btn-md btn-tra-grey rose-hover">Start Learning Now</a> -->

						 		</div>
						 	</div>	  <!-- END ABOUT TEXT -->


						</div>    <!-- End row --> 	
					</div>	   <!-- End container --> 	
				</section>	<!-- End ABOUT-2 --> 



				<!-- Mentorship-->
				<section id="mentor" class="pt-30 about-section division">
					<div class="container">
						<div class="st-section-heading st-style1">
						  <h2 class="st-section-heading-title">Mentor</h2>
						  <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
						</div>
						<div class="st-height-b40 st-height-lg-b40"></div>
					</div>
					<div class="container">
						<div class="row d-flex align-items-center">


							<!-- ABOUT TEXT -->
						 	<div class="col-md-7 col-lg-6">
						 		<div class="txt-block pc-25">

									<h3 class="h3-sm">Start your Mentorship career today with Ustadi</h3>
									<p>Follow this simple steps to become an Ustadi Mentor
									</p> 


									<ul class="txt-list mb-15">

										<li>Register with mentor role by clicking the below button</li>

														
										<li>Set your preferrable location('you will be located to schools within your location')		
										</li>

										<li>Set your availabilty, specialization & phone number in the profile section</li>
										<li>Wait for coordinator approval</li>

									</ul>
									<a href="{{ route('register')}}" class="btn btn-md btn-rosie tra-black-hover">Become A Mentor</a>

						 		</div>
						 	</div>	  


						 	
							<div class="col-md-5 col-lg-6">
								<div class="img-block">
									<img class="img-fluid" src="{{asset('assets/land/images/mentor.png')}}" alt="about-image">
						 		</div>
							</div>


						</div>    
					</div>	  	
				</section>	


				<!-- BANNER-5
				============================================= -->
				<section id="matron" class="bg-whitesmoke wider-50 banner-section division">
					<div class="container">
						<div class="st-section-heading st-style1">
						  <h2 class="st-section-heading-title">Matron</h2>
						  <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
						</div>
						<div class="st-height-b40 st-height-lg-b40"></div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="banner-5-txt">
									<img src="{{asset('assets/land/images/matron.jpg')}}" alt="banner-icon" />
									<div class="b5-txt">
										<h4 class="h4-xs">Matron Registration</h4>
										<p>It is easy to become a matron, incase your school is among the list of registered school in Ustadi.
										</p>
										<a href="{{ route('register')}}"class="btn btn-seco tra-black-hover">Become a Matron</a>
									</div>
								</div>
							</div>	<!-- END BANNER TEXT -->


							<!-- BANNER TEXT -->
							<!-- <div class="col-md-6">
								<div class="banner-5-txt">
									<img src="images/image-05.png" alt="banner-icon" />
									<div class="b5-txt">
										<h4 class="h4-xs">eTreeks for Business</h4>
										<p>Feugiat primis ligula a risus auctor egestas an augue mauri and viverra tortor iaculis an 
										   eugiat viverra
										</p>
										<a href="courses-list.html" class="btn btn-rose tra-black-hover">Find Out More</a>

									</div>

								</div>
							</div>	 -->


						</div>   <!-- End row -->
					</div>	   
				</section>	<!-- END BANNER-5 -->

        @php

		$schools = DB::table('schools')->take(10)->get();
		@endphp
		@if(count($schools) > 0)


			<section id="school" class="wide-100 courses-section division">
				<div class="container">
					<div class="st-section-heading st-style1">
						<h2 class="st-section-heading-title">School</h2>
						<div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
					</div>
					<div class="st-height-b40 st-height-lg-b40"></div>
				</div>
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-md-12">
							<div class="section-title mb-40">

								<!-- Title 	-->	
								<h4 class="h4-xl">Top Enlisted School</h4>	

								<!-- Text -->	
								<p class="p-md">We cover a wide range of schools all over the 47 Kenyan Counties
								</p>

							</div>	
						</div>
					</div>


					<!-- COURSE BOXES CAROUSEL -->
					<div class="row">
						<div class="col-lg-12">
							<div class="owl-carousel owl-theme owl-loaded courses-carousel owl-drag">
								<div class="owl-stage-outer">
									<div class="owl-stage" style="transform: translate3d(-1942px, 0px, 0px); transition: all 0.9s ease 0s; width: 4440px;">
									  <!--in the loop take 5 schools and make them owl-item cloned-->
									  @php
									  $i = 0;
									  @endphp
									  @foreach($schools as $school)
									  @php
									  $i++;
									  @endphp
									  @if($i < 5)


										<div class="owl-item cloned" style="width: 277.5px;">
											<div class="cbox-1">
												<a href="course-details.html">
												
													<!-- school logo -->
													<img class="img-fluid" src="{{asset('assets/images/school/'.$school->logo)}}" alt="course-preview">

													<!-- Text -->
													<div class="cbox-1-txt">

														<!-- school Name -->
														<p class="course-tags">
															<span class="course-category">{{$school->school_name}}</span>
															
														</p>

														<h5 class="h5-xs">{{$school->motto}}</h5>


													</div>

												</a>
											</div>
										</div>
									@else

										<div class="owl-item active" style="width: 277.5px;">
										    <div class="cbox-1">
												<a href="course-details.html">
												
													<!-- school logo -->
													<img class="img-fluid" src="{{asset('assets/images/school/'.$school->logo)}}" alt="course-preview">

													<!-- Text -->
													<div class="cbox-1-txt">

														<!-- school Name -->
														<p class="course-tags">
															<span class="course-category">{{$school->school_name}}</span>
															
														</p>

														<h5 class="h5-xs">{{$school->motto}}</h5>


													</div>

												</a>
											</div>
										</div>
									@endif
									@endforeach
									</div>
								</div>
								<div class="owl-nav">
									<button type="button" role="presentation" class="owl-prev">
										<span aria-label="Previous"><img src="images/prev.png">
										</span>
									</button>
									<button type="button" role="presentation" class="owl-next">
										<span aria-label="Next"><img src="images/next.png"></span>
									</button>
								</div>
								<div class="owl-dots disabled"></div>
							</div>
						</div>		
					</div>	


				</div> 
				<!-- <div class="container">
					<div class="st-slider st-style2">
						<div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
						<div class="slick-wrapper">
							<div class="slick-slide-in">
							<div class="st-imagebox st-style1 st-zoom">
								<a href="#" class="st-imagebox-img"><img src="https://via.placeholder.com/370x290" class="st-zoom-in" alt="service1"></a>
								<div class="st-imagebox-info">
								<h2 class="st-imagebox-title"><a href="#">Customer Consultant</a></h2>
								<div class="st-imagebox-sub-title">A meeting is when two or more people come together to discuss one or more topics often in a formal or business</div>
								<a href="#" target="_self" class="st-btn st-style4">Learn More</a>
								</div>
							</div>
							</div>
							<div class="slick-slide-in">
							<div class="st-imagebox st-style1 st-zoom">
								<a href="#" class="st-imagebox-img"><img src="https://via.placeholder.com/370x290" class="st-zoom-in" alt="service2"></a>
								<div class="st-imagebox-info">
								<h2 class="st-imagebox-title"><a href="#">Business Analysis</a></h2>
								<div class="st-imagebox-sub-title">Business analysis is a research discipline of identifying business needs and determining solutions to business problems.</div>
								<a href="#" target="_self" class="st-btn st-style4">Learn More</a>
								</div>
							</div>
							</div>
							<div class="slick-slide-in">
							<div class="st-imagebox st-style1 st-zoom">
								<a href="#" class="st-imagebox-img"><img src="https://via.placeholder.com/370x290" class="st-zoom-in" alt="service3"></a>
								<div class="st-imagebox-info">
								<h2 class="st-imagebox-title"><a href="#">Customer Consultant</a></h2>
								<div class="st-imagebox-sub-title">Market penetration is the key for a business growth. Business development processes to develop and implement growth.</div>
								<a href="#" target="_self" class="st-btn st-style4">Learn More</a>
								</div>
							</div>
							</div>
							<div class="slick-slide-in">
							<div class="st-imagebox st-style1 st-zoom">
								<a href="#" class="st-imagebox-img"><img src="https://via.placeholder.com/370x290" class="st-zoom-in" alt="service1"></a>
								<div class="st-imagebox-info">
								<h2 class="st-imagebox-title"><a href="#">Customer Consultant</a></h2>
								<div class="st-imagebox-sub-title">A meeting is when two or more people come together to discuss one or more topics often in a formal or business</div>
								<a href="#" target="_self" class="st-btn st-style4">Learn More</a>
								</div>
							</div>
							</div>
							<div class="slick-slide-in">
							<div class="st-imagebox st-style1 st-zoom">
								<a href="#" class="st-imagebox-img"><img src="https://via.placeholder.com/370x290" class="st-zoom-in" alt="service2"></a>
								<div class="st-imagebox-info">
								<h2 class="st-imagebox-title"><a href="#">Business Analysis</a></h2>
								<div class="st-imagebox-sub-title">Business analysis is a research discipline of identifying business needs and determining solutions to business problems.</div>
								<a href="#" target="_self" class="st-btn st-style4">Learn More</a>
								</div>
							</div>
							</div>
							<div class="slick-slide-in">
							<div class="st-imagebox st-style1 st-zoom">
								<a href="#" class="st-imagebox-img"><img src="https://via.placeholder.com/370x290" class="st-zoom-in" alt="service3"></a>
								<div class="st-imagebox-info">
								<h2 class="st-imagebox-title"><a href="#">Customer Consultant</a></h2>
								<div class="st-imagebox-sub-title">Market penetration is the key for a business growth. Business development processes to develop and implement growth.</div>
								<a href="#" target="_self" class="st-btn st-style4">Learn More</a>
								</div>
							</div>
							</div>
						</div>
						</div>
						<div class="pagination st-style1 st-flex st-hidden"></div> 
						<div class="swipe-arrow st-style1"> 
						<div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
						<div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
						</div>
					</div>
				</div> -->

			</section>
			
		@endif


        <!-- CONTACTS -->
				<section id="contact" class="contacts-section division">
					<!-- <div class="container"> -->
						<div class="bg-03 bg-fixed contacts-1-holder">
							<div class="row d-flex align-items-center">


								<!-- CONTACTS TEXT -->	
								<div class="col-lg-8 offset-lg-2">
									<div class="contacts-txt text-center">	

										<!-- Title -->	
										<h3 class="h3-sm">Need Help? Get in Touch</h3>	

										<!-- Text -->	
										<p class="p-md">Have questions about mentorship and school opportunities?</p>	

										<!-- Button -->	
										<a class="btn btn-md btn-rosie tra-white-hover" href="mailto:support@mastadi.org">support@mastadi.org</a>

									</div>								
								</div>


							</div>	  <!-- End row -->
						</div>    <!-- End contacts-holder -->
					<!-- </div>	    -->
				</section>	<!-- END CONTACTS-1 -->




				<!-- FOOTER-2
				============================================= -->
				<footer id="footer-2" class="footer division">
					<div class="container">


						<!-- FOOTER CONTENT -->
						<div class="row">


							<!-- FOOTER INFO -->
							<div class="col-md-5 col-lg-5 col-xl-4">
								<div class="footer-info mb-40">

									<!-- Footer Logo -->
									<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 344 x 80 pixels) -->
									<img src="images/logo.png" width="172" height="40" alt="footer-logo">

									<!-- Text -->	
									<p>Top School evolutionary Mentorship platform 
									</p>

									<div class="social-media footer__social mt-30">
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-google-plus-g"></i></a>
									</div>
								
								</div>	
							</div>	


							<!-- FOOTER PRODUCTS LINKS -->
							<div class="col-md-4 col-lg-4 col-xl-4">
								<div class="footer-links mb-40">
								
									<!-- Title -->
									<h5 class="h5-md">Quick Links</h5>

									<!-- Footer Links -->
									<ul class="foo-links clearfix">
										<li><a href="">Home</a></li>
										<li><a href="">About Us</a></li>
										<li><a href="">Mentor</a></li>
										<li><a href="">Matron</a></li>
										<li><a href="">School</a></li>								
									</ul>

								</div>
							</div>


							<!-- FOOTER COMPANY LINKS -->
							<!-- <div class="col-md-4 col-lg-4 col-xl-3">
								<div class="footer-links mb-40">

									<h5 class="h5-md">Popular Categories</h5>

									<ul class="clearfix">
										<li><a href="#">Business English</a></li>
										<li><a href="#">Software Development</a></li>
										<li><a href="#">Finance & Accounting</a></li>
										<li><a href="#">Health and Fitness</a></li>
										<li><a href="#">Office Productivity</a></li>				
									</ul>

								</div>
							</div> -->


							<div class="col-md-4 col-lg-4 col-xl-4">
								<div class="">
									<div clads="column-wrap">
										<div class="widget-wrap">
											<h5 class="h5-md">Contacts</h5>

											<div class="element-cont">
												<div class="widget-container">
													<div class="icon-box-wrapper">
														<div class="icon-box">
															<span class="">
																<!--phone icon-->
																<i class="fas fa-phone" style="color:#fd7205"></i>
															</span>

														</div>
														<div class="icon-content">
															<h3 class="icon-title">
																<span class="">Call Anytime</span>

															</h3>
															<p class="icon-description">
																<a href="tel:+254 723 739882" class="">+254 723 739882</a>

															</p>
														</div>
													</div>

												</div>
											</div>
											<div class="element-cont">
												<div class="widget-container">
													<div class="icon-box-wrapper">
														<div class="icon-box">
															<span class="">
																<!--email icon-->
																<i class="fas fa-envelope" style="color:#fd7205"></i>
															</span>

														</div>
														<div class="icon-content">
															<h3 class="icon-title">
																<span class="">Send Email</span>

															</h3>
															<p class="icon-description">
																<a href="mailto:support@mastadi.org" class="">support@mastadi.org</a>

															</p>
														</div>
													</div>

												</div>
											</div>

											<div class="element-cont">
												<div class="widget-container">
													<div class="icon-box-wrapper">
														<div class="icon-box">
															<span class="">
																<!--location icon-->
																<i class="fas fa-map-marker-alt" style="color:#fd7205"></i>
															</span>

														</div>
														<div class="icon-content">
															<h3 class="icon-title">
																<span class="">Visit Office</span>

															</h3>
															<p class="icon-description">
																<a href="tel:to" class="">Muindi Mbingu Street, Afya Centre</a>

															</p>
														</div>
													</div>

												</div>
											</div>

										</div>
									</div>
								</div>
							</div>


							<!-- FOOTER NEWSLETTER FORM -->
							<!-- <div class="col-md-7 col-xl-3">
								<div class="footer-form mb-20">

									<h5 class="h5-md">Stay in Touch</h5>

									<form class="newsletter-form">
												
										<div class="input-group">
											<input type="email" autocomplete="off" class="form-control" placeholder="Your Email Address" required id="s-email">								
											<span class="input-group-btn">
												<button type="submit" class="btn btn-rosie black-hover">Subscribe</button> 
											</span>
										</div>	
										<label for="s-email" class="form-notification"></label>
													
									</form>
															
								</div>
							</div> -->




						</div>	  <!-- END FOOTER CONTENT -->
					</div>

					<div class="bottom-footer">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-12">
									<div class="copyright text-center">
										<h5 style="font-size: 16px; font-weight: 400;">Copyright@ 2023 <a href="#" style="font-weight: 700;">Ustadi</a>. All Rights Reserved</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
						   										
				</footer>	





		</div>	




		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="{{ asset('assets/land/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ asset('assets/land/js/bootstrap.min.js')}}"></script>	
		<script src="{{ asset('assets/land/js/modernizr.custom.js')}}"></script>
		<script src="{{ asset('assets/land/js/jquery.easing.js')}}"></script>
		<script src="{{ asset('assets/land/js/jquery.appear.js')}}"></script>
		<script src="{{ asset('assets/land/js/menu.js')}}"></script>
		<script src="{{ asset('assets/land/js/materialize.js')}}"></script>	
		<script src="{{ asset('assets/land/js/jquery.scrollto.js')}}"></script>
		<script src="{{ asset('assets/land/js/jquery.countdown.min.js')}}"></script>
		<script src="{{ asset('assets/land/js/imagesloaded.pkgd.min.js')}}"></script>
		<script src="{{ asset('assets/land/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{ asset('assets/land/js/jquery.flexslider.js')}}"></script>
		<script src="{{ asset('assets/land/js/owl.carousel.min.js')}}"></script>
		<script src="{{ asset('assets/land/js/jquery.slick.min.js')}}"></script>
		<script src="{{ asset('assets/land/js/jquery.magnific-popup.min.js')}}"></script>	
		<script src="{{ asset('assets/land/js/register-form.js')}}"></script>	
		<script src="{{ asset('assets/land/js/comment-form.js')}}"></script>	
		<script src="{{ asset('assets/land/js/jquery.validate.min.js')}}"></script>	
		<script src="{{ asset('assets/land/js/jquery.ajaxchimp.min.js')}}"></script>	

		<!-- Custom Script -->		
		<script src="{{ asset('assets/land/js/custom.js')}}"></script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!-- [if lt IE 9]>
			<script src="js/html5shiv.js" type="text/javascript"></script>
			<script src="js/respond.min.js" type="text/javascript"></script>
		<![endif] -->

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->	
		<!--
		<script>
			window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
			ga('create', 'UA-XXXXX-Y', 'auto');
			ga('send', 'pageview');
		</script>
		<script async src='https://www.google-analytics.com/analytics.js'></script>
		-->
		<!-- End Google Analytics -->

		

	</body>



</html>	