<!-- HEADER
			============================================= -->
<header id="header" class="header tra-menu navbar-light">
	<div class="header-wrapper">


		<!-- MOBILE HEADER -->
		<div class="wsmobileheader clearfix">
			<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
			<span class="smllogo smllogo-black">
				<h1>Osmly Mail</h1>
			</span>
			<span class="smllogo smllogo-white">
				<h1 style="color: White">Osmly Mail</h1>
			</span>
			<a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>
		</div>


		<!-- NAVIGATION MENU -->
		<div class="wsmainfull menu clearfix">
			<div class="wsmainwp clearfix">


				<!-- LOGO IMAGE -->
				<!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 334 x 80 pixels) -->
				<div class="desktoplogo"><a href="#hero-10" class="logo-black">
						<img src="assets/images/Osmly Mail Logo Fix.png" width="120" style="padding: 5px 0px">
					</a></div>
				<div class="desktoplogo"><a href="#hero-10" class="logo-white">
						<img src="assets/images/osmly_logo.png" width="120" style="padding: 5px 0px">
					</a></div>


				<!-- MAIN MENU -->
				<nav class="wsmenu clearfix blue-header">
					<ul class="wsmenu-list">


						<!-- SIMPLE NAVIGATION LINK -->
						<li class="nl-simple" aria-haspopup="true"><a href="/">Home</a></li>
						<li class="nl-simple" aria-haspopup="true"><a href="#about-1">About</a></li>

						<!-- SIMPLE NAVIGATION LINK -->
						<li class="nl-simple" aria-haspopup="true"><a href="#services-2">Services</a></li>


						<!-- SIMPLE NAVIGATION LINK -->
						<li class="" aria-haspopup="true"><a href="#pricing-1">Pricing</a></li>


						<!-- SIMPLE NAVIGATION LINK -->
						<li class="nl-simple" aria-haspopup="true"><a href="#contacts-page">Contact Us</a></li>

						@guest

						<li class="nl-simple" aria-haspopup="true"><a href="/login">Login</a></li>

						<li class="nl-simple" aria-haspopup="true"><a href="/register">Register</a></li>
						@else
						<!-- <li class="nl-simple" aria-haspopup="true"><a href="/home">Go To App</a></li>
						<li class="nl-simple" aria-haspopup="true"><a href="/home">{{ \Auth::user()->name }}</a></li> -->
						<li class="nl-simple" aria-haspopup="true">
							<a href="/home" class="btn btn-primary tra-white-hover last-link">Go To App</a>
						</li>
						@endguest


						<!-- HEADER PHONE NUMBER -->
						<!-- <li class="nl-simple primary-scroll" aria-haspopup="true">
								    	<a href="tel:123456789" class="last-link last-link-number">
								    		<i class="fas fa-phone-square-alt"></i> 855-569-7890
								    	</a>
								    </li> -->



						<!-- HEADER BUTTON 
								 -->


					</ul>
				</nav> <!-- END MAIN MENU -->

			</div>
		</div> <!-- END NAVIGATION MENU -->


	</div> <!-- End header-wrapper -->
</header> <!-- END HEADER -->