<?php

error_reporting(0);
include '../php/conn.php';
	if ( empty($_SESSION['email']) && empty($_SESSION['admin'])) {
		// Session exists
	 header("location:../login.php");
	 exit();

	}
$selectDestination=$conn->query("SELECT * from destination");
	
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

	<meta name="author" content="FreeHTML5.co" />

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
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">
    
	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		#showCountry{
			display: none;
		}
/* Specific styling for the sub-listing */
.gtco-nav .menu-1 > ul > li#cart {
    /* Your specific styles for the cart list item */
    position: relative;
}

/* Styles for the sub-listing when shown */
.gtco-nav .menu-1 > ul > li#cart:hover .cart {
    /* Your styles when the cart is hovered */
    display: block;
    position: absolute;
    top: 100%; /* Position it below the cart item */
    left: 0;
    background-color: #fff; /* Background color for the dropdown */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow effect */
    padding: 10px;
	padding-left: 0px;
	/* width: 200px; */
    /* Add other styles as needed */
}

/* Hide the sub-listing by default */
.gtco-nav .menu-1 > ul > li#cart .cart {
    /* Your styles for the hidden cart */
    display: none;
    /* Add other styles as needed */
}

	</style>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">Dashboard <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
					<li><a href="destination.html">Destination</a></li>
						
						<!-- <li><a href="pricing.html">Pricing</a></li> -->
						<!-- <li><a href="contact.html">Contact</a></li> -->
						<li><a href="#"><?php
echo $_SESSION['email'];
?></a></li>
						<li><a href="../php/logout.php">Logout</a></li>
						<li id="cart"><a href="#">Cart(<i>

							<?php
							
$email = isset($_SESSION['email']) && $_SESSION['email'] !== "" ? $_SESSION['email'] : $_SESSION['admin'];

$select=$conn->query("SELECT * from ticket where u_email='$email' and t_status=0" ) or die("failed to get cart");

  http_response_code(200);
$cart=mysqli_num_rows($select);
echo "$cart";
							?>
 </i>)</a>
                        
						<?php
$selectt=$conn->query("SELECT * from ticket where u_email='$email' and t_status=0" ) or die("failed to get cart");
if (mysqli_num_rows($selectt)) {
	echo "<ul class=\"cart\">";

								while ($row=mysqli_fetch_array($selectt)) {
									$number=$row['t_number'];
									$type=$row['t_nationality'];
									$amm=0;
									if($type =="eastAfrica")
									{
										$amm="1500 frw";
									}
									else{
										$amm=="5000frw";
									}
									echo "<li><a href='pay.php?t_number=$number' style='color:#777777'>$number</a></li><br>
									</ul>
						</li>";
								}
							}
						?>
					
						<li id="cart"><a href="#">Tickets(<i>
							<?php



$select=$conn->query("SELECT * from ticket where u_email='$email' and t_status=3" ) or die("failed to get cart");

  http_response_code(200);
$cart=mysqli_num_rows($select);
echo "$cart";
							?>
 </i>)</a>
 <?php
$selectt=$conn->query("SELECT * from ticket where u_email='$email' and t_status=3" ) or die("failed to get cart");
if (mysqli_num_rows($selectt)) {
	?>
						<ul class="cart">
<?php
	
								while ($row=mysqli_fetch_array($selectt)) {
									$number=$row['t_number'];
									$type=$row['t_nationality'];
									$amm=0;
									if($type =="eastAfrica")
									{
										$amm="1500 frw";
									}
									else{
										$amm=="5000frw";
									}
									
									echo "<li><a href='ticket.php?t_number=$number' style='color:#777777'>$number</a></li><br>";
}
?>
 

                       
						<?php 
						?>
						</ul>
						</li>
						<?php
					}
				
						?>
					
						
						<li id="cart"><a href="#">Sub(<i>

							<?php

// $select=$conn->query("SELECT * from subscription where u_email='$email' and s_status=2" ) or die("failed to get cart");
$sub_select=$conn->query("SELECT * from subscription where u_email='$email' and s_status=2" ) or die("failed to get cart");

$sub=mysqli_num_rows($sub_select);
echo "$sub";
			
						$sub_row=mysqli_fetch_array($sub_select);
									$sub_number=$sub_row['s_number'];
									$type=$sub_row['s_type'];
									
									$created_at = strtotime($sub_row['created_at']);
$currentDate = time();

$secondsInDay = 60 * 60 * 24; // Number of seconds in a day
$interval = ($currentDate - $created_at) / $secondsInDay;

$remainingDay = 30 - floor($interval);

							?>
 </i>) </a> 
                      
