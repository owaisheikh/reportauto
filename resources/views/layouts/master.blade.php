<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('tempimg/favicon.png')}}" type="image/png">
        <title>@yield('title')</title>
		<!-- Bootstrap CSS -->
		
			

		<script src="http://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	
	</script>

        <link rel="stylesheet" href="{{ asset('css/tempcss/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/MeetMe-doc/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/lightbox/simpleLightbox.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/flaticon/flaticon.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/tempcss/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/tempcss/responsive.css')}}">
    </head>
    <body>
          
        <!--================Header Menu Area =================-->
        <header class="header_area" style="background:background-image: -moz-linear-gradient( 0deg, rgb(118,109,255) 0%, rgb(136,243,255) 100%);
        background-image: -webkit-linear-gradient( 0deg, rgb(118,109,255) 0%, rgb(136,243,255) 100%);
        background-image: -ms-linear-gradient( 0deg, rgb(118,109,255) 0%, rgb(136,243,255) 100%);">
            <div class="main_menu">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                    @endif
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620" >
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('tempimg/logo.jpg')}}" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="/">Home</a></li> 
								
                                
                                <li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="/reports">Your reports</a></li>
										<li class="nav-item"><a class="nav-link" href="/reports/create">Create Reports</a></li>
									</ul>
								</li> 
                                
                                
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="portfolio.html">Portfolio</a></li>
										<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
									</ul>
								</li> 
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
										<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
									</ul>
								</li> 
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                                
                                <li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-power-off"></i>GUD BYE</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="blog.html">setting</a></li>
										<li class="nav-item">

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        
                                        </li>
									</ul>
								</li> 
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
      
        <!--================Header Menu Area =================-->
        
 
        @yield('bodybaba')

          
        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>About Me</h3>
        					</div>
        					<p>Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills,</p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
        					<div class="f_title">
        						<h3>Newsletter</h3>
        					</div>
        					<p>Stay updated with our latest trends</p>
        					<div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                	<div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>				
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
        				</aside>
        			</div>
        			<div class="col-lg-2">
        				<aside class="f_widget social_widget">
        					<div class="f_title">
        						<h3>Follow Me</h3>
        					</div>
        					<p>Let us be social</p>
        					<ul class="list">
        						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
        						<li><a href="#"><i class="fa fa-behance"></i></a></li>
        					</ul>
        				</aside>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		
        <script src="{{ asset('js/tempjs/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('js/tempjs/popper.js')}}"></script>
        <script src="{{ asset('js/tempjs/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/tempjs/stellar.js')}}"></script>
        <script src="{{ asset('assets/vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('js/tempjs/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/counter-up/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('js/tempjs/mail-script.js')}}"></script>
        <script src="{{ asset('js/tempjs/theme.js')}}"></script>
        <script src="{{ asset('js/time.js')}}"></script>
    </body>
</html>