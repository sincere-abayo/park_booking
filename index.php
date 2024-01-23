<?php 
include 'php/conn.php';
$select=$conn->query("SELECT * from destination");
?>
<!DOCTYPE HTML>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kigali Travel &mdash; and Refound</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Nyandungu entrace tickets booking" />
	<meta name="keywords" content="Nyandungu Park, Ticket reservations, Entrance passes, Nyandungu entrance tickets, Booking tickets online, Rwandan attractions, Tourism in Rwanda, Adventure travel, Nyandungu landmark, Tourist experiences" />

	<meta name="author" content="Nyandungu" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!-- icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-xzjwPo9dpwSjPK+ydk/m3vbqN10NI4tV2VOkZnFGAFnF2Jag6sdojL5fvMF5zsD8" crossorigin="anonymous">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
    
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">Kigali &mdash; Traveler <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="destination.php">Destination</a></li>
						
						<!-- <li><a href="pricing.html">Pricing</a></li> -->
						<li><a href="contact.php">Contact</a></li>
						<!-- <li><a href="#"><i class="fas fa-shopping-cart"></i> Cart</a></li> -->
						<li class="has-dropdown">
							<a href="#">Account</a>
							<ul class="dropdown">
								<li><a href="login.php">Login</a></li>
								<li><a href="admin_login.html">Admin</a></li>
							</ul>
						</li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/rest.jpg)">
		<!-- <div class="overlay">serge</div> -->
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Planing Trip To Anywhere in The Kigali?</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Book Your Trip</h3>
											<form>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="fullname">Your Name</label>
														<input type="text" id="fullname" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="activities">Nationalic</label>
														<select name="#" id="activities" class="form-control">
															<option value="">Region</option>
															<option value="">Rwanda &mdash; East Afracan 1500 RWF</option>
															<option value="">Other 5000 RFW </option>
														</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="fullname">N<sup>o</sup>&mdash; ID or Passport</label>
														<input type="text" id="fullname" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="fullname">N<sup>o</sup>&mdash; Phone Number</label>
														<input type="number" id="" class="form-control">
													</div>
												</div>
												
												<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Visit Date</label>
														<input type="date" id="date-start" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Visit Time</label>
														<input type="time" id="date-start" class="form-control">
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<style>
															ul{
																list-style-type: none;
															}
															
															#lbook,.subGet,.subGet2,.subGet3{
																display: none;
															}
															#lll,.subDisabled.subDisabled2.subDisabled3:hover{
																background-color: none;
																color: #09c6ab;

															}

														</style>
													<ul onmouseleave="hideLoginText()">
														<li id="disabled" >
															<input onmouseenter="showLoginText()"  disabled class="btn btn-primary btn-block" value="Book">
	                                                         <ul id="lbook"  >
																<li><a id="lll"  href="login.php">Login to book ticket</a></li>
															 </ul>
															</li>

													</ul>
													</div>
												</div>
												<script>
													function showLoginText()
													{
														document.getElementById('lbook').style.display="block";
													}
													function hideLoginText()
													{
														document.getElementById('lbook').style.display="none";
													}
												</script>
											</form>	
										</div>

										
									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	<div class="gtco-section border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscription</h2>
					<p>Join over 1 Million of users. Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="price-box popular">
						<h2 class="pricing-plan">Ganza</h2>
						<div class="price"><sup class="currency">RWF</sup>15000<small>/ mo</small></div>
						<p>This is for Rwanda</p>
						<hr>
						<ul class="pricing-info">
							<li>Enter</li>
							<li>1 bike</li>
							<li>cup of Rwanda tea</li>
						</ul>
						<!-- Button to trigger modal -->
						<!-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Get started</a> -->
						<ul onmouseleave="hideLoginText1()">
														<li class="subDisabled" >
															<input onmouseenter="showLoginText1()"  disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" value="Get started">
	                                                        <ul class="subGet"  >
																<li><a href="login.php">Login to get started</a></li>
															 </ul>
															</li>

													</ul>
													
					</div>
				</div>
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Your Popup Title</h5>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"  >&times;</span>
								</button>
							</div>
							<div class="col-md-10 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
								<div class="form-wrap">
									<div class="tab">
										
										<div class="tab-content">
											<div class="tab-content-inner active" data-content="signup">
												<h3>Book Your Trip</h3>
												<form action="#">
													<div class="row form-group">
														<div class="col-md-12">
															<label for="fullname">Your Name</label>
															<input type="text" id="fullname" class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="activities">Nationalic</label>
															<select name="#" id="activities" class="form-control">
																<option value="">Region</option>
																<option value="">Rwanda &mdash; East Afracan 1500 RWF</option>
																<option value="">Other 5000 RFW </option>
															</select>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="fullname">N<sup>o</sup>&mdash; ID or Passport</label>
															<input type="text" id="fullname" class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="fullname">N<sup>o</sup>&mdash; Phone Number</label>
															<input type="number" id="" class="form-control">
														</div>
													</div>
													
													<div class="row form-group">
														<div class="col-md-12">
															<label for="date-start">Visit Date</label>
															<input type="text" id="date-start" class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="date-start">Visit Time</label>
															<input type="text" id="date-start" class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<input type="submit" class="btn btn-primary btn-block" value="Submit">
														</div>
													</div>
	
													
												</form>	
											</div>
	
											
										</div>
									</div>
								</div>
							</div>
							<!-- You can add additional buttons or actions here -->
							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Refound</button>
								
							</div>
							<!-- Donate form start -->
							<!-- Donate form end -->
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="price-box popular">
						<h2 class="pricing-plan">Cyizere</h2>
						<div class="price"><sup class="currency">Rwf</sup>30000<small>/mo</small></div>
						<p>Africa</p>
						<hr>
						<ul class="pricing-info">
							<li>1 bike</li>
							<li>One cup of coffe</li>
							<li>Photographic</li>
							
						</ul>
						<ul onmouseleave="hideLoginText2()">
														<li class="subDisabled subDisabled2" >
															<input onmouseenter="showLoginText2()"  disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" value="Get started">
	                                                        <ul class="subGet2"  >
																<li><a href="login.php">Login to get started</a></li>
															 </ul>
															</li>

													</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="price-box popular">
						<div class="popular-text">International</div>
						<h2 class="pricing-plan">Plus</h2>
						<div class="price"><sup class="currency">Rwf</sup>42500<small>/mo</small></div>
						<p>Based on outside of African</p>
						<hr>
						<ul class="pricing-info">
							<li>Unlimitted projects</li>
							<li>100 Pages</li>
							<li>100 Emails</li>
							<li>700 Images</li>
						</ul>
						<ul onmouseleave="hideLoginText3()">
														<li class="subDisabled subDisabled3" >
															<input onmouseenter="showLoginText3()"  disabled class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" value="Get started">
	                                                        <ul class="subGet3" >
																<li><a href="login.php">Login to get started</a></li>
															 </ul>
															</li>

													</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Most Popular Destination</h2>
					<p>Cranes and other bird species are increasing in the wetland and according to the park management,
						 the site is currently home to more than 70 species of birds. </p>
				</div>
			</div>
			<div class="row">

			
				<?php 
           while($destination=mysqli_fetch_array($select))
		   {
			$image=$destination[1];
			$title=$destination[2];
			$desc=$destination[3];
				?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="admin/uploads/<?php echo $image ?>" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="admin/uploads/<?php echo $image ?>" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo $title ?></h2>
							<p><?php echo $desc ?></p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
<?php
		   }			
				?>

			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>How It Works</h2>
					<p>Nyandungu Urban Wetland Ecotourism park is a 120 hectares of 
						surface area, Rwandan tourism park located between Gasabo and 
						Kicukiro Districts which allows sustainable travel of people to enjoy natural a
						reas and wild animals in Nyandungu Valley..</p>
				</div>
			</div>
			
		</div>
	</div>


	<div class="gtco-cover gtco-cover-sm" style="background-image: url(images/rest.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>We have high quality services that you will surely love!</h1>
				</div>	
			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Our Success</h2>
					<p>The creation of Nyandungu Wetland Eco Tourism Park is part of Rwanda's
						 efforts to restore and conserve ecosystems while promoting the social
						  economic development</p>
 				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="1605" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Rwandan</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="1023" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">East-Africans</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="1240" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Outside</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="1270" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">International</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	

	<div id="gtco-subscribe">
		
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>
							Welcome to Nyandungu - your gateway to Rwanda's beauty! We specialize in seamless ticket reservations for Nyandungu Park, offering easy online booking for an unforgettable adventure. Explore Rwanda's stunning landscapes and rich culture with us.
							</p>
					</div>
				</div>

				<!-- <div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						 <h3>Destination</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Europe</a></li>
							<li><a href="#">Australia</a></li>
							<li><a href="#">Asia</a></li>
							<li><a href="#">Canada</a></li>
							<li><a href="#">Dubai</a></li>
						</ul> 
					</div>
				</div> 