<?php
if ($remainingDay==0) {
$update=$conn->query("UPDATE subscription set s_status=3  where u_email='$email' and s_number='$number'");
}
if (mysqli_num_rows($sub_select)) {
echo "<ul class=\"cart\">";

		
									echo "<li><a href='subscription.php?ticket=$sub_number' style='color:#777777'>$sub_number</a></li>
									<br>	</ul>

									</li>";
								
								
						?>
					
						 <?php 
						if ($remainingDay<=5) {
							echo "<i style=\"color: red;\">-".$remainingDay." days";
						} else {
							echo "<i style=\"color: yellow;\">-".$remainingDay." days";
						}
					}
						
						
						?></i>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/lake.jpg)">
		<div class="overlay"></div>
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
											<form id="bookForm">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="fullname">Name</label>
														<input type="text" id="name" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="activities">Nationalic</label>
														<select name="#" id="nationality" class="form-control">
															<option value="" disabled selected>Region</option>
															<option value="eastAfrica">Rwanda &mdash; East Afracan 1500 RWF</option>
															<option value="other">Other 5000 RFW</option>
														</select>
													</div>
												</div>
												<div class="row form-group" id="showCountry">
													<div class="col-md-12">
														<label for="activities">Country</label>
														<select name="#" id="country" class="form-control">
															<option value="" disabled selected>select country</option>
															<!-- Options will be dynamically populated based on selection -->
														</select>
													</div>
												</div>
												
												<script>
													document.getElementById('nationality').addEventListener('change', function () {
													document.getElementById('showCountry').style.display='block';

														var countrySelect = document.getElementById('country');
														var nationalicValue = this.value;
												
														// Clear previous options
														countrySelect.innerHTML = '<option value="" disabled selected>select country</option>';
												
														if (nationalicValue === 'eastAfrica') {
													document.getElementById('showCountry').style.display='block';

															fetch('https://restcountries.com/v3.1/all')
																.then(response => response.json())
																.then(data => {
																	// Filter East African countries
																	var eastAfricanCountries = data.filter(country => {
																		return (
																			country.region === 'Africa' &&
																			['Rwanda', 'Kenya', 'Uganda', 'Tanzania', 'Burundi', 'South Sudan'].includes(country.name.common)
																		);
																	});
												
																	// Populate options for East African countries
																	eastAfricanCountries.forEach(country => {
																		var option = document.createElement('option');
																		option.text = country.name.common;
																		option.value = country.name.common;
																		countrySelect.appendChild(option);
																	});
																})
																.catch(error => {
																	console.error('Error fetching countries:', error);
																});
														} else if (nationalicValue === 'other') {
													document.getElementById('showCountry').style.display='block';

															fetch('https://restcountries.com/v3.1/all')
																.then(response => response.json())
																.then(data => {
																	// Filter out East African countries
																	var otherCountries = data.filter(country => {
																		return (
																			country.region !== 'Africa' ||
																			!['Rwanda', 'Kenya', 'Uganda', 'Tanzania', 'Burundi', 'South Sudan'].includes(country.name.common)
																		);
																	});
												
																	// Populate options for countries other than East Africa
																	otherCountries.forEach(country => {
																		var option = document.createElement('option');
																		option.text = country.name.common;
																		option.value = country.name.common;
																		countrySelect.appendChild(option);
																	});
																})
																.catch(error => {
																	console.error('Error fetching countries:', error);
																});
														}
													});
												</script>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="passport">N<sup>o</sup>&mdash; ID or Passport</label>
														<input type="text" id="identity" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="email">Email</label>
														<input type="email" id="email" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="phone">N<sup>o</sup>&mdash; Phone Number</label>
														<input type="number" id="phone" class="form-control">
													</div>
												</div>
												
												<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Visit Date</label>
														<input type="date" id="date" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Visit Time</label>
														<input type="time" id="time" class="form-control">
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary btn-block" value="Book">
													</div>
												</div>
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
			<div class="gtco col">
					
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
						<?php
						if($sub<1)
						{
						?>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-value="ganza">Get started</a>
					      <?php }
						  else{
							if($type=='Ganza')
							{
								echo "
							<span class=\"bg bg-info\">Subsciption already activated, remaining days ($remainingDay)</span>

						";
							}
							else{
							?>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" disabled data-target="#myModal" data-value="ganza">Get started</a>

							<?php
						  } }
						  ?>

					</div>
				</div>
				<?php
		                            if(isset($_POST['submit']))
									{
										$name= $_POST['name'];
										$amount=$_POST['amount'];
										$amount=(int)$amount;
										$email=$_POST['email'];
										$phone=$_POST['phone'];
										$passport=$_POST['passport'];
										$country=$_POST['country'];
								
										$u_email=$_SESSION['email'];
										global $type;
										if (empty($country)) {
										echo "<script> alert('Please enter your country')</script>";
										}
										else{
										switch ($amount) {
											case '15000':
											$type='Ganza';
												break;
												case '30000':
													$type='Cyizere';
														break;
														case '42500':
															$type='PLUS';
																break;
										}
										$status=1;
										$number=rand(00000,99999);
		$insert=$conn->query("INSERT INTO subscription values(null,'$type','$amount','$name','$email','$phone','$country','$passport',
										                                            '$u_email','$status','$number',now())");
										if ($insert) {
											$_SESSION['sub_number']=$number;
											$_SESSION['sub_amount']=$amount;
											$_SESSION['sub_type']=$type;
										// header("location:pay_sub.php");
										echo "<script> window.location.href='pay_sub.php'</script>";

										}
									else{
										echo "<script> alert('error, try again')</script>";
										// echo "<script> alert('$name $type $amount $email $phone $country $passport $status $number $u_email')</script>";

									}

									}
								}
								
	?>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">
								</h5>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"  >&times;</span>
								</button>
							</div>
							<div class="col-md-10 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
								<div class="form-wrap">
									<div class="tab">
										
										<div class="tab-content">
											<div class="tab-content-inner active" data-content="signup">
												<h3>Buy Trip Subcription of      <span id="modalPackage"></span></h3>
												<!-- action="subscribe.php" -->
												<form  method="post">
												<div class="row form-group">
														<div class="col-md-12">
															<label for="amount">Amount to pay</label>
															
															<input type="text"  name="amount" readonly id="modalAmount" class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="fullname">Your Name</label>
															<input type="text" name="name" required class="form-control">
														</div>
													</div>
													
													
													<div class="row form-group">
														<div class="col-md-12">
															<label for="passport">N<sup>o</sup>&mdash; id or Passport</label>
															<input type="text" name="passport" required class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="phone">N<sup>o</sup>&mdash; Phone Number</label>
															<input type="number" name="phone" required class="form-control">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="phone">Email</label>
															<input type="email" name="email" required class="form-control">
														</div>
													</div>
													<div class="row form-group">
													<div class="col-md-12">
														<label for="activities">Country</label>
														<select  name="country" id="countrySelect" class="form-control">
															<option value="" disabled selected>select country</option>
														
														</select>
													</div>
												</div>
												
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var countrySelect = document.getElementById('countrySelect');

        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                data.forEach(country => {
                    var option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    });
