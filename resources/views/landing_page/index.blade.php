@extends('landing_page.layout')

@section('body-content')
<style type="text/css">
	.pricing-slider {
  max-width: 280px;
  margin: 0 auto;
}

.form-slider span {
  display: block;
  font-weight: 500;
  text-align: center;
  margin-bottom: 16px;
}

.pricing-slider {
  margin-bottom: 48px;
}

.pricing-slider {
  max-width: 280px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
}
.pricing-slider input {
  width: 100%;
}
.pricing-slider .pricing-slider-value {
  position: absolute;
  font-size: 14px;
  line-height: 22px;
  font-weight: 500;
  color: #909cb5;
  margin-top: 8px;
  --thumb-size: 36px;
}
.pricing-items {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-right: -12px;
  margin-left: -12px;
  margin-top: -12px;
}
.pricing-item {
  flex-basis: 280px;
  max-width: 280px;
  box-sizing: content-box;
  padding: 12px;
}
.pricing-item-inner {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  height: 100%;
  padding: 24px;
  box-shadow: 0 8px 16px rgba(46, 52, 88, 0.16);
}
.pricing-item-title {
  font-weight: 500;
}
.pricing-item-price {
  display: inline-flex;
  align-items: baseline;
  font-size: 20px;
}
.pricing-item-price-amount {
  font-size: 36px;
  line-height: 48px;
  font-weight: 500;
  color: #191e2a;
}
.pricing-item-features-list {
  list-style: none;
  padding: 0;
}
.pricing-item-features-list li {
  margin-bottom: 0;
  padding: 14px 0;
  position: relative;
  display: flex;
  align-items: center;
}
.pricing-item-features-list li::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  display: block;
  height: 1px;
  background: #e9ecf8;
}
.pricing-item-features-list li::after {
  content: "";
  display: block;
  width: 24px;
  height: 24px;
  margin-right: 12px;
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M5%2011h14v2H5z%22%20fill%3D%22%239298B8%22%20fill-rule%3D%22nonzero%22%2F%3E%3C%2Fsvg%3E");
  background-repeat: no-repeat;
  -webkit-box-ordinal-group: 0;
  order: -1;
}
.pricing-item-features-list li.is-checked::after {
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill-rule%3D%22nonzero%22%20fill%3D%22none%22%3E%3Ccircle%20fill%3D%22%2300C2A9%22%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%2212%22%2F%3E%3Cpath%20fill%3D%22%23fff%22%20d%3D%22M10.5%2012.267l-2.5-1.6-1%201.066L10.5%2016%2017%209.067%2016%208z%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E");
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
      height: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
#subscription_pricing{
  display: none;
}

