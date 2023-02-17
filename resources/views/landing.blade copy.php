<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <!-- Page Title -->
  <title>Ustadi</title>
  <!-- Favicon Icon -->
  <link rel="icon" href="https://via.placeholder.com/64x64" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/landing/css/fontawesome.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/landing/css/flaticon.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/landing/css/slick.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/landing/css/lightgallery.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css')}}" />
  <style>
	.btn-login {
		color: #FFFFFF;
		border-radius: 50px;
		padding: 8px 13px;
		text-align: center;
		font-weight: 600;
		font-size: 14px;
		min-width: 109px;
	}
    .btn-rosie{
				background-color: #2b8723;
        border-color: #2b8723;
		}

    .btn-seco{
				background-color: #fd7205;
      border-color: #fd7205;
    }
  </style>
</head>

<body class="st-green">
  <!-- Start Header Section -->
  <header class="st-site-header st-style1 st-sticky-header">
    <!-- <div class="st-top-header">
      <div class="container">
        <div class="st-top-header-in">
          <ul class="st-top-header-list">
            <li><i class="fas fa-envelope"></i>Email: <a href="#">vorosha@gmail.com</a></li>
            <li><i class="fas fa-phone-volume"></i>Contact: <a href="#">2222-333-7889 </a></li>
            <li><i class="fas fa-clock"></i>Work time: <a href="#">9:00AM - 18:00PM</a></li>
          </ul>
        </div>
      </div>
    </div> -->
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-main-header-left">
            <a class="st-site-branding st-white-logo" href="index.html"><img src="https://via.placeholder.com/208x41" alt="Vorosha"></a>
            <a class="st-site-branding st-dark-logo" href="index.html"><img src="https://via.placeholder.com/208x41" alt="Vorosha"></a>
          </div>
          <div class="st-main-header-right">
            <div class="st-nav">
              <ul class="st-nav-list st-onepage-nav">
                <li ><a href="#home" class="st-smooth-move">Home</a></li>
                <li><a href="#about" class="st-smooth-move">About</a></li>
                <li><a href="#services" class="st-smooth-move">Mentors</a></li>
                <li><a href="#portfolio" class="st-smooth-move">Matrons</a></li>
                <li><a href="#team" class="st-smooth-move">Schools</a></li>
                <!-- <li><a href="#price" class="st-smooth-move">Price</a></li> -->
                <!-- <li ><a href="#blog" class="st-smooth-move">Blog</a></li> -->
                <li><a href="#contact" class="st-smooth-move">Contact</a></li>
				        <li style="padding-right: 6px;">
                  <a href="{{ route('login')}}" class="nav-link btn-login btn-rosie">
                    <i class="fas fa-sign-in-alt"></i> Sign up
                  </a>
                </li>
                <li ><a href="{{ route('register')}}" class="nav-link btn-login btn-seco"><i class="fas fa-lock"></i> Sign in</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->

  <div class="st-content">
  <!-- Start Hero Seciton -->
  <div class="st-height-b40 st-height-lg-b80"></div>
  <div class="st-hero-wrap st-gray-bg">
    <div class="st-hero st-style1">
      <div class="container">
        <div class="st-hero-text">
          <h1 class="st-hero-title">
            Business is the <br>
            activity of making <br>
            one's living
          </h1>
          <div class="st-hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br>tempor incididunt ut labore et dolore magna aliqua.</div>
          <div class="st-hero-btn">
            <a href="#" class="st-btn st-style1 st-color1">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="st-slider st-style1 st-hero-slider1" id="home">
      <div class="slick-container" data-autoplay="1" data-loop="1" data-speed="800" data-autoplay-timeout="1000" data-center="0" data-slides-per-view="1" data-fade-slide="1">
        <div class="slick-wrapper">
          <div class="slick-slide-in">
            <div class="st-hero st-style1 st-gray-bg">
              <div class="st-hero-img">
                <img src="https://via.placeholder.com/1100x790" alt="Hero img">
              </div>
            </div>
          </div>
          <div class="slick-slide-in">
            <div class="st-hero st-style1 st-gray-bg">
              <div class="st-hero-img">
                <img src="https://via.placeholder.com/1100x790" alt="Hero img">
              </div>
            </div>
          </div>
          <div class="slick-slide-in">
            <div class="st-hero st-style1 st-gray-bg">
              <div class="st-hero-img">
                <img src="https://via.placeholder.com/1100x790" alt="Hero img">
              </div>
            </div>
          </div>
        </div>
      </div><!-- .slick-container -->
      <div class="pagination st-style1 container"></div> <!-- If dont need Pagination then add class .st-hidden -->
      <div class="swipe-arrow st-style1 st-hidden"> <!-- If dont need navigation then add class .st-hidden -->
        <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
        <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
      </div>
    </div>
    <!-- .st-slider -->
  </div>
  <!-- End Hero Seciton -->

  <!-- Start Feature Seciton -->
  <section>
    <div class="st-height-b120 st-height-lg-b80"></div>
    <div class="container">
      <div class="st-section-heading st-style1">
        <h2 class="st-section-heading-title">Our Feature</h2>
        <div class="st-section-heading-seperator left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
        <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
      </div>
      <div class="st-height-b40 st-height-lg-b40"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="st-iconbox st-style1">
            <div class="st-iconbox-icon"><i class="flaticon-focus"></i></div>
            <h2 class="st-iconbox-title">Business Focus</h2>
            <div class="st-iconbox-text">Business focuses on strategic planning for international operations. Business focus ensuring business needs.</div>
          </div>
          <div class="st-height-b30 st-height-lg-b30"></div>
        </div><!-- .col -->
        <div class="col-lg-4">
          <div class="st-iconbox st-style1">
            <div class="st-iconbox-icon"><i class="flaticon-career"></i></div>
            <h2 class="st-iconbox-title">Business Growth</h2>
            <div class="st-iconbox-text">Market entrance is the key for a business growth. Business development processes to develop and implement growth.</div>
          </div>
          <div class="st-height-b30 st-height-lg-b30"></div>
        </div><!-- .col -->
        <div class="col-lg-4">
          <div class="st-iconbox st-style1">
            <div class="st-iconbox-icon"><i class="flaticon-career-1"></i></div>
            <h2 class="st-iconbox-title">Business Goal</h2>
            <div class="st-iconbox-text">Business needs are understood and communicated so that problem solutions meet the business goals.</div>
          </div>
          <div class="st-height-b30 st-height-lg-b30"></div>
        </div><!-- .col -->
      </div>
    </div>
    <div class="st-height-b90 st-height-lg-b50"></div>
  </section>
  <!-- End Feature Seciton -->
  <hr>
  <!-- Start About Seciton -->
  <section id="about">
    <div class="st-height-b120 st-height-lg-b80"></div>
    <div class="container">
      <div class="st-section-heading st-style1">
        <h2 class="st-section-heading-title">Who We Are</h2>
        <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
        <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
      </div>
      <div class="st-height-b40 st-height-lg-b40"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="st-vertical-middle">
            <div class="st-vertical-middle-in">
              <div class="st-text-block st-style1">
                <h3 class="st-text-block-subtitle">About us</h3>
                <div class="st-height-b10 st-height-lg-b10"></div>
                <h2 class="st-text-block-title">We are awesome team work for your business dream</h2>
                <div class="st-height-b20 st-height-lg-b20"></div>
                <div class="st-text-block-text">Business is the activity of making one's living or making money. One business makes a commercial transaction with another. A business entity is an entity that is formed and administered as per corporate. Business may refer to many differing activities, such as the activity of buying or selling.</div>
                <div class="st-height-b20 st-height-lg-b20"></div>
                <ul class="st-list st-style1 st-mp0">
                  <li>One's business To attend to one's duties.</li>
                  <li>Business may refer to many differing activities.</li>
                  <li>Business representation made by and for business people.</li>
                  <li>Business information about a company or individual.</li>
                </ul>
                <div class="st-height-b30 st-height-lg-b30"></div>
                <div class="st-text-block-avatar">
                  <div class="st-avatar-left">
                    <h4 class="st-avatar-name">David Ambrose</h4>
                    <div class="st-avatar-designation">CEO & Founder</div>
                  </div>
                  <div class="st-avatar-right">
                    <div class="st-avatar-signature st-white-signature"><img src="https://via.placeholder.com/138x34" alt="signature"></div>
                    <div class="st-avatar-signature st-dark-signature"><img src="https://via.placeholder.com/138x34" alt="signature"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="st-height-b0 st-height-lg-b30"></div>
        </div><!-- .col -->
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
          <div class="st-hobble">
            <div class="st-video-block st-style1 st-zoom st-hover-layer">
              <div class="st-video-block-img st-zoom-in st-dynamic-bg" data-src="https://via.placeholder.com/570x450"></div>
              <a href="https://www.youtube.com/embed/jRcfE2xxSAw?autoplay=1" class="st-play-btn st-style1 st-video-open">
                <i class="flaticon-multimedia"></i>
                <span class="st-video-animaiton"><span></span></span>
              </a>
            </div>
          </div>
        </div><!-- .col -->
      </div>
    </div>
    <div class="st-height-b120 st-height-lg-b80"></div>
  </section>
  <!-- End About Seciton -->
  <hr>
  <!-- Start Service Section -->
  <section id="services">
    <div class="st-height-b120 st-height-lg-b80"></div>
    <div class="container">
      <div class="st-section-heading st-style1">
        <h2 class="st-section-heading-title">Business Services</h2>
        <div class="st-section-heading-seperator left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
        <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
      </div>
      <div class="st-height-b40 st-height-lg-b40"></div>
    </div>
    <div class="container">
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
        </div><!-- .slick-container -->
        <div class="pagination st-style1 st-flex st-hidden"></div> <!-- If dont need Pagination then add class .st-hidden -->
        <div class="swipe-arrow st-style1"> <!-- If dont need navigation then add class .st-hidden -->
          <div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
          <div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
        </div>
      </div>
    </div>
    <div class="st-height-b120 st-height-lg-b80"></div>
  </section>
  <!-- End Service Section -->

    <!-- Start FunFact Aection -->
    <section class="st-dynamic-bg st-bg" data-src="https://via.placeholder.com/1920x385">
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="st-funfact st-style1">
              <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="0.7s"><i class="flaticon-rate"></i></div>
              <h2 class="st-funfact-number st-counter">999</h2>
              <div class="st-funfact-title">Satisfied customers</div>
            </div>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-funfact st-style1">
              <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="0.9s"><i class="flaticon-code"></i></div>
              <h2 class="st-funfact-number st-counter">185</h2>
              <div class="st-funfact-title">Built websites</div>
            </div>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-funfact st-style1">
              <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="0.8s"><i class="flaticon-laptop"></i></div>
              <h2 class="st-funfact-number st-counter">100</h2>
              <div class="st-funfact-title">Experts Worker</div>
            </div>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-funfact st-style1">
              <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="1s"><i class="flaticon-win"></i></div>
              <h2 class="st-funfact-number st-counter">20</h2>
              <div class="st-funfact-title">Experience Years</div>
            </div>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div><!-- .col -->
        </div>
      </div>
      <div class="st-height-b90 st-height-lg-b50"></div>
    </section>
    <!-- End FunFact Aection -->

    <!-- Start Project Section -->
    <section id="portfolio" class="st-parallax-shape-wpra">
      <div class="st-parallax-shape st-style1"></div>
      <div class="st-parallax-shape st-style2"></div>
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-section-heading st-style1">
          <h2 class="st-section-heading-title">Our Latest Project</h2>
          <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
        </div>
        <div class="st-height-b40 st-height-lg-b40"></div>
      </div>
      <div class="container">
        <div class="st-portfolio-wrapper">
          <div class="st-isotop-filter st-style1 text-center">
            <ul class="st-mp0">
              <li class="active"><a href="#" data-filter="*">All</a></li>
              <li><a href="#" data-filter=".branding">Branding</a></li>
              <li><a href="#" data-filter=".website">Website</a></li>
              <li><a href="#" data-filter=".photography">Photography</a></li>
              <li><a href="#" data-filter=".creative">Creative</a></li>
            </ul>
          </div>
          <div class="st-isotop st-style1 st-port-col-3 st-has-gutter st-lightgallery">
            <div class="st-grid-sizer"></div>
            <div class="st-isotop-item branding photography creative">
              <a href="https://via.placeholder.com/1030x700" class="st-project st-zoom st-lightbox-item">
                <div class="st-project-img st-zoom-in"><img src="https://via.placeholder.com/1030x700" alt="project1"></div>
                <div class="st-plus"><span></span></div>
              </a>
            </div><!-- .st-isotop-item -->

            <div class="st-isotop-item website photography">
              <a href="https://via.placeholder.com/575x700" class="st-project st-zoom st-lightbox-item">
                <div class="st-project-img st-zoom-in"><img src="https://via.placeholder.com/575x700" alt="project2"></div>
                <div class="st-plus"><span></span></div>
              </a>
            </div><!-- .st-isotop-item -->

            <div class="st-isotop-item website creative">
              <a href="https://via.placeholder.com/1030x700" class="st-project st-zoom st-lightbox-item">
                <div class="st-project-img st-zoom-in"><img src="https://via.placeholder.com/1030x700" alt="project3"></div>
                <div class="st-plus"><span></span></div>
              </a>
            </div><!-- .st-isotop-item -->

            <div class="st-isotop-item website creative">
              <a href="https://via.placeholder.com/575x700" class="st-project st-zoom st-lightbox-item">
                <div class="st-project-img st-zoom-in"><img src="https://via.placeholder.com/575x700" alt="project4"></div>
                <div class="st-plus"><span></span></div>
              </a>
            </div><!-- .st-isotop-item -->

            <div class="st-isotop-item branding photography">
              <a href="https://via.placeholder.com/575x700" class="st-project st-zoom st-lightbox-item">
                <div class="st-project-img st-zoom-in"><img src="https://via.placeholder.com/575x700" alt="project5"></div>
                <div class="st-plus"><span></span></div>
              </a>
            </div><!-- .st-isotop-item -->

            <div class="st-isotop-item branding">
              <a href="https://via.placeholder.com/1030x700" class="st-project st-zoom st-lightbox-item">
                <div class="st-project-img st-zoom-in"><img src="https://via.placeholder.com/1030x700" alt="project6"></div>
                <div class="st-plus"><span></span></div>
              </a>
            </div><!-- .st-isotop-item -->
          </div><!-- .isotop -->
        </div>
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Project Section -->
    <hr>
    <!-- Start Skill Section -->
    <section>
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
            <div class="st-slider st-style1">
              <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="800" data-autoplay-timeout="1000" data-center="0" data-slides-per-view="1">
                <div class="slick-wrapper">
                  <div class="slick-slide-in">
                    <div class="st-gallery-img st-style1 st-dynamic-bg" data-src="https://via.placeholder.com/570x435"></div>
                  </div>
                  <div class="slick-slide-in">
                    <div class="st-gallery-img st-style1 st-dynamic-bg" data-src="https://via.placeholder.com/570x435"></div>
                  </div>
                  <div class="slick-slide-in">
                    <div class="st-gallery-img st-style1 st-dynamic-bg" data-src="https://via.placeholder.com/570x435"></div>
                  </div>
                </div>
              </div><!-- .slick-container -->
              <div class="pagination st-style2"></div> <!-- If dont need Pagination then add class .st-hidden -->
              <div class="swipe-arrow st-style1 st-hidden"> <!-- If dont need navigation then add class .st-hidden -->
                <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
                <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
              </div>
            </div><!-- .st-slider -->
            <div class="st-height-b0 st-height-lg-b30"></div>
          </div><!-- .col -->
          <div class="col-lg-6">
            <div class="st-vertical-middle">
              <div class="st-vertical-middle-in">
                <div class="st-skill-wrap">
                  <div class="st-skill-heading">
                    <h2 class="st-skill-title">Skills & Expertise</h2>
                    <div class="st-skill-subtitle">A skill is the ability to carry out a task with determined results often within a given amount of time. Skill usually requires certain environmental stimuli and situations to assess. Skilled memory enables experts to rapidly encode.</div>
                    <div class="st-height-b20 st-height-lg-b20"></div>
                  </div><!-- .st-skill-heading -->
                  <div class="st-progressbar-wrap">
                    <div class="st-single-progressbar">
                      <div class="st-progressbar-heading">
                        <h3 class="st-progressbar-title">Web Development</h3>
                        <div class="st-progressbar-percentage">90%</div>
                      </div>
                      <div class="st-progressbar" data-progress="90">
                        <div class="st-progressbar-in"></div>
                      </div>
                    </div><!-- .st-single-progressbar -->
                    <div class="st-height-b20 st-height-lg-b20"></div>
                    <div class="st-single-progressbar">
                      <div class="st-progressbar-heading">
                        <h3 class="st-progressbar-title">Web Design</h3>
                        <div class="st-progressbar-percentage">95%</div>
                      </div>
                      <div class="st-progressbar" data-progress="95">
                        <div class="st-progressbar-in"></div>
                      </div>
                    </div><!-- .st-single-progressbar -->
                    <div class="st-height-b20 st-height-lg-b20"></div>
                    <div class="st-single-progressbar">
                      <div class="st-progressbar-heading">
                        <h3 class="st-progressbar-title">HTML / CSS</h3>
                        <div class="st-progressbar-percentage">85%</div>
                      </div>
                      <div class="st-progressbar" data-progress="85">
                        <div class="st-progressbar-in"></div>
                      </div>
                    </div><!-- .st-single-progressbar -->
                    <div class="st-height-b20 st-height-lg-b20"></div>
                    <div class="st-single-progressbar">
                      <div class="st-progressbar-heading">
                        <h3 class="st-progressbar-title">WordPress</h3>
                        <div class="st-progressbar-percentage">80%</div>
                      </div>
                      <div class="st-progressbar" data-progress="80">
                        <div class="st-progressbar-in"></div>
                      </div>
                    </div><!-- .st-single-progressbar -->
                    <div class="st-height-b20 st-height-lg-b20"></div>
                    <div class="st-single-progressbar">
                      <div class="st-progressbar-heading">
                        <h3 class="st-progressbar-title">Photoshop</h3>
                        <div class="st-progressbar-percentage">95%</div>
                      </div>
                      <div class="st-progressbar" data-progress="95">
                        <div class="st-progressbar-in"></div>
                      </div>
                    </div><!-- .st-single-progressbar -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- .col -->
        </div>
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Skill Section -->
    <hr>
    <!-- Start Team Section -->
    <section id="team">
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-section-heading st-style1">
          <h2 class="st-section-heading-title">Top Enlisted Schools</h2>
          <div class="st-section-heading-seperator left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          <div class="st-section-heading-subtitle">We cover a wide range of schools all over the 47 Kenyan Counties <br></div>
        </div>
        <div class="st-height-b40 st-height-lg-b40"></div>
      </div>
      <div class="container">
        <div class="st-slider st-style2">
          <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4">
            <div class="slick-wrapper">
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Rodney Artichoke</h3>
                      <div class="st-member-designation">UI/UX Designer</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="member2" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Aston Dark</h3>
                      <div class="st-member-designation">Web Developer</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="member3" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Lili Poker</h3>
                      <div class="st-member-designation">UI/UX Designer</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="member4" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Cris Donald</h3>
                      <div class="st-member-designation">Business Analysis</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Rodney Artichoke</h3>
                      <div class="st-member-designation">UI/UX Designer</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="member2" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Aston Dark</h3>
                      <div class="st-member-designation">Web Developer</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="member3" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Lili Poker</h3>
                      <div class="st-member-designation">UI/UX Designer</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
              <div class="slick-slide-in">
                <div class="st-member st-style1 st-zoom">
                  <div class="st-member-img">
                    <img src="https://via.placeholder.com/270x350" alt="member4" class="st-zoom-in">
                  </div>
                  <div class="st-member-meta">
                    <div class="st-member-meta-in">
                      <h3 class="st-member-name">Cris Donald</h3>
                      <div class="st-member-designation">Business Analysis</div>
                    </div>
                    <ul class="st-member-social st-mp0">
                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                      <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div><!-- .slick-slide-in -->
            </div>
          </div><!-- .slick-container -->
          <div class="pagination st-style1 st-flex st-hidden"></div> <!-- If dont need Pagination then add class .st-hidden -->
          <div class="swipe-arrow st-style1"> <!-- If dont need navigation then add class .st-hidden -->
            <div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
            <div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
          </div>
        </div><!-- .st-slider -->
      </div><!-- .container -->
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Team Section -->

    <!-- Start CallToAction -->
    <section class="st-cta-section st-dynamic-bg st-bg st-gray-bg" data-src="https://via.placeholder.com/1920x390">
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-cta st-style1 text-center">
          <h2 class="st-cta-title">Build your Perfect Template Now!</h2>
          <div class="st-cta-subtitle">If you want to create a new website for your business, do not hesitate to contact us today. We have <br>created you to provide all types of services on the website.</div>
          <div class="st-cta-btn"><a href="#" class="st-btn st-style1 st-color1">Get It Now</a></div>
        </div>
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End CallToAction -->

    <!-- Start Pricing Table -->
    <!-- <section id="price">
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-section-heading st-style1">
          <h2 class="st-section-heading-title">Pricing Plan</h2>
          <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
        </div>
        <div class="st-height-b40 st-height-lg-b40"></div>
      </div>
      <div class="container">
        <div class="st-slider st-style2 st-pricing-wrap">
          <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
            <div class="slick-wrapper">
              <div class="slick-slide-in">
                <div class="st-pricing-table st-style1">
                  <div class="st-pricing-head">
                    <div class="st-pricing-head-in">
                      <h2 class="st-price">$29</h2>
                      <div class="st-price-per">per month</div>
                    </div>
                  </div>
                  <div class="st-pricing-feature">
                    <h2 class="st-pricing-feature-title">Economy</h2>
                    <ul class="st-pricing-feature-list st-mp0">
                      <li>Free Suppport 24/7</li>
                      <li>Databases Download</li>
                      <li>Maintenance Email</li>
                      <li>Unlimited Traffic</li>
                    </ul>
                    <div class="st-pricing-btn">
                      <a href="#" class="st-btn st-style2 st-color1 st-size-medium">Star The Plan</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-pricing-table st-style1">
                  <div class="st-pricing-head">
                    <div class="st-pricing-head-in">
                      <h2 class="st-price">$39</h2>
                      <div class="st-price-per">per month</div>
                    </div>
                  </div>
                  <div class="st-pricing-feature">
                    <h2 class="st-pricing-feature-title">Deluxe</h2>
                    <ul class="st-pricing-feature-list st-mp0">
                      <li>Free Suppport 24/7</li>
                      <li>Databases Download</li>
                      <li>Maintenance Email</li>
                      <li>Unlimited Traffic</li>
                    </ul>
                    <div class="st-pricing-btn">
                      <a href="#" class="st-btn st-style2 st-color1 st-size-medium">Star The Plan</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-pricing-table st-style1">
                  <div class="st-pricing-head">
                    <div class="st-pricing-head-in">
                      <h2 class="st-price">$49</h2>
                      <div class="st-price-per">per month</div>
                    </div>
                  </div>
                  <div class="st-pricing-feature">
                    <h2 class="st-pricing-feature-title">Ultimate</h2>
                    <ul class="st-pricing-feature-list st-mp0">
                      <li>Free Suppport 24/7</li>
                      <li>Databases Download</li>
                      <li>Maintenance Email</li>
                      <li>Unlimited Traffic</li>
                    </ul>
                    <div class="st-pricing-btn">
                      <a href="#" class="st-btn st-style2 st-color1 st-size-medium">Star The Plan</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-pricing-table st-style1">
                  <div class="st-pricing-head">
                    <div class="st-pricing-head-in">
                      <h2 class="st-price">$149</h2>
                      <div class="st-price-per">per month</div>
                    </div>
                  </div>
                  <div class="st-pricing-feature">
                    <h2 class="st-pricing-feature-title">Dimond</h2>
                    <ul class="st-pricing-feature-list st-mp0">
                      <li>Free Suppport 24/7</li>
                      <li>Databases Download</li>
                      <li>Maintenance Email</li>
                      <li>Unlimited Traffic</li>
                    </ul>
                    <div class="st-pricing-btn">
                      <a href="#" class="st-btn st-style2 st-color1 st-size-medium">Star The Plan</a>
                    </div>
                  </div>
                </div>
              </div>>
            </div>
          </div>
          <div class="pagination st-style1 st-flex st-hidden"></div> 
          <div class="swipe-arrow st-style1"> 
            <div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
            <div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
          </div>
        </div>
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section> -->
    <!-- End Pricing Table -->

    <!-- Start Blog Section -->
    <!-- <section class="st-gray-bg" id="blog">
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-section-heading st-style1">
          <h2 class="st-section-heading-title">Latest News</h2>
          <div class="st-section-heading-seperator left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
        </div>
        <div class="st-height-b40 st-height-lg-b40"></div>
      </div>
      <div class="container">
        <div class="st-slider st-style2 st-pricing-wrap">
          <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
            <div class="slick-wrapper">
              <div class="slick-slide-in">
                <div class="st-post st-style2 st-zoom">
                  <a href="blog-details.html" class="st-post-thumb">
                    <img class="st-zoom-in" src="https://via.placeholder.com/370x210" alt="blog1">
                  </a>
                  <div class="st-post-info">
                    <a href="#" class="st-post-avatar">
                      <img src="https://via.placeholder.com/80x80" alt="avatar4">
                      <span class="st-post-avatar-text">Admin</span>
                    </a>
                    <h2 class="st-post-title"><a href="blog-details.html">A business plan is a formal written document business</a></h2>
                    <div class="st-post-text">A business plan is a formal written document containing business goals. The methods on how these goals can be attained ...</div>
                  </div>
                  <div class="st-post-footer">
                    <div class="st-post-date">August 01, 2019</div>
                    <a href="blog-details.html" class="st-post-btn">Read More</a>
                  </div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-post st-style2 st-zoom">
                  <a href="blog-details.html" class="st-post-thumb">
                    <img class="st-zoom-in" src="https://via.placeholder.com/370x210" alt="blog1">
                  </a>
                  <div class="st-post-info">
                    <a href="#" class="st-post-avatar">
                      <img src="https://via.placeholder.com/80x80" alt="avatar4">
                      <span class="st-post-avatar-text">Admin</span>
                    </a>
                    <h2 class="st-post-title"><a href="blog-details.html">A business is the activity of making one's living</a></h2>
                    <div class="st-post-text">Business may offer to many differing activitie, such as the activity of buying or selling in trade. Business activity monitoring ...</div>
                  </div>
                  <div class="st-post-footer">
                    <div class="st-post-date">August 15, 2019</div>
                    <a href="blog-details.html" class="st-post-btn">Read More</a>
                  </div>
                </div>
              </div>]
              <div class="slick-slide-in">
                <div class="st-post st-style2 st-zoom">
                  <a href="blog-details.html" class="st-post-thumb">
                    <img class="st-zoom-in" src="https://via.placeholder.com/370x210" alt="blog1">
                  </a>
                  <div class="st-post-info">
                    <a href="#" class="st-post-avatar">
                      <img src="https://via.placeholder.com/80x80" alt="avatar4">
                      <span class="st-post-avatar-text">Admin</span>
                    </a>
                    <h2 class="st-post-title"><a href="blog-details.html">Business statistics is the science of good decision</a></h2>
                    <div class="st-post-text">Business statistics is the science of good decision in the face of ambiguity and is used in many system ...</div>
                  </div>
                  <div class="st-post-footer">
                    <div class="st-post-date">August 01, 2019</div>
                    <a href="blog-details.html" class="st-post-btn">Read More</a>
                  </div>
                </div>
              </div>]
              <div class="slick-slide-in">
                <div class="st-post st-style2 st-zoom">
                  <a href="blog-details.html" class="st-post-thumb">
                    <img class="st-zoom-in" src="https://via.placeholder.com/370x210" alt="blog1">
                  </a>
                  <div class="st-post-info">
                    <a href="#" class="st-post-avatar">
                      <img src="https://via.placeholder.com/80x80" alt="avatar4">
                      <span class="st-post-avatar-text">Admin</span>
                    </a>
                    <h2 class="st-post-title"><a href="blog-details.html">A business plan is a formal written document business</a></h2>
                    <div class="st-post-text">A business plan is a formal written document containing business goals. The methods on how these goals can be attained ...</div>
                  </div>
                  <div class="st-post-footer">
                    <div class="st-post-date">August 01, 2019</div>
                    <a href="blog-details.html" class="st-post-btn">Read More</a>
                  </div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-post st-style2 st-zoom">
                  <a href="blog-details.html" class="st-post-thumb">
                    <img class="st-zoom-in" src="https://via.placeholder.com/370x210" alt="blog1">
                  </a>
                  <div class="st-post-info">
                    <a href="#" class="st-post-avatar">
                      <img src="https://via.placeholder.com/80x80" alt="avatar4">
                      <span class="st-post-avatar-text">Admin</span>
                    </a>
                    <h2 class="st-post-title"><a href="blog-details.html">A business is the activity of making one's living</a></h2>
                    <div class="st-post-text">Business may offer to many differing activitie, such as the activity of buying or selling in trade. Business activity monitoring ...</div>
                  </div>
                  <div class="st-post-footer">
                    <div class="st-post-date">August 15, 2019</div>
                    <a href="blog-details.html" class="st-post-btn">Read More</a>
                  </div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-post st-style2 st-zoom">
                  <a href="blog-details.html" class="st-post-thumb">
                    <img class="st-zoom-in" src="https://via.placeholder.com/370x210" alt="blog1">
                  </a>
                  <div class="st-post-info">
                    <a href="#" class="st-post-avatar">
                      <img src="https://via.placeholder.com/80x80" alt="avatar4">
                      <span class="st-post-avatar-text">Admin</span>
                    </a>
                    <h2 class="st-post-title"><a href="blog-details.html">Business statistics is the science of good decision</a></h2>
                    <div class="st-post-text">Business statistics is the science of good decision in the face of ambiguity and is used in many system ...</div>
                  </div>
                  <div class="st-post-footer">
                    <div class="st-post-date">August 01, 2019</div>
                    <a href="#" class="st-post-btn">Read More</a>
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
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section> -->
    <!-- End Blog Section -->

    <!-- Start Testimonial Seciton -->
    <!-- <section>
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-section-heading st-style1">
          <h2 class="st-section-heading-title">Testimonials</h2>
          <div class="st-section-heading-seperator left wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          <div class="st-section-heading-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit <br>sed do eiusmod tempor incididunt.</div>
        </div>
        <div class="st-height-b40 st-height-lg-b40"></div>
      </div>
      <div class="container">
        <div class="st-slider st-style2 st-pricing-wrap">
          <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
            <div class="slick-wrapper">
              <div class="slick-slide-in">
                <div class="st-testimonial st-style1 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <div class="st-testimonial-text">“I am very happy to create a website from you. Whatever I wanted for my website, I got everything from very quickly. When I made a website in the future, I will build from you. Whatever I wanted for my website live on it.”</div>
                  <div class="st-testimonial-info">
                    <div class="st-testimonial-img"><img src="https://via.placeholder.com/80x80" alt="avatar1"></div>
                    <div class="st-testimonial-meta">
                      <h4 class="st-testimonial-name">Myrtle Dietr</h4>
                      <div class="st-testimonial-designation">Director</div>
                    </div>
                  </div>
                  <div class="st-quote"><i class="fas fa-quote-right"></i></div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-testimonial st-style1">
                  <div class="st-testimonial-text">“There are many variations of passages of Lorem Ipsum available, but the majori have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.”</div>
                  <div class="st-testimonial-info">
                    <div class="st-testimonial-img"><img src="https://via.placeholder.com/80x80" alt="avatar2"></div>
                    <div class="st-testimonial-meta">
                      <h4 class="st-testimonial-name">Cristy Warner</h4>
                      <div class="st-testimonial-designation">Software engineer</div>
                    </div>
                  </div>
                  <div class="st-quote"><i class="fas fa-quote-right"></i></div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-testimonial st-style1 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <div class="st-testimonial-text">“It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.”</div>
                  <div class="st-testimonial-info">
                    <div class="st-testimonial-img"><img src="https://via.placeholder.com/80x80" alt="avatar3"></div>
                    <div class="st-testimonial-meta">
                      <h4 class="st-testimonial-name">Mark McDonald</h4>
                      <div class="st-testimonial-designation">Scientist</div>
                    </div>
                  </div>
                  <div class="st-quote"><i class="fas fa-quote-right"></i></div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-testimonial st-style1 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <div class="st-testimonial-text">“I am very happy to create a website from you. Whatever I wanted for my website, I got everything from very quickly. When I made a website in the future, I will build from you. Whatever I wanted for my website live on it.”</div>
                  <div class="st-testimonial-info">
                    <div class="st-testimonial-img"><img src="https://via.placeholder.com/80x80" alt="avatar1"></div>
                    <div class="st-testimonial-meta">
                      <h4 class="st-testimonial-name">Myrtle Dietr</h4>
                      <div class="st-testimonial-designation">Director</div>
                    </div>
                  </div>
                  <div class="st-quote"><i class="fas fa-quote-right"></i></div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-testimonial st-style1">
                  <div class="st-testimonial-text">“There are many variations of passages of Lorem Ipsum available, but the majori have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.”</div>
                  <div class="st-testimonial-info">
                    <div class="st-testimonial-img"><img src="https://via.placeholder.com/80x80" alt="avatar2"></div>
                    <div class="st-testimonial-meta">
                      <h4 class="st-testimonial-name">Cristy Warner</h4>
                      <div class="st-testimonial-designation">Software engineer</div>
                    </div>
                  </div>
                  <div class="st-quote"><i class="fas fa-quote-right"></i></div>
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-testimonial st-style1 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <div class="st-testimonial-text">“It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.”</div>
                  <div class="st-testimonial-info">
                    <div class="st-testimonial-img"><img src="https://via.placeholder.com/80x80" alt="avatar3"></div>
                    <div class="st-testimonial-meta">
                      <h4 class="st-testimonial-name">Mark McDonald</h4>
                      <div class="st-testimonial-designation">Scientist</div>
                    </div>
                  </div>
                  <div class="st-quote"><i class="fas fa-quote-right"></i></div>
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
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </section> -->
    <!-- End Testimonial Seciton -->

    <!-- Start News Letter -->
    <section class="st-news-letter-section st-dynamic-bg st-bg st-gray-overlay" data-src="https://via.placeholder.com/630x315">
      <div class="st-height-b115 st-height-lg-b80"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="contacts-txt text-center">	

              <!-- Title -->	
              <h3 class="h3-sm">Need Help? Get in Touch</h3>	

              <!-- Text -->	
              <p class="p-md">Have questions about mentorship and school opportunities?</p>	

              <!-- Button -->	
              <a class="btn btn-md btn-seco tra-white-hover" href="mailto:yourdomain@mail.com">hello@yourdomain.com</a>

            </div>		
            <!-- <div class="st-news-letter">
              <h2 class="st-news-letter-title">Subscribe & stay updated</h2>
              <form class="mailchimp st-news-letter-form" action="https://storerepublic.us12.list-manage.com/subscribe/post?u=d227d8d335060b093084903d0&amp;id=9ba078ceb0">
                <input type="email" name="subscribe" id="subscriber-email" placeholder="Enter Your Email Address">
                <button type="submit" id="subscribe-button" class="st-btn st-style1 st-color1 st-size-medium">Subscribe Now</button>
                <h5 class="subscription-success"> .</h5>
                <h5 class="subscription-error"> .</h5>
                <label class="subscription-label" for="subscriber-email"></label>
              </form>
            </div> -->
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div>
          <!-- <div class="col-xl-3 offset-xl-1 col-lg-4">
            <div class="st-contact-number-wrap">
              <h2 class="st-contact-number-title">Emergency cases</h2>
              <div class="st-contact-number">
                <i class="fas fa-phone-volume"></i>
                <h3>Call Us!</h3>
                <span class="st-mobile-number">2222 333 7889</span>
              </div>
            </div>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div> -->
        </div>
      </div>
      <div class="st-height-b85 st-height-lg-b50"></div>
    </section>
    <!-- End News Letter -->

    <!-- Start Contact Section -->
    <section id="contact">
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-section-heading st-style1">
          <h2 class="st-section-heading-title">Contact Us</h2>
          <div class="st-section-heading-seperator left wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          <div class="st-section-heading-subtitle">Easily get in touch, incase of any enquries.</div>
        </div>
        <div class="st-height-b40 st-height-lg-b40"></div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="st-alert"></div>
            <form action="assets/php/mail.php" class="row st-contact-form" method="post"  id="contact-form">
              <div class="col-lg-6">
                <div class="st-form-field">      
                  <input type="text" id="name" name="name" required>
                  <label>Full Name</label>
                </div>
              </div><!-- .col -->
              <div class="col-lg-6">
                <div class="st-form-field">      
                  <input type="text" id="email" name="email" required>
                  <label>Email Address</label>
                </div>
              </div><!-- .col -->
              <div class="col-lg-6">
                <div class="st-form-field">      
                  <input type="text" id="subject" name="subject" required>
                  <label>Subject</label>
                </div>
              </div><!-- .col -->
              <div class="col-lg-6">
                <div class="st-form-field">      
                  <input type="text" id="phone" name="phone" required>
                  <label>Phone</label>
                </div>
              </div><!-- .col -->
              <div class="col-lg-12">
                <div class="st-form-field">      
                  <textarea cols="30" rows="10" id="msg" name="msg" required></textarea>
                  <label>Your Message</label>
                </div>
              </div><!-- .col -->
              <div class="col-lg-12">
                <button class="st-btn st-style1 st-color1 st-size-medium" type="submit" id="submit" name="submit">Send message</button>
                <div class="empty-space col-lg-b30"></div>
              </div><!-- .col -->
            </form>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div>
          <!-- <div class="col-lg-4">
            <div class="st-contact-info">
              <h2 class="st-contact-info-title">Corporate Office</h2>
              <ul class="st-contact-info-list st-mp0">
                <li><i class="fas fa-map-marker-alt"></i>503 Old Buffalo Street Northwest#205, New York-3087</li>
                <li><i class="fas fa-phone-volume"></i>+00 222- 333 -7889</li>
                <li><i class="fas fa-envelope"></i><a href="#">support@vorosha.com</a></li>
                <li><i class="fas fa-globe"></i><a href="#">www.vorosha.com</a></li>
              </ul>
            </div>
            <div class="st-height-b30 st-height-lg-b40"></div>
            <div class="st-shidule">
              <h2 class="st-shidule-title">Work Hours</h2>
              <ul class="st-shidule-list st-mp0">
                <li><span>Monday</span><span>8:00 AM – 4:30 PM</span></li>
                <li><span>Tuesday</span><span>8:00 AM – 4:30 PM</span></li>
                <li><span>Wednesday</span><span>8:00 AM – 4:30 PM</span></li>
                <li><span>Thursday</span><span>8:00 AM – 4:30 PM</span></li>
                <li><span>Friday</span><span>8:00 AM – 2:30 PM</span></li>
                <li><span>Saturday</span><span>8:00 AM – 2:30 PM</span></li>
                <li><span>Sunday</span><span>Closed</span></li>
              </ul>
            </div>
            <div class="st-height-b30 st-height-lg-b30"></div>
          </div> -->
        </div>
      </div>
      <div class="st-height-b90 st-height-lg-b50"></div>
    </section>
    <!-- End Contact Section -->
    <hr>
    <!-- Start Logo Carousel -->
    <!-- <div>
      <div class="st-height-b120 st-height-lg-b80"></div>
      <div class="container">
        <div class="st-slider st-style2 st-pricing-wrap">
          <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
            <div class="slick-wrapper">
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/85x67" alt="client1">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/143x73" alt="client2">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/100x70" alt="client3">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/100x70" alt="client4">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/450x50" alt="client5">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/85x67" alt="client1">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/143x73" alt="client2">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/100x70" alt="client3">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/100x70" alt="client4">
                </div>
              </div>
              <div class="slick-slide-in">
                <div class="st-logo-carousel st-style1">
                  <img src="https://via.placeholder.com/450x50" alt="client5">
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
      </div>
      <div class="st-height-b120 st-height-lg-b80"></div>
    </div> -->
  </div>

  <!-- Start Footer -->
  <footer class="st-site-footer">
    <!-- <footer class="st-site-footer st-sticky-footer"></footer> -->
    <div class="st-main-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <div class="st-text-field">
                <img src="https://via.placeholder.com/208x41" alt="Vorosha" class="st-white-logo">
                <img src="https://via.placeholder.com/208x41" alt="Vorosha" class="st-dark-logo">
                <div class="st-height-b25 st-height-lg-b25"></div>
                <div class="st-footer-text">Top School evolutionary Mentorship platform</div>
                <div class="st-height-b25 st-height-lg-b25"></div>
                <ul class="st-social-btn st-style1 st-mp0">
                  <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                  <!-- <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li> -->
                  <!--youtube-->
                  <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title">Useful Links</h2>
              <ul class="st-footer-widget-nav st-mp0">
                <li><a href="#"><i class="fas fa-chevron-right"></i>FAQs</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Blog</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Weekly timetable</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Terms & Conditions</a></li>
              </ul>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title">Company Info</h2>
              <ul class="st-footer-widget-nav st-mp0">
                <li><a href="#"><i class="fas fa-chevron-right"></i>About Us</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Our Services</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Support</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Privacy Policy</a></li>
              </ul>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <div class="st-contact-info">
                <h2 class="st-footer-widget-title">Corporate Office</h2>
                <ul class="st-contact-info-list st-mp0">
                  <li><i class="fas fa-map-marker-alt"></i>Nairobi, Kenya</li>
                  <li><i class="fas fa-phone-volume"></i><a href="tel:+254 723 739882">+254 723 739882</a></li>
                  <li><i class="fas fa-envelope"></i><a href="mailto:support@mastadi.org">support@mastadi.org</a></li>
                  <li><i class="fas fa-globe"></i><a href="#">www.mastadi.org</a></li>
                </ul>
              </div>
              <!-- <h2 class="st-footer-widget-title">Recent Post</h2>
              <ul class="st-post-widget-list st-mp0">
                <li>
                  <div class="st-post st-style1">
                    <a href="#" class="st-post-thumb st-zoom"><img src="https://via.placeholder.com/80x70" alt="post1" class="st-zoom-in"></a>
                    <div class="st-post-info">
                      <ul class="st-categories st-style1 st-mp0">
                        <li><a href="#">Lifestyle</a></li>
                      </ul>
                      <h2 class="st-post-title"><a href="blog-details.html">Business Consultancy</a></h2>
                      <div class="st-post-date">1 Hours Ago</div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="st-post st-style1">
                    <a href="#" class="st-post-thumb st-zoom"><img src="https://via.placeholder.com/80x70" alt="post2" class="st-zoom-in"></a>
                    <div class="st-post-info">
                      <ul class="st-categories st-style1 st-mp0">
                        <li><a href="#">Lifestyle</a></li>
                      </ul>
                      <h2 class="st-post-title"><a href="blog-details.html">Accessible New Design</a></h2>
                      <div class="st-post-date">3 Hours Ago</div>
                    </div>
                  </div>
                </li>
              </ul> -->
            </div>
          </div><!-- .col -->
        </div>
      </div>
    </div>
    <div class="st-copyright-wrap">
      <div class="container">
        <div class="st-copyright-in text-center">
          <div class="st-left-copyright" style="margin: 0 auto;">
            <div class="st-copyright-text">Copyright @<script>document.write(new Date().getFullYear())</script> <a href="#" style="font-weight: 700;">Ustadi</a>. All Rights Reserved</div>
          </div>
          <div class="st-right-copyright">
            <div id="st-backtotop"><i class="fas fa-angle-up"></i></div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Start Video Popup -->
  <div class="st-video-popup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
      <div class="st-video-popup-layer"></div>
      <div class="st-video-popup-container">
        <div class="st-video-popup-align">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="about:blank"></iframe>
          </div>
        </div>
        <div class="st-video-popup-close"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->

  <!-- Scripts -->
  
  <script src="{{ asset('assets/landing/js/vendor/modernizr-3.5.0.min.js') }}"></script>
  <script src="{{ asset('assets/landing/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/isotope.pkg.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/jquery.slick.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/mailchimp.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/counter.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/lightgallery.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/wow.min.js')}}"></script>
  <script src="{{ asset('assets/landing/js/main.js')}}"></script>
</html>