</script>
													
													<div class="row form-group">
														<div class="col-md-12">
															<input type="submit" name="submit"  class="btn btn-primary btn-block" value="Preced to payment">
														</div>
													</div>
	
													
												</form>	
											</div>
	
											
										</div>
									</div>
								</div>
							</div>
							<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('a[data-toggle="modal"]').on('click', function() {
            var value = $(this).data('value'); // Get the 'data-value' attribute
			var package1;
			var cost;
			if (value=='ganza') {
				 package1="Ganza 15000rwf";
				 cost=15000;
			} 
			if((value=='ubumwe')) {
				 package1="Ubumwe 30000rwf";
				 cost=30000;
			}
			if((value=='international')) {
				 package1="i PLUS 42500rwf";
				 cost=42500;
			}
            $('#modalPackage').text(package1); // Set the value in modal
            $('#modalAmount').val(cost); // Set the value in modal
        });
    });
</script>

							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Refound</button>
								<!-- You can add additional buttons or actions here -->
							</div>
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
						<?php
						if($sub<1)
						{
						?>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-value="ubumwe">Get started</a>
					      <?php }
						  else{
							if($type=='Cyizere')
							{
								echo "
								<span class=\"bg bg-info\">Subsciption already activated, remaining days ($remainingDay)</span>
	
							";
							}
							else{
							?>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" disabled data-target="#myModal" data-value="cyizere">Get started</a>

							<?php
						  } }
						  ?>
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
					<?php
						if($sub<1)
						{
						?>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-value="ubumwe">Get started</a>
					      <?php }
						  else{
							if($type=='PLUS')
							{
								echo "
								<span class=\"bg bg-info\">Subsciption already activated, remaining days ($remainingDay)</span>
	
							";
							}
							else{
							?>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" disabled data-target="#myModal" data-value="international">Get started</a>

							<?php
						  } }
						  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- llll -->
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
           while($destination=mysqli_fetch_array($selectDestination))
		   {
			$image=$destination[1];
			$title=$destination[2];
			$desc=$destination[3];
				?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="../admin/uploads/<?php echo $image ?>" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="../admin/uploads/<?php echo $image ?>" alt="Image" class="img-responsive">
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
	  <!-- <script src="../ajax/cart.js"></script> -->

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="../js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="../js/main.js"></script>
	<script src="../ajax/book.js"></script>

	</body>
</html>