</style>


        	@include('landing_page.nav_bar')


			<!-- HERO-10
			============================================= -->	
			<section id="hero-10" class="bg-scroll hero-section division">
				<div class="container">	
					<div class="row">


						<!-- HERO TEXT -->
						<div class="col-xl-10 offset-xl-1">
							<div class="hero-txt text-center white-color">

								<!-- Title -->	
								<h4>Ready To Grow Your Business?</h4>
								<h3>Get More Leads, More Customers, and More Sales with Osmly Mail</h3>

								<!-- Text -->
								<!-- <p>Egestas magna egestas magna ipsum vitae purus ipsum primis in cubilia laoreet augue luctus 
								   magna dolor luctus undo magna an dolor
								</p> -->

								<!-- Button -->
								<a href="#services-2" class="btn btn-md btn-primary tra-white-hover">Explore More</a>
								
							</div>
						</div>	<!-- END HERO TEXT -->


					</div>    <!-- End row --> 	
				</div>	   <!-- End container --> 	


				<!-- HERO WAVES -->
			    <div class="hero-waves">
			        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
			            <defs>
			                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
			            </defs>
			            <g class="parallax">
			                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
			                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
			                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
			                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
			            </g>
			        </svg>
			    </div> <!-- END HERO WAVES -->


			</section>	<!-- END HERO-10 -->	




			<!-- ABOUT-1
			============================================= -->
			<section id="about-1" class="wide-60 about-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- ABOUT IMAGE -->
						<div class="col-md-5 col-lg-6">
							<div class="img-block pr-25 mb-40 wow fadeInLeft" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{asset('assets/landing/images/image-02.png')}}" alt="about-image">
					 		</div>
						</div>


						<!-- ABOUT TEXT -->
					 	<div class="col-md-7 col-lg-6">
					 		<div class="txt-block pc-25 mb-40 wow fadeInRight" data-wow-delay="0.4s">

					 			<!-- Title -->	
								<h4 class="h4-xl darkblue-color">All your marketing needs in one place</h4>

								<!-- List -->
								<ul class="txt-list">
											
									<li>Bring your audience data, marketing channels, and insights together so you can reach your goals faster. With Osmly Mail, you can promote your business across email, social, landing pages, shoppable landing pages, postcards, and more — all from a single platform.
									</li>

								</ul>

								<!-- SMALL STATISTIC -->
								<div class="small-statistic">
									<div class="row">	

										<!-- STATISTIC BLOCK #1 -->
										<div class="col-sm-6">					
											<div class="statistic-block">							
												<h5 class="statistic-number primary-color">4,<span class="count-element">379</span></h5>
												<p class="darkblue-color">Businesses Improved</p>
												<!-- <p class="p-sm">An enim nullam tempor sapien gravida donec blandit ipsum</p>			 -->
											</div>								
										</div>

										<!-- STATISTIC BLOCK #2 -->
										<div class="col-sm-6">						
											<div class="statistic-block">								
												<h5 class="statistic-number primary-color"><span class="count-element">99</span>%</h5>
												<p class="darkblue-color">Customer Satisfaction</p>
												<!-- <p class="p-sm">An enim nullam tempor sapien gravida donec blandit ipsum</p>	 -->
											</div>							
										</div>

									</div>	
								</div>	<!-- END SMALL STATISTIC -->					
								
					 		</div>
					 	</div>	  <!-- END ABOUT TEXT -->


					</div>    <!-- End row --> 	
				</div>	   <!-- End container --> 	
			</section>	<!-- End ABOUT-1 --> 




			<!-- SERVICES-2
			============================================= -->
			<section id="services-2" class="bg-lightcyan wide-30 services-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title wow fadeInUp" data-wow-delay="0.2s">	

							<!-- Title 	-->	
							<h3 class="h3-lg darkblue-color">See what Osmly Mail can do for you</h3>	

							<!-- Text -->	
							<p class="p-lg">No matter your business type or experience level, we have features to help you understand your audience, reach them when it matters most, and get better as you go.
							</p>
								
						</div>
					</div>	<!-- END SECTION TITLE -->	


					<!-- SERVICE BOXES -->	
			 		<div class="row">


	 					<!-- SERVICE BOX #1 -->
	 					<div class="col-sm-6 col-lg-4">
	 						<a href="service-details.html">
		 						<div class="sbox-2 wow fadeInUp" data-wow-delay="0.4s">

		 							<!-- Icon  -->
									<img class="img-85" src="{{asset('assets/landing/images/icons/placeholder-1.png')}}" alt="feature-icon" />

									<!-- Title -->
									<h5 class="h5-md darkblue-color">Custom Contact List</h5>
										
									<!-- Text -->
									<p class="p-sm grey-color">Connect all your tools to unlock more marketing features.</p>

		 						</div>
		 					</a>
	 					</div>


	 					<!-- SERVICE BOX #2 -->
	 					<div class="col-sm-6 col-lg-4">
	 						<a href="service-details.html">
		 						<div class="sbox-2 wow fadeInUp" data-wow-delay="0.6s">

		 							<!-- Icon  -->
									<img class="img-85" src="{{asset('assets/landing/images/icons/online-shop-1.png')}}" alt="feature-icon" />

									<!-- Title -->
									<h5 class="h5-md darkblue-color">Custom Templates / HTML Templates</h5>
										
									<!-- Text -->
									<p class="p-sm grey-color">Our tools make GDPR compliance simple and fast.</p>

		 						</div>
		 					</a>
	 					</div>


	 					<!-- SERVICE BOX #3 -->
	 					<div class="col-sm-6 col-lg-4">
	 						<a href="service-details.html">
		 						<div class="sbox-2 wow fadeInUp" data-wow-delay="0.8s">

		 							<!-- Icon  -->
									<img class="img-85" src="{{asset('assets/landing/images/icons/pie-chart.png')}}" alt="feature-icon" />

									<!-- Title -->
									<h5 class="h5-md darkblue-color">Email Scheduling</h5>
										
									<!-- Text -->
									<p class="p-sm grey-color">Our security tools help protect your account—and your customers' data.</p>

		 						</div>
		 					</a>
	 					</div>


			 		</div>	<!-- END SERVICE BOXES -->	


			 	</div>	   <!-- End container -->		
			</section>	<!-- END SERVICES-2 -->	




			<!-- CONTENT-4
			============================================= -->
			<section id="content-4" class="pt-100 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->		
						<div class="col-md-7 col-lg-6">
							<div class="txt-block pc-25 wow fadeInLeft" data-wow-delay="0.4s">

					 			<!-- Title -->	
								<h4 class="h4-xl darkblue-color">Increase your website traffic with our proven approach</h4>

								<!-- Text -->
								<p>Our Power Analytics helps you collect data about your contacts and turn those insights into action. With a holistic view of your audience, you can learn what they like and create campaigns that feel like conversations.
								</p>

							</div>	
						</div>	<!-- END TEXT BLOCK -->		


						<!-- IMAGE BLOCK -->	
						<div class="col-md-5 col-lg-6">
							<div class="content-4-img wow fadeInRight" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{asset('assets/landing/images/image-11.jpg')}}" alt="content-image">
							</div>	
						</div>


					</div>	  <!-- End row -->	
				</div>     <!-- End container -->
			</section>	<!-- END CONTENT-4 -->


			<!-- SERVICES-4
			============================================= -->
			<section id="services-4" class="wide-60 services-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title wow fadeInUp" data-wow-delay="0.2s">	

							<!-- Title 	-->	
							<h3 class="h3-lg darkblue-color">Your business is growing. Now what?</h3>	

							<!-- Text -->	
							<p class="p-lg">Turn audience insights into personalized marketing with a platform that gets smarter over time.
							</p>
								
						</div>
					</div>


					<!-- SERVICE BOXES -->
					<div class="services-boxes">
			 			<div class="row">
			 			

		 					<!-- SERVICE BOX #1 -->
		 					<div class="col-md-6">
		 						<div class="sbox-4 icon-md wow fadeInUp" data-wow-delay="0.4s">	

		 							<!-- Icon --> 
									<img class="img-65" src="{{asset('assets/landing/images/icons/analytics-2.png')}}" alt="feature-icon" />

									<!-- Text -->
									<div class="sbox-4-txt">
		
										<!-- Title -->
										<h5 class="h5-lg darkblue-color">Advanced Analytics Review</h5>
											
										<!-- Text -->
										<p class="grey-color">See what’s working and what isn’t with real-time performance reports for your campaigns. And get personalized recommendations and data-driven insights from a platform that gets smarter along the way.
										</p>

									</div>

		 						</div>
		 					</div>


		 					<!-- SERVICE BOX #2 -->
		 					<div class="col-md-6">
		 						<div class="sbox-4 icon-md wow fadeInUp" data-wow-delay="0.6s">	

		 							<!-- Icon --> 
									<img class="img-65" src="{{asset('assets/landing/images/icons/email-1.png')}}" alt="feature-icon" />

									<!-- Text -->
									<div class="sbox-4-txt">
		
										<!-- Title -->
										<h5 class="h5-lg darkblue-color">Email Marketing Campaigns</h5>
											
										<!-- Text -->
										<p class="grey-color">We’ll help you get up and running with pre-built templates, ready-made segments, and 1-click automations. With our intuitive design tools, it’s easy to create beautiful campaigns that put your brand in the spotlight.
										</p>

									</div>

		 						</div>
		 					</div>	

						</div>  <!-- End row -->	
			 		</div>	 <!-- END SERVICE BOXES -->	


			 	</div>	   <!-- End container -->		
			</section>	<!-- END SERVICES-4 -->




			<!-- CONTENT-6
			============================================= -->
			<section id="content-6" class="bg-lightcyan wide-60 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- IMAGE BLOCK -->
						<div class="col-md-5 col-lg-6">
							<div class="content-6-img mb-40 wow fadeInLeft" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{asset('assets/landing/images/image-00.png')}}" alt="content-image">
							</div>
						</div>


						<!-- TEXT BLOCK -->	
						<div class="col-md-7 col-lg-6">
							<div class="txt-block pc-25 mb-40 wow fadeInRight" data-wow-delay="0.4s">

								<!-- Title -->	
								<h4 class="h4-xl darkblue-color">Rely on our experienced and knowledgeable team</h4>

								<!-- Text -->
								<p>The more you know about your people, the smarter you can be with your marketing. With all your audience data in one place, you can create the content they’ll enjoy most.
								</p> 

								<h5 class="h5-lg darkblue-color">We're proud to help businesses grow</h5>
								
								<!-- Text -->
								<div class="cbox-1">	
					 				<i class="fas fa-check grey-color"></i>
									<div class="cbox-1-txt">
										<p>We know what it’s like to start a business with big dreams for the future. We’ll help you build your brand and grow your audience while staying true to yourself.
										</p>
									</div>
								</div>

							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>	  <!-- End row -->	
				</div>     <!-- End container -->
			</section>	<!-- END CONTENT-6 -->


			<!-- STATISTIC-1
			============================================= -->
			<div id="statistic-1" class="bg-03 statistic-section division" style="display: none">
				<div class="container white-color">
					<div class="row">


						<!-- STATISTIC BLOCK #1 -->
						<div class="col-sm-6 col-md-3">							
							<div class="statistic-block wow fadeInUp" data-wow-delay="0.4s">

								<!-- Text -->
								<h5 class="statistic-number">3,<span class="count-element">485</span></h5>
								<p class="p-md">Links Optimized</p>																		
													
							</div>								
						</div>


						<!-- STATISTIC BLOCK #2 -->
						<div class="col-sm-6 col-md-3">									
							<div class="statistic-block wow fadeInUp" data-wow-delay="0.6s">

								<!-- Text -->
								<h5 class="statistic-number">1,<span class="count-element">281</span></h5>	
								<p class="p-md">Happy Customers</p>									
																		
							</div>							
						</div>


						<!-- STATISTIC BLOCK #3 -->
						<div class="col-sm-6 col-md-3">						
							<div class="statistic-block wow fadeInUp" data-wow-delay="0.8s">	

								<!-- Text -->
								<h5 class="statistic-number">4,<span class="count-element">379</span></h5>
								<p class="p-md">Websites Improved</p>								

							</div>						
						</div>
					

						<!-- STATISTIC BLOCK #4 -->
						<div class="col-sm-6 col-md-3">							
							<div class="statistic-block wow fadeInUp" data-wow-delay="1s">	

								<!-- Text -->	
								<h5 class="statistic-number">2,<span class="count-element">473</span></h5>
								<p class="p-md">Active Accounts</p>				
								
							</div>						
						</div>


					</div> <!-- End row -->
				</div>	 <!-- End container -->		
			</div>	 <!-- END STATISTIC-1 -->




			<!-- CONTENT-2
			============================================= -->
			<section id="content-2" class="wide-60 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- IMAGE BLOCK -->
						<div class="col-md-5 col-lg-6">
							<div class="img-block pr-25 mb-40 wow fadeInLeft" data-wow-delay="0.6s">
								<img class="img-fluid" src="{{asset('assets/landing/images/image-03.png')}}" alt="content-image">
							</div>
						</div>


						<!-- TEXT BLOCK -->	
						<div class="col-md-7 col-lg-6">
							<div class="txt-block pc-25 mb-40 wow fadeInRight" data-wow-delay="0.4s">

								<!-- Title -->	
								<h4 class="h4-xl darkblue-color">We craft marketing & digital products that grow business</h4>

								<!-- Text -->
								<p>With Osmly Mail, we can see what messaging worked for email, what worked for ads, and very easily apply those learnings because everything is in one place. It saves us time, it saves us resources, and it’s intuitive.
								</p> 

								<!-- List -->
								<!-- <ul class="ico-list mb-10">	
									<li><i class="fas fa-check grey-color"></i> <span>Vitae auctor integer congue magna at pretium</span></li>
									<li><i class="fas fa-check grey-color"></i> <span>Integer congue magna and pretium purus ligula</span></li>
									<li><i class="fas fa-check grey-color"></i> <span>Sagittis congue augue egestas volutpat egestas</span></li>
								</ul> -->

								<!-- Button -->
								<a href="#pricing-1" class="btn btn-md btn-primary tra-black-hover">Pricing Packages</a>

							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>	  <!-- End row -->	
				</div>     <!-- End container -->
			</section>	<!-- END CONTENT-2 -->




			<!-- TESTIMONIALS-3
			============================================= -->
			<section id="reviews-3" class="bg-04 wide-100 reviews-section division" style="display: none">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title wow fadeInUp" data-wow-delay="0.2s">	

							<!-- Title 	-->	
							<h3 class="h3-lg darkblue-color">Reviews From Our Customers</h3>

							<!-- Text -->	
							<p class="p-lg">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero 
							   tempus, blandit posuere and ligula varius magna a porta elementum massa risus
							</p>

						</div>
					</div>
				
					
					<!-- TESTIMONIALS CONTENT -->
					<div class="row">
						<div class="col-xl-10 offset-xl-1">					
							<div class="owl-carousel owl-theme reviews-holder">

						
								<!-- TESTIMONIAL #1 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>

									<!-- Testimonial Text -->
									<p>Etiam sapien sem at sagittis congue an augue massa varius egestas and suscipit magna and 
									   tempus and aliquet porta vitae purus congue a cursus magna cubilia augue vitae laoreet				   
									</p>

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-1.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Sean McMarthy</h5>	
											<span>Owner, <a href="#">Company Name</a></span>
										</div>

									</div>									
																					
								</div>	<!--END  TESTIMONIAL #1 -->
						
						
								<!-- TESTIMONIAL #2 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>
					
									<!-- Testimonial Text -->
									<p>At sagittis congue augue egestas rhoncus in magna ipsum vitae purus ipsum primis cubilia 
									   laoreet augue egestas luctus and donec diam ociis ultrice ligula magna suscipit
									</p>

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-2.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Evelyn Martinez</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>

									</div>
					
								</div>	<!-- END TESTIMONIAL #2 -->
						
						
								<!-- TESTIMONIAL #3 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>
																
									<!-- Testimonial Text -->
									<p>Mauris donec ociis magnis sapien etiam sapien congue and augue egestas et ultrice vitae undo 
									   purus and diam integer congue at magna ligula an egestas magna suscipit lectus   
									</p>

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-3.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Joel Peterson</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>	

									</div>	

								</div>	<!-- END TESTIMONIAL #3 -->


								<!-- TESTIMONIAL #4 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>
					
									<!-- Testimonial Text -->
									<p>Mauris donec ociis magnis sapien etiam sapien congue undo augue pretium purus ligula lectus aenean 
									   magna and mauris lectus undo laoreet tempor egestas magna vitae laoreet augue
									</p>

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-4.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Michael Deal</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>
					
									</div>	

								</div>	<!-- END TESTIMONIAL #4 -->
								
								
								<!-- TESTIMONIAL #5 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>

									<!-- Testimonial Text -->
									<p>An augue in cubilia laoreet magna suscipit egestas magna ipsum at purus ipsum primis in augue 
									   ultrice ligula egestas and suscipit lectus gestas integer congue
									</p>	

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-5.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Mark Paterson</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>					
																
									</div>	

								</div>	<!-- END TESTIMONIAL #5 -->
								
								
								<!-- TESTIMONIAL #6 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>

									<!-- Testimonial Text -->
									<p>An augue cubilia laoreet undo magna a suscipit egestas magna an ipsum ligula vitae purus and 
									   ipsum primis in cubilia
									</p>

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-6.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Mark Hodges</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>

									</div>	

								</div>	<!-- END TESTIMONIAL #6 -->
								
								
								<!-- TESTIMONIAL #7 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>
				
									<!-- Testimonial Text -->
									<p>Augue egestas volutpat egestas augue purus cubilia laoreet magna suscipit luctus and dolor blandit 
									   vitae purus diam tempus undo aliquet porta rutrum gestas egestas 
									</p>

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-7.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Aaron Wall</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>
					
									</div>	

								</div>	<!-- END TESTIMONIAL #7 -->


								<!-- TESTIMONIAL #8 -->
								<div class="review-3">

									<!-- Quote Icon -->
									<div class="quote-ico"><img src="{{asset('assets/landing/images/left-quote.png')}}" alt="quote-image" /></div>
					
									<!-- Testimonial Text -->
									<p>Augue egestas volutpat egestas augue in cubilia laoreet magna suscipit luctus and dolor blandit
								       vitae purus diam tempus 
									</p>	

									<!-- Author Data -->
									<div class="review-3-author d-flex align-items-center">

										<!-- Author Avatar -->
										<div class="author-avatar">
											<img class="img-fluid" src="{{asset('assets/landing/images/review-author-8.jpg')}}" alt="review-author-avatar" />
										</div>

										<!-- Testimonial Author -->
										<div class="review-author">
											<h5 class="h5-xs darkblue-color">Tosha Wisdom</h5>
											<span>Owner, <a href="#">Company Name</a></span>
										</div>							
																
									</div>	

								</div>	<!-- END TESTIMONIAL #8 -->

							
							</div>
						</div>									
					</div>	<!-- END TESTIMONIALS CONTENT --> 
							
						
				</div>	   <!-- End container -->
			</section>	 <!-- END TESTIMONIALS-3 -->



			<!-- VIDEO-3
			============================================= -->
			<section id="video-3" class="bg-05 wide-60 video-section division">
				<div class="container white-color">
					<div class="row d-flex align-items-center">


						<!-- VIDEO TEXT -->	
			 			<div class="col-lg-5">
			 				<div class="video-txt mb-40">

			 					<!-- Title -->	
								<h4 class="h4-lg">They are always forthcoming, coming up with good solutions for us to improve processes</h4>

								<!-- Text -->
								<p>We make it easy to build, launch, and measure campaigns across channels. And with our Analytics guiding your targeting, you can be sure you’re sending the right message to the right people at the right time.
								</p> 

			 				</div>
			 			</div>	<!-- END VIDEO TEXT -->	


						<!-- VIDEO LINK -->	
			 			<div class="col-lg-7 mb-40">
			 				<div class="video-link text-center">
			 					
								<!-- Change the link HERE!!! -->						
								<div class="play-btn play-btn-primary text-center">

									<!-- Preview Image -->
									<img class="img-fluid" src="{{asset('assets/landing/images/video-3.jpg')}}" alt="video-preview">

								</div>

							</div>	
			 			</div>	<!-- END VIDEO LINK -->	

					
					</div>	   <!-- End row -->	
				</div>	   <!-- End container -->						
			</section>	<!-- END VIDEO-3 -->




			<!-- PRICING-1
			============================================= -->
			<section id="pricing-1" class="wide-60 pricing-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row">	
						<div class="col-lg-10 offset-lg-1 section-title wow fadeInUp" data-wow-delay="0.2s">	

							<!-- Title 	-->	
							<h3 class="h3-lg darkblue-color">Simple Pricing, Instant Sign Up</h3>	
							
							<!-- Text -->	
							<p class="p-lg">Get smarter as you go
							</p>
								
						</div>
					</div>	 <!-- END SECTION TITLE -->	

					<div style="text-align: center; margin-bottom: 10%">
				      <!-- <span style="margin-right: 2%;"><b>Switch to Subscription Pricing</b></span> -->
				      <!-- <label class="switch">
				        <input id="sub_switcher" type="checkbox">
				        <span class="slider round"></span>
				      </label> -->
				      <button id="sub_switcher1" style="margin-right: 2%;" class="btn btn-md btn-primary">Switch to Subscription Pricing</button>
				      <button id="sub_switcher2" class="btn btn-md btn-primary">Switch to Regular Pricing</button>
				    </div>
				    <div style="display: flex">
				  		<div id="regular_pricing" class="pricing" style="flex: 1">
				  		      <div class="pricing-slider">
				  		        <label class="form-slider">
				  		          <span>How many E-mails do you want?</span>
				  		          <input
				  		            type="range"
				  		            value="1"
				  		            data-price-input='{
				  		                "0": "30000",
				  		                "1": "50000",
				  		                "2": "75000",
				  		                "3": "100000",
				  		                "4": "150000",
				  		                "5": "200000",
				  		                "6": "400000",
				  		                "7": "600000",
				  		                "8": "800000",
				  		                "9": "1000000",
				                      "10": "1500000",
				                      "11": "2000000",
				                      "12": "2500000",
				                      "13": "3000000",
				                      "14": "3500000",
				                      "15": "4000000",
				                      "16": "4500000",
				                      "17": "5000000"                      
				  		              }'
				  		          />
				  		        </label>
				  		        <div class="pricing-slider-value"></div>
				  		      </div>
				  		      <div class="pricing-items">
				  		        <div class="pricing-item">
				  		          <div class="pricing-item-inner">
				  		            <div class="pricing-item-content">
				  		              <div class="pricing-item-header">
				  		                <div class="pricing-item-title primary-color">Regular Pricing</div>
				  		                <div
				  		                  class="pricing-item-price"
				  		                  data-price-output='{
				  		                    "0": ["$", "10", "/m"],
				  		                    "1": ["$", "14", "/m"],
				  		                    "2": ["$", "22", "/m"],
				  		                    "3": ["$", "30", "/m"],
				  		                    "4": ["$", "42", "/m"],
				  		                    "5": ["$", "50", "/m"],
				  		                    "6": ["$", "100", "/m"],
				  		                    "7": ["$", "140", "/m"],
				  		                    "8": ["$", "180", "/m"],
				  		                    "9": ["$", "220", "/m"],
				                          "10": ["$", "300", "/m"],
				                          "11": ["$", "380", "/m"],
				                          "12": ["$", "460", "/m"],
				                          "13": ["$", "530", "/m"],
				                          "14": ["$", "580", "/m"],
				                          "15": ["$", "670", "/m"],
				                          "16": ["$", "740", "/m"],
				                          "17": ["$", "810", "/m"]
				  		                  }'
				  		                >
				  		                  <span class="pricing-item-price-currency"></span>
				  		                  <span class="pricing-item-price-amount"></span>
				  		                  <span class="pricing-item-price-after"></span>
				  		                </div>
				  		              </div>
				  		              <div class="pricing-item-features">
				  		                <ul class="pricing-item-features-list">
				  		                  <li class="is-checked">Excepteur sint occaecat</li>
				  		                  <li>Excepteur sint occaecat</li>
				  		                </ul>
				  		              </div>
				  		            </div>
				  		            <div class="pricing-item-cta">
				  		              <a class="button" href="#">Buy Now</a>
				  		            </div>
				  		          </div>
				  		        </div>
				  		      </div>
				  		</div>
					     <div id="subscription_pricing" class="pricing" style="flex: 1">
					            <div class="pricing-slider">
					              <label class="form-slider">
					                <span>How many E-mails do you want?</span>
					                <input
					                  type="range"
					                  value="1"
					                  data-price-input='{
					                      "0": "5000",
					                      "1": "10000",
					                      "2": "20000",
					                      "3": "30000",
					                      "4": "40000",
					                      "5": "50000",
					                      "6": "75000",
					                      "7": "100000",
					                      "8": "125000",
					                      "9": "150000",
					                      "10": "175000",
					                      "11": "200000",
					                      "12": "250000",
					                      "13": "300000",
					                      "14": "400000",
					                      "15": "500000",
					                      "16": "600000",
					                      "17": "700000",
					                      "18": "800000",                      
					                      "19": "900000",                      
					                      "20": "1000000"                     
					                    }'
					                />
					              </label>
					              <div class="pricing-slider-value"></div>
					            </div>
					            <div class="pricing-items">
					              <div class="pricing-item">
					                <div class="pricing-item-inner">
					                  <div class="pricing-item-content">
					                    <div class="pricing-item-header">
					                      <div class="pricing-item-title primary-color">Subscription Pricing</div>
					                      <div
					                        class="pricing-item-price"
					                        data-price-output='{
					                          "0": ["$", "15", "/m"],
					                          "1": ["$", "30", "/m"],
					                          "2": ["$", "45", "/m"],
					                          "3": ["$", "60", "/m"],
					                          "4": ["$", "75", "/m"],
					                          "5": ["$", "90", "/m"],
					                          "6": ["$", "105", "/m"],
					                          "7": ["$", "130", "/m"],
					                          "8": ["$", "160", "/m"],
					                          "9": ["$", "190", "/m"],
					                          "10": ["$", "240", "/m"],
					                          "11": ["$", "270", "/m"],
					                          "12": ["$", "310", "/m"],
					                          "13": ["$", "350", "/m"],
					                          "14": ["$", "470", "/m"],
					                          "15": ["$", "590", "/m"],
					                          "16": ["$", "700", "/m"],
					                          "17": ["$", "810", "/m"],
					                          "18": ["$", "930", "/m"],
					                          "19": ["$", "1050", "/m"],
					                          "20": ["$", "1200", "/m"]
					                        }'
					                      >
					                        <span class="pricing-item-price-currency"></span>
					                        <span class="pricing-item-price-amount"></span>
					                        <span class="pricing-item-price-after"></span>
					                      </div>
					                    </div>
					                    <div class="pricing-item-features">
					                      <ul class="pricing-item-features-list">
					                        <li class="is-checked">Excepteur sint occaecat</li>
					                        <li>Excepteur sint occaecat</li>
					                      </ul>
					                    </div>
					                  </div>
					                  <div class="pricing-item-cta">
					                    <a class="button" href="#">Buy Now</a>
					                  </div>
					                </div>
					              </div>
					            </div>
					     </div>
				    </div>


	



				</div>	   <!-- End container -->
			</section>	<!-- END PRICING-1 -->
			

			<!-- PAGE HERO
				============================================= -->	
				<section id="contacts-page" class="page-hero-section division">
					<div class="container">	
						<div class="row">	


							<!-- PAGE HERO TEXT -->
							<div class="col-md-10 offset-md-1">
								<div class="hero-txt text-center white-color">

									<!-- Title -->
									<h3 class="h3-xl">Let’s Keep In Touch</h3>

									<!-- Text -->
									<p>Question? Comment? Let us know how can we help you. Fill in the contact form below to get in touch with us</p>

								</div>
							</div>	<!-- END PAGE HERO TEXT -->


						</div>    <!-- End row --> 
					</div>	   <!-- End container --> 
				</section>	<!-- END PAGE HERO -->	



				<!-- CONTACTS-1
				============================================= -->
				<section id="contacts-1" class="wide-60 contacts-section division">
					<div class="container">
					 	<div class="row">


							<!-- CONTACT FORM -->
					 		<div class="col-lg-8">
					 			<div class="form-holder mb-40 pc-25">
									<form name="contactform" class="row contact-form">
																							
										<!-- Contact Form Input -->
										<div id="input-name" class="col-md-6">
											<input type="text" name="name" class="form-control name" placeholder="Your Name"> 
										</div>
													
										<div id="input-email" class="col-md-6">
											<input type="text" name="email" class="form-control email" placeholder="Email Address"> 
										</div>

										<div id="input-subject" class="col-md-12">
											<input type="text" name="subject" class="form-control subject" placeholder="What's this about?"> 
										</div>
		
										<div id="input-message" class="col-md-12 input-message">
											<textarea class="form-control message" name="message" rows="6" placeholder="Your Message ..."></textarea>
										</div> 
																							
										<!-- Contact Form Button -->
										<div class="col-lg-12 mt-10 form-btn text-right">	
											<button type="submit" class="btn btn-md btn-green deepgreen-hover submit">Send Message</button>	
										</div>
																																
										<!-- Contact Form Message -->
										<div class="col-lg-12 contact-form-msg">
											<span class="loading"></span>
										</div>	
																								
									</form>	
					 			</div>	
					 		</div>	<!-- END CONTACT FORM -->	


					 		<!-- CONTACTS INFO -->
					 		<div class="col-lg-4">
					 			<div class="contacts-info pc-25">

							 		<!-- LOCATION -->
									<div class="contact-box wow fadeInUp" data-wow-delay="0.4s">
										<h5 class="h5-sm">Our Location:</h5>
										<p class="grey-color">Merteex Processing, Inc</p>														
										<p class="grey-color">121 King Street, Melbourne, <br /> Victoria 3000 Australia</p>
									</div>

									<!-- PHONES -->
									<div class="contact-box wow fadeInUp" data-wow-delay="0.6s">
										<h5 class="h5-sm">Contact Phones:</h5>	
										<p class="grey-color">Phone : +12 3 3456 7890</p>
										<p class="grey-color">Fax : +12 9 8765 4321</p>
									</div>

									<!-- WORKING HOURS -->
									<div class="contact-box wow fadeInUp" data-wow-delay="0.8s">
										<h5 class="h5-sm">Office Hours:</h5>	
										<p class="grey-color">Mon - Fri: 8:30am - 7:30pm</p>
										<p class="grey-color">Saturday: 8:30am - 3:30pm</p>
										<p class="grey-color">Sunday: Closed</p>
									</div>

								</div>	
							</div>	<!-- END CONTACTS INFO -->


						</div>	  <!-- End row -->
					</div>	   <!-- End container -->	
				</section>	<!-- END CONTACTS-1 -->

			<!-- CONTACTS-2
			============================================= -->
			<section id="contacts-2" class="bg-darkblue bg-map contacts-section division">				
				<div class="container white-color">
					<div class="row">	


						<!-- LOCATION -->
						<div class="col-md-4">
							<div class="contact-box icon-sm clearfix">

								<!-- Icon --> 
								<img class="img-50" src="{{asset('assets/landing/images/icons/placeholder-4.png')}}" alt="clock-icon" />
							
								<!-- Text -->
								<div class="cbox-2-txt">

									<!-- Title -->	
									<h5 class="h5-lg">Our Location:</h5>

									<!-- Title -->	
									<p>Merteex Processing, Inc</p>
									<p>121 King Street, Melbourne,</p> 
									<p>Victoria 3000 Australia</p>

								</div>

							</div>
						</div>


						<!-- QUICK CONTACTS -->
						<div class="col-md-4">
							<div class="contact-box icon-sm clearfix">

								<!-- Icon --> 
								<img class="img-50" src="{{asset('assets/landing/images/icons/contacts.png')}}" alt="clock-icon" />
							
								<!-- Text -->
								<div class="cbox-2-txt">

									<!-- Title -->	
									<h5 class="h5-lg">Quick Contacts:</h5>

									<!-- Text -->	
									<p>Phone: +12 3 3456 7890</p>
									<p>Fax: +12 9 8765 4321</p>
									<p><a href="mailto:yourdomain@mail.com">hello@yourdomain.com</a></p>

								</div>

							</div>
						</div>


						<!-- WORKING HOURS -->
						<div class="col-md-4">
							<div class="contact-box clearfix">

								<!-- Icon --> 
								<img class="img-50" src="{{asset('assets/landing/images/icons/clock-1.png')}}" alt="clock-icon" />
							
								<!-- Text -->
								<div class="cbox-2-txt">

									<!-- Title -->	
									<h5 class="h5-lg">Office Hours:</h5>

									<!-- Text -->	
									<p>Mon-Fri: 8:30AM - 7:30PM</p>
									<p>Saturday: 8:30AM - 3:30PM</p>
									<p>Sunday: 12:00PM - 5:00PM</p>

								</div>

							</div>
						</div>

			 		
				 	</div>	   <!-- End row -->
				</div>	   <!-- End container -->		
			</section>	<!-- END CONTACTS-2 -->