-->
				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Hotels</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Mariot hotel</a></li>
							<li><a href="#">Lemigo hotel</a></li>
							<li><a href="#">Radson Blu Hotel</a></li>
							<li><a href="#">Legacy Hotel</a></li>
							<!-- <li><a href="#">Le banane Hotel</a></li> -->
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +25078877339</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-mail2"></i> nyandungu@gmail.com</a></li>
							<!-- <li><a href="#"><i class="icon-chat"></i> Live Chat</a></li> -->
						</ul>
					</div>
				</div>

			</div>

			<!-- <div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div> -->

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<script>
													function showLoginText1()
													{
														var element=document.getElementsByClassName('subGet');
														for (let index = 0; index < element.length; index++) {
															element[index].style.display="block";
															// alert('ff')
															
														}
														// alert('ff')
													}
													function hideLoginText1()
													{
														var element=document.getElementsByClassName('subGet');
														for (let index = 0; index < element.length; index++) {
															element[index].style.display="none";
														}
													}
													function showLoginText2()
													{
														var element=document.getElementsByClassName('subGet2');
														for (let index = 0; index < element.length; index++) {
															element[index].style.display="block";
															// alert('ff')
															
														}
														// alert('ff')
													}
													function hideLoginText2()
													{
														var element=document.getElementsByClassName('subGet2');
														for (let index = 0; index < element.length; index++) {
															element[index].style.display="none";
														}
													}
													function showLoginText3()
													{
														var element=document.getElementsByClassName('subGet3');
														for (let index = 0; index < element.length; index++) {
															element[index].style.display="block";
															// alert('ff')
															
														}
														// alert('ff')
													}
													function hideLoginText3()
													{
														var element=document.getElementsByClassName('subGet3');
														for (let index = 0; index < element.length; index++) {
															element[index].style.display="none";
														}
													}
												</script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

