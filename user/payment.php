<?php 
error_reporting(0);
include('../php/conn.php');
$ticket=$_SESSION['ticket'];
if (empty($ticket) || !isset($_SESSION['ticket'])) {
	$ticket=$_GET['t_number'];
	$_SESSION['ticket']=$ticket;
}
global $ticket_data;
global $amount;
$selectTicket=$conn->query("SELECT * from ticket where t_number='$ticket'");
if (mysqli_num_rows($selectTicket)) {
	$ticket_data=mysqli_fetch_array($selectTicket);
	$amount=5000;
	if ($ticket_data['t_nationality'] !="other") 
	{
	
		$amount=1500;
			}
			
}
// else {
// 	header("location:index.php");
// 	exit();
// }

?>
<!DOCTYPE HTML>
<html  lang="en" data-bs-theme="dark">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Traveler &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
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

<style>
        /* Add your styles for overlay and popup here */
		.overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
		}

        .popup {
			width: 100%;
            
			display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            z-index: 2;
			
        }
		
    </style>
	</head>
	<body>
		<div class="gtco-loader"></div>
	
	<!-- <div class="page-inner"> -->
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.html">Kigali &mdash; Traveler <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<li><a href="../destination.html">Destination</a></li>
							
							<li><a href="../pricing.html">Pricing</a></li>
							<li><a href="../contact.html">Contact</a></li>
							
						</ul>	
					</div>
				</div>
				
			</div>
		</nav>
	<div id="page">
		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/rest.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
			<!-- lhvbjknk/-->	<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						
		
						<div class="row row-mt-15em">
							<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1>Confirm your payment ,choose your best </h1>	
							</div>
							<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
								<div class="form-wrap">
									<div class="tab">
										
										<div class="tab-content">
											<div class="tab-content-inner active" data-content="signup">
							<h3 style="color: rgb(251, 181, 4);">Buy Entrance ticket of <?php echo $ticket_data['t_nationality'] ?><small style="color: rgb(44, 99, 154);">
							<?php echo $amount;?>     Rwf</small> with  </h3>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
												
                                                  
                                                    <!-- Image and Submit Button for PayPal -->
                                                    <div class="row align-items-center mt-1">
                                                        <div class="col-sm-1">
                                                            <img class="img-fluid" src="../images/mtn.png " alt="PayPal Logo" style="width: 30px; border-radius: 12px;">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="submit" class="btn btn-success btn-block" onclick="openPopup()" value="MTN">
                                                        </div>
                                                    </div>
                                                          <!-- Image and Submit Button for PayPal -->
											
														<div class="row form-group">
                                                        <div class="col-sm-1">
                                                            <img  class="img-fluid" src="../images/paypal.png" alt="MTN Logo" style="width:35px;border-radius: 12px;">
                                                        </div>
                                                        <div class="col-md-8">
								<form id="payForm">
									<!-- <input type="hidden" id="number" value="<?php echo $ticket ?> "> -->
									<!-- <input type="hidden" id="amount" value="<?php echo $amount ?> "> -->
								<input type="submit" class="btn btn-primary btn-block" value="Paypal" >
                             	</form> 
								  
							                              </div> 
                                                    </div>
														
													</div>
												
													<div class="popup" id="popup">
															
														<form >
															<!-- Add your new account form fields here -->
															<div class="row form-group">
																<h3><small style="color: rgb(44, 99, 154);">
							Pay <?php echo $amount;?>     Rwf with MTN</small> </h3>
																<div class="col-md-12">
																	<label for="newUsername">Enter mtn number to pay with</label>
																	<input type="number" id="paynumber" class="form-control">
																</div>
															</div>
															
															<div class="row form-group">
																<div class="col-md-6">
																	<input type="submit" class="btn btn-primary btn-block" value="Submit">
																</div>
															</div>
														</form>
														
														
													</div>

													<script>
														function openPopup() {
															
															document.getElementById("popup").style.display = "block";
														}
													
														function closePopup() {
															
															document.getElementById("popup").style.display = "none";
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
	</div>
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
		<script>
			document.getElementById('formPay').addEventListener('click',function(event){
   event.preventDefault();
   alert();
			});

		</script>
	</body>
</html>