<script type="text/javascript">
	(function() {
  const pricingSliders = document.querySelectorAll(".pricing-slider");

  if (pricingSliders.length > 0) {
    for (let i = 0; i < pricingSliders.length; i++) {
      const pricingSlider = pricingSliders[i];

      // Build the input object
      const pricingInput = {
        el: pricingSlider.querySelector("input")
      };
      pricingInput.data = JSON.parse(
        pricingInput.el.getAttribute("data-price-input")
      );
      pricingInput.currentValEl = pricingSlider.querySelector(
        ".pricing-slider-value"
      );
      pricingInput.thumbSize = parseInt(
        window
          .getComputedStyle(pricingInput.currentValEl)
          .getPropertyValue("--thumb-size"),
        10
      );

      // Build the output array
      const pricingOutputEls = pricingSlider.parentNode.querySelectorAll(
        ".pricing-item-price"
      );
      const pricingOutput = [];
      for (let i = 0; i < pricingOutputEls.length; i++) {
        const pricingOutputEl = pricingOutputEls[i];
        const pricingOutputObj = {};
        pricingOutputObj.currency = pricingOutputEl.querySelector(
          ".pricing-item-price-currency"
        );
        pricingOutputObj.amount = pricingOutputEl.querySelector(
          ".pricing-item-price-amount"
        );
        pricingOutputObj.after = pricingOutputEl.querySelector(
          ".pricing-item-price-after"
        );
        pricingOutputObj.data = JSON.parse(
          pricingOutputEl.getAttribute("data-price-output")
        );
        pricingOutput.push(pricingOutputObj);
      }

      pricingInput.el.setAttribute("min", 0);
      pricingInput.el.setAttribute(
        "max",
        Object.keys(pricingInput.data).length - 1
      );
      !pricingInput.el.getAttribute("value") &&
        pricingInput.el.setAttribute("value", 0);

      handlePricingSlider(pricingInput, pricingOutput);
      window.addEventListener("input", function() {
        handlePricingSlider(pricingInput, pricingOutput);
      });
    }
  }

  function handlePricingSlider(input, output) {
    // output the current slider value
    if (input.currentValEl)
      input.currentValEl.innerHTML = input.data[input.el.value];
    // update prices
    for (let i = 0; i < output.length; i++) {
      const outputObj = output[i];
      if (outputObj.currency)
        outputObj.currency.innerHTML = outputObj.data[input.el.value][0];
      if (outputObj.amount)
        outputObj.amount.innerHTML = outputObj.data[input.el.value][1];
      if (outputObj.after)
        outputObj.after.innerHTML = outputObj.data[input.el.value][2];
    }
    handleSliderValuePosition(input);
  }

  function handleSliderValuePosition(input) {
    const multiplier = input.el.value / input.el.max;
    const thumbOffset = input.thumbSize * multiplier;
    const priceInputOffset =
      (input.thumbSize - input.currentValEl.clientWidth) / 2;
    input.currentValEl.style.left =
      input.el.clientWidth * multiplier - thumbOffset + priceInputOffset + "px";
  }
})();

document.getElementById("sub_switcher1").addEventListener("click", function(){
  	document.getElementById("subscription_pricing").style.display = "block";
    document.getElementById("regular_pricing").style.display = "none";
});

document.getElementById("sub_switcher2").addEventListener("click", function(){
    document.getElementById("subscription_pricing").style.display = "none";
    document.getElementById("regular_pricing").style.display = "block";
});

</script>



@endsection

